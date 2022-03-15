<?php
class Profinance extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("cookie");
    }

    public function index()
    {
        $this->load->view("dashboard");
    }

    public function show()
    {
        $data = $this->drop_model->show();
        echo json_encode($data);
    }

}

?>