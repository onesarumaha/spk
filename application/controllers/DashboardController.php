<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() 
    {
        $title = 'Dashboard';
        $this->load->view('layout/main', $title);
        // $this->load->view('dashboard/index');
    }


}
