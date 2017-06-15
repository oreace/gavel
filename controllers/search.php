<?php

class Search extends Controller {

  function __construct() {
    parent::__construct();
  /*  Session::init();
    $logged = Session::get('loggedIn');
    if ($logged == false) {
      Session::destroy();
      redirect_to(login);
      exit;
    }*/
  }



  function query($query){
  if (isset($query)) {
    global $db; 
    //$query = $_REQUEST['query'];
    $sql = mysqli_query ($db, "SELECT * FROM g_cause_listing WHERE cause_title LIKE '%{$query}%' OR court_name LIKE '%{$query}%' OR suit_no LIKE '%{$query}%' OR location LIKE '%{$query}%'");
	  $array = array();
    while ($row = mysqli_fetch_array($sql)) {
        $array[] = array (
                            'title' => $row['cause_title'],
                            'name' => $row['court_name'],
                            'suit' => $row['suit_no'],
                            'location' => $row['location'],
                            'casetime' => strtotime($row['casetime']),
                            'day'=> date('d', $casetime),
                            'month'=> date('m', $casetime),
                            'year' => date('Y', $casetime),
                            'time' => date('h:i:s A', $casetime),

        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
  
}


  }
  function index() {
    if (!empty($_POST['searchfield'])) {
      $this->userFound();
    } else {
      $this->newUserList();
    }
  }

  function newUserList() {
    $this->view->searchBookList = $this->model->bookList();
    $this->view->render("search/index");
  }

  function userFound() {
    $this->view->searchBookList = $this->model->bookFound();
    $this->view->render("search/index");
  }

  function logout() {
    Session::destroy();
    header('Location: ' . URL . 'login');
    exit;
  }

}

?>
