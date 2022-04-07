<?php
class Income extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("cookie");
        $this->load->database();
        // $this->load->model("income_model");
    }

    public function index()
    {
        $this->load->view("income/dashboard");
    }

}

?>