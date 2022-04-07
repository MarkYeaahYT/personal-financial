<?php
class Profinance extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("cookie");
        $this->load->database();
        $this->load->model("profinance_model");
    }

    public function index()
    {
        $this->load->view("provinance/dashboard");
    }

    public function data_revenue()
    {
        $data = $this->profinance_model->data_revenue();
        echo json_encode($data);
    }
    
}

?>