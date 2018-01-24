<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spedicija extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('spedicija');
        $this->load->view('footer');
    }
}