<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
    }

    function index() {
        if (!empty($_POST['searchfield'])) {
            $this->loginFound();
        } else {
            $this->newLoginList();
        }
    }

    public function run() {
        $response = $this->model->run();

        if (!empty($response['id'])) {
            Session::init();
            Session::set('id', $response['id']);
            Session::set('email', $response['email']);
            Session::set('pass', $response['pass']);
            Session::set('loggedIn', true);
            $_SESSION['loggenIn'] = "YES";
            $_SESSION['email'] = $response['email'];
          	
            redirect_to('index');


        } else {
             Session::init();
             $_SESSION['error'] = $response;
             Session::set('error', $response);
             redirect_to('index');
          
            /*Session::init();
            $message = $response;
            $_SESSION['error'] = $message;
            Session::set('error', $message);
            redirect_to('index');
            */
        }
    }

    function logout() {
        Session::destroy();
        redirect_to("index");
        exit;
    }

}

?>
