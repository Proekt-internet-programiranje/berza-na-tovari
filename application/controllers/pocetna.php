<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pocetna extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        if(empty($this->session->userdata('id_korisnik'))){
            $this->session->set_flashdata('flash_data','Немате пристап');
            redirect('najava');
        }
    }
    
    public function index(){
        $this->load->view('pocetna');
    }
    
    public function odjavi_se(){
        $podatoci = ['id_korisnik','korisnicko_ime'];
        $this->session->unset_userdata($podatoci);
        redirect('najava');
    }
}