<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Najava_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function proveri_korisnik($podatoci){
        $this->db->where('korisnicko_ime',$podatoci['korisnicko_ime']);
        $this->db->where('lozinka', $podatoci['lozinka']);
        return $this->db->get('korisnici')->row();
    }
    
    function __destruct() {
        $this->db->close();
    }
}