<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Najava_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function proveri_korisnik($podatoci){
        $this->db->select('*');
        $this->db->from('korisnici');
        $this->db->where('korisnicko_ime',$podatoci['korisnicko_ime']);
        $this->db->where('lozinka', md5($podatoci['lozinka']));
        $this->db->join('kompanija','kompanija.id_kompanija=korisnici.id_korisnik');
        $this->db->join('ulogi','ulogi.id_uloga=korisnici.id_tipkorisnik');
        return $this->db->get()->row();
    }
    
    public function registracija($korisnik){
        $korisnik_podatoci = array('id_tipkorisnik' => $korisnik['uloga'],
                                   'korisnicko_ime' => $korisnik['korisnicko_ime'],
                                   'lozinka'        => md5($korisnik['lozinka']));
        if($this->db->insert('korisnici', $korisnik_podatoci)){
            $this->db->select('id_korisnik');
            $this->db->from('korisnici');
            $this->db->where('korisnicko_ime',$korisnik['korisnicko_ime']);
            $rezultat=$this->db->get()->row();
            $korisnik_id=$rezultat->id_korisnik;
            //vneseno korisnik i dobieno idto na korisniko
            $kompanija_podatoci = array('id_kompanija'    => $korisnik_id,
                                        'id_tipkompanija' => $korisnik['uloga'],
                                        'imekompanija'    => $korisnik['imekompanija'],
                                        'danocen_broj'    => $korisnik['danocen_broj'],
                                        'e-mail'          => $korisnik['email'],
                                        'adresa'          => $korisnik['adresa'],
                                        'telefon'         => $korisnik['telefon']
                                   );
            if($this->db->insert('kompanija',$kompanija_podatoci)){
                return true;
            } else {
                return false;
            }
        }
    }
    
    function __destruct() {
        $this->db->close();
    }
}