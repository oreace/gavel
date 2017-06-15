<?php

class Forum extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }




    function post(){
        $response = $this->model->postForum();
        if ($response == "Success") {
             Session::init();
             $_SESSION['message'] = $response;
             Session::set('message', $response);
             redirect_to('index');
          
        }else{
             Session::init();
             $_SESSION['error3'] = $response;
             Session::set('error3', $response);
             redirect_to('index');

        }

        }

    function like($id){
      $response = $this->model->like($id);
      
        if ($response == "Success") {
             Session::init();
             $_SESSION['message'] = $response;
             Session::set('message', $response);
             redirect_to('index');
          
        }else{
             Session::init();
             $_SESSION['error3'] = $response;
             Session::set('error3', $response);
             redirect_to('index');

        }
    
        
    }


    function index() {
        if (!empty($_POST['searchfield'])) {
            $this->memberFound();
        } else {
            $this->newMemberList();
        }
    }

    function memberFound() {
        $this->view->memberList = $this->model->memberFound();
        $this->view->render("member/index");
    }

    function newMemberList() {
        $this->view->memberList = $this->model->memberList();
        $this->view->render("member/index");
    }

    function new_member() {
	  //$this->view->visitorList = $visitor;
        $this->view->render("member/new_member");
    }

    
    function viewMember($id){
        $this->view->singleMember = $this->model->editMember($id);
        $this->view->render("member/read");
    }

    function editMember($id) {
        $this->view->singleMember = $this->model->editMember($id);
        $this->view->render("member/edit");
    }

    function updateMember() {
        $response = $this->model->updateMember();
        if ($response) {
            redirect_to(member);
        }
    }

    function deleteMember($id) {
        $this->model->deleteMember($id);
        redirect_to(member);
    }

}

?>
