<?php

class View {

  function __construct() {
    // echo "this is the view <br />";
  }

  public function render($name, $noinclude = false) {
    if ($noinclude == true) {
      require 'views/' . $name . '.php';
    } else {
      require 'views/header.php';
      require 'views/' . $name . '.php';
      require 'views/footer.php';
    }
  }

}

?>
