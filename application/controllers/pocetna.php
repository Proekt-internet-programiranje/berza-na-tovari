<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pocetna extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $tip_korisnik = $this->session->userdata('uloga');
        if(empty($this->session->userdata('id_korisnik'))){
            $this->session->set_flashdata('poraka','Немате пристап');
            redirect('najava');
        }
    }
    
    public function index(){
        $this->load->view('header');
        $this->load->view('pocetna');
        $this->load->view('footer');
    }
    
    public function odjavi_se(){
        $podatoci = ['id_korisnik','korisnicko_ime' ,'ime','prezime'];
        $this->session->unset_userdata($podatoci);
        redirect('najava');
    }
}