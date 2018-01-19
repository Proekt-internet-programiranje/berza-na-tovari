<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Najava_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function proveri_korisnik($podatoci){
        $this->db->select('*');
        $this->db->where('korisnicko_ime',$podatoci['korisnicko_ime']);
        $this->db->where('lozinka', $podatoci['lozinka']);
        return $this->db->get('korisnici')->row();
    }
    
    public function registracija($korisnik){
        $vnes = $this->db->insert('korisnici', $korisnik);
        if($vnes){
            return true;
        } else return false;
    }
    
    function __destruct() {
        $this->db->close();
    }
}