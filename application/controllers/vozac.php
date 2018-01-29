<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vozac extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('najava_model', 'najava');
        if($this->session->userdata('uloga')!='Vozac')
            redirect('najava');
    }
    
    public function index()
	{
        //$this->load->view('admin');
        $this->prikazi((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }
    public function prikazi($output = null)
	{
        $this->load->view('vozac',(array)$output);
	}
    
    public function pregled_na_tura()
    {
  
        
    }
    
    public function pregled_na_turi()
    {
  
        
    }

    public function sostojba_na_vozilo()
    {
        
    }

    
        
    
    }