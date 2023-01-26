<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if(!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['tittle'] = 'Dashboard';
        $this->load->view('templates/header.php', $data);
        $this->load->view('admin/index.php');
        $this->load->view('templates/footer.php');
    }
}  