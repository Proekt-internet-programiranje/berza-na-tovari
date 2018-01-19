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
                    'id_korisnik'        => $rezultat->id_korisnik,
                    'uloga'              => $rezultat->uloga,
                    'korisnicko_ime'     => $rezultat->korisnicko_ime,
                    'ime'                => $rezultat->ime,
                    'prezime'            => $rezultat->prezime
                ];
                $this->session->set_userdata($podatoci);
                redirect('pocetna'); 
            } else {
                $this->session->set_flashdata('poraka', 'Нешто е грешка');
                redirect('najava');
            }
        }
        $this->load->view('najava');
    }
    
    public function registracija(){
        $podatoci = array(
            'ime' => $this->input->post('ime'),
            'prezime' => $this->input->post('prezime'),
            'korisnicko_ime' => $this->input->post('korisnicko_ime'),
            'lozinka' => md5($this->input->post('lozinka'))
        );
        if(!$this->najava->registracija($podatoci)){
            $this->session->set_flashdata('poraka', 'Регистрирањето беше неуспешно');
            redirect('najava/#signup');
        } else {
            $this->session->set_flashdata('poraka', 'Регистрацијата беше успешна, најавете се');
            redirect('najava/#login');
        }
    }
}