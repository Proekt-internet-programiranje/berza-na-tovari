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
                    'imekompanija'       => $rezultat->imekompanija,
                    'uloga'              => $rezultat->imeuloga,
                    'danocen_broj'       => $rezultat->danocen_broj,
                    'email'              => $rezultat->e_mail,
                    'adresa'             => $rezultat->adresa,
                    'telefon'            => $rezultat->telefon
                ];
                $this->session->set_userdata($podatoci);
                redirect('pocetna');
            } else {
                $this->session->set_flashdata('poraka', 'Погрешно корисничко име или лозинка');
                redirect('najava');
            }
        }
        $this->load->view('najava');
    }
    
    public function registracija(){
        if($_POST){
                $rezultat= $_POST;
                $podatoci = [
                    'imekompanija'  => $rezultat['imekompanija'],
                    'danocen_broj'  => $rezultat['danocen_broj'],
                    'uloga'         => $rezultat['tip_kompanija'],
                    'email'         => $rezultat['email'],
                    'adresa'        => $rezultat['adresa'],
                    'telefon'       => $rezultat['telefon'],
                    'korisnicko_ime'=> $rezultat['korisnicko_ime'],
                    'lozinka'       => $rezultat['lozinka']
                            ];
        
                if(!$this->najava->registracija($podatoci)){
                    $this->session->set_flashdata('poraka', 'Регистрирањето беше неуспешно');
                    redirect('najava');
                } else {
                    $this->session->set_flashdata('poraka', 'Регистрацијата беше успешна, најавете се');
                    redirect('najava');
                }
            }
        }
    
}