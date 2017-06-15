<?php

require_once("db_config.php");

class Database {

  private $mysqli;
  private $magic_quotes_active;
  private $real_escape_string_exists;

  function __construct() {
    $this->open_connection();
    $this->magic_quotes_active = get_magic_quotes_gpc();
    $this->real_escape_string_exists = function_exists("mysql_real_escape_string");
  }

  public function open_connection() {
    $this->mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (!$this->mysqli) {
      die("Database connection failure: " . mysql_error($this->mysqli));
    }
  }

  public function close_connection() {
    if (isset($this->mysqli)) {
      mysqli_close($this->mysqli);
      unset($this->mysqli);
    }
  }

  public function query($sql) {
    $result = mysqli_query($this->mysqli, $sql);
    $this->confirm_query($result);
    return $result;
    //mysqli_free_result($result);
  }

  public function fetch_array($result_set) {
    return mysqli_fetch_array($result_set);
  }

  public function num_rows($result_set) {
    return mysqli_num_rows($result_set);
  }

  public function insert_id() {
    return mysqli_insert_id($this->mysqli);
  }

  public function affected_rows() {
    return mysqli_affected_rows($this->mysqli);
  }

  private function confirm_query($result) {
    if (!$result) {
      die("Database query failure: " . mysqli_error($this->mysqli));
    }
  }

  public function escape_value($value) {
    if ($this->real_escape_string_exists) { // PHP v4.3.0 or higher
      // undo any magic quote effects so mysql_real_escape_string can do the work
      if ($this->magic_quotes_active) {
        $value = stripslashes($value);
      }
      $value = mysql_real_escape_string($value);
    } else { // before PHP v4.3.0
      // if magic quotes aren't already on then add slashes manually
      if (!$this->magic_quotes_active) {
        $value = addslashes($value);
      }
      // if magic quotes are active, then the slashes already exist
    }
    return $value;
  }

}
$database = new Database();
?>
