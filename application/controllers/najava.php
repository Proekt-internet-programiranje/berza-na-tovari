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
                    'uloga'             => $rezultat->imeuloga,
                    'korisnicko_ime'     => $rezultat->korisnicko_ime
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
        $podatoci = $podatoci = [
                    'id_korisnik'        => $rezultat->id_korisnik,
                    'id_tipkorisnik'     => $rezultat->id_tipkorisnik,
                    'korisnicko_ime'     => $rezultat->korisnicko_ime,
                    'imekompanija'       => $rezultat->imekompanija,
                    'danocen_broj'       => $rezultat->danocen_broj,
                    'email'              => $rezultat->email,
                    'adresa'             => $rezultat->adresa,
                    'telefon'            => $rezultat->telefon
                ];
        if(!$this->najava->registracija($podatoci)){
            $this->session->set_flashdata('poraka', 'Регистрирањето беше неуспешно');
            redirect('najava/#signup');
        } else {
            $this->session->set_flashdata('poraka', 'Регистрацијата беше успешна, најавете се');
            redirect('najava/#login');
        }
    }
}