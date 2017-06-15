<?php

// require 'login.php';

class Member_Model extends Model {

  function __construct() {
    parent::__construct();
  }

  protected static $table_name = "member";
  protected static $db_fields = array("id", "fname", "lname", "phone", "email", "sex", "address");
  public $id;
  public $fname;
  public $lname;
  public $phone;
  public $email;
  public $sex;
  public $address;

  public function memberList() {
    $resultset = $this->find_all();
    return $resultset;
  }

  public function memberFound($sql = "") {
    if ($sql == "") {
      if (isset($_POST['searchfield']) && !empty($_POST['searchfield'])) {
        $members = $_POST['searchfield'];

        $sql = "select * from " . Member_Model::$table_name;
        $sql .= " where fname like '%" . $members . "%'";
        $sql .= " or lname like '%" . $members . "%'";
        $_POST['searchfield'] = "";
      } else {
        redirect_to(member);
      }
    }
    $resultset = $this->find_by_sql($sql);

    return $resultset;
  }

  public function createMember() {
    global $db;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass1 = $_POST['cpassword'];
    $prof = $_POST['prof'];
    $prof2 = $_POST['prof2'];

	$checkmail = mysqli_num_rows(mysqli_query($db, "select * from g_users where email='$email'"));
	if ($checkmail == 0 ){
	if ($pass == $pass1){
	if (strlen($pass) > 4){		
    if ($prof == 1){
      $prof = "Lawyer";
    }else{
      $prof = $prof2;
    }
		$passhash = md5($pass);
		$insert = "insert into g_users (first_name,last_name,email,password,profession) values ('$fname','$lname','$email','$passhash','$prof')";
		$run = mysqli_query($db, $insert);
		if ($run){
  		    $result = "Success";			
	        return $result;
				}else{
 	        $result = "Failed, try again";			
	        return $result;
				}
			
	}else{
        	$result = "Password Lenght Too Short";			
	        return $result;
		
    }
	}else{
    	$result = "Passwords do not match";			
	    return $result;
	  }
	}else{
    	$result = "Mail Already Exists, Please try another";			
	        return $result;
		}



}

  public function deleteMember($memberid) {
    $this->id = $memberid;

    $this->delete();
  }

  public function editMember($id) {
    $result = $this->find_by_id($id);
    return $result;
  }

  public function updateMember() {
    $this->id = $_POST['id'];
    $this->fname = $_POST['fname'];
    $this->lname = $_POST['lname'];
    $this->phone = $_POST['phone'];
    $this->email = $_POST['email'];
    $this->sex = $_POST['sex'];
    $this->address = $_POST['address'];

    $response = $this->update();
    return $response;
  }

}

?>