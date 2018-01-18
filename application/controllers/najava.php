<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Najava extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('najava_model', 'najava');
        if(!empty($_SESSION['id_korisnik']))
            redirect('pocetna');
    }
    
    public function index(){
        if($_POST){
            $rezultat = $this->najava->proveri_korisnik($_POST);
            if(!empty($rezultat)){
                $podatoci = [
                    'id_korisnik' => $rezultat->id_korisnik,
                    'korisnicko_ime'     => $rezultat->korisnicko_ime];
                $this->session->set_userdata($podatoci);
                redirect('pocetna'); 
            } else {
                $this->session->set_flashdata('flash_data', 'Нешто е грешка');
                redirect('najava');
            }
        }
        $this->load->view('najava');
    }
}