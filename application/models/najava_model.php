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
        $this->db->join('ulogi','ulogi.id_uloga=korisnici.id_tipkorisnik');
        $this->db->join('kompanija','kompanija.id_kompanija=korisnici.id_korisnik'); //javuva se problem ako za korisnik admin nema povrzano firma, zatoa e ovaa proverka
        $rezultat = $this->db->get()->row();
        if(!$rezultat){
            $this->db->select('*');
            $this->db->from('korisnici');
            $this->db->where('korisnicko_ime',$podatoci['korisnicko_ime']);
            $this->db->where('lozinka', md5($podatoci['lozinka']));
            $this->db->join('ulogi','ulogi.id_uloga=korisnici.id_tipkorisnik');
            return $this->db->get()->row();
        } else return $rezultat;
    }
    
    public function vozacreg($korisnik){
        $korisnik_podatoci = array('id_tipkorisnik' => $korisnik['id_tipkorisnik'],
                                   'korisnicko_ime' => $korisnik['korisnicko_ime'],
                                   'lozinka'        => md5($korisnik['lozinka']));

                                  // print_r($korisnik_podatoci); 
        //dobieni se podatocite, slede proverka dali postoe takov korisnik

        
        if($this->najava->proveri_dali_postoi($korisnik)){
            if($this->db->insert('korisnici', $korisnik_podatoci)){
                $this->db->select('id_korisnik');
                $this->db->from('korisnici');
                $this->db->where('korisnicko_ime',$korisnik['korisnicko_ime']);
                $rezultat=$this->db->get()->row();
                $korisnik_id=$rezultat->id_korisnik;
                //vneseno korisnik i dobieno idto na korisniko
                $vozac_podatoci = array('id_vozac'    => $korisnik_id,
                                            'id_kompanija' => $korisnik['id_kompanija'],
                                            'ime_vozac'    => $korisnik['ime_vozac'],
                                            'tip_na_vozacka'    => $korisnik['tip_na_vozacka']
                                   );
                                    
                if($this->db->insert('vozac',$vozac_podatoci)){
                    $this->db->query("insert into lokacija (id_vozac, Latitude, Longitude) values ($korisnik_id,0, 0)");
                    return true;
                } else {
                    return false;
                }
            }
        } else return false; 
    }

    public function registracija($korisnik){
        $korisnik_podatoci = array('id_tipkorisnik' => $korisnik['uloga'],
                                   'korisnicko_ime' => $korisnik['korisnicko_ime'],
                                   'lozinka'        => md5($korisnik['lozinka']));
        //dobieni se podatocite, slede proverka dali postoe takov korisnik
        if($this->najava->proveri_dali_postoi($korisnik)){
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
                                            'e_mail'          => $korisnik['email'],
                                            'adresa'          => $korisnik['adresa'],
                                            'telefon'         => $korisnik['telefon']
                                   );
                if($this->db->insert('kompanija',$kompanija_podatoci)){
                    return true;
                } else {
                    return false;
                }
            }
        } else return false;
    }
    
    public function proveri_dali_postoi($korisnik){
        $this->db->select('korisnicko_ime');
        $this->db->from('korisnici');
        $this->db->where('korisnicko_ime', $korisnik['korisnicko_ime']);
        if($this->db->get()->num_rows()>0){
            return false;
        } else {
            return true;
        }   
    }
    
    public function prevoznici()
    {
        $this->db->select('*');
        $this->db->where('id_tipkompanija','2');
        $query = $this->db->get('kompanija');
        return $query->result();
    }
    
    public function zemi_id_vozac($id_prevoznik)
    {
        $this->db->select('*');
        $this->db->where('id_kompanija',$id_prevoznik);
        $query = $this->db->get('vozac');
        return $query->result();
    }
    
    public function obraboti_vozac($id_vozac)
        {
            $this->db->select('*');
            $this->db->where('id_vozac', $id_vozac);
            $query = $this->db->get('lokacija');
            return $query->result();
           
        }
    
    function __destruct() {
        $this->db->close();
    }
}