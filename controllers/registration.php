<?php

class Registration extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
    }

    function index() {
        $this->view->render("reg/index");
    }
    function memberForm() {
        $this->view->render("reg/memberForm");
    }
    
}

?>
