<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pocetna extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('id_korisnik'))){
            $this->session->set_flashdata('poraka','Немате пристап');
            redirect('najava');
        }
    }
    
    public function index(){
        if(($this->session->userdata('uloga'))=='Admin')
            redirect('admin');
        else if(($this->session->userdata('uloga'))=='Prevoznik')
            redirect('prevoznik');
        else if(($this->session->userdata('uloga'))=='Spedicija')
            redirect('spedicija');
        else if(($this->session->userdata('uloga'))=='Vozac')
            redirect('vozac');
        
    }
    
    public function odjavi_se(){
        $podatoci = ['id_korisnik','korisnicko_ime' ,'ime','prezime'];
        $this->session->unset_userdata($podatoci);
        $this->session->set_flashdata('poraka', 'Ви благодариме за довербата');
        redirect('najava/#login');
    }
}