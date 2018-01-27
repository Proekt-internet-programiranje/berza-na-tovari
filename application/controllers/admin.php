<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
		$this->load->helper('url');
        $this->load->library('grocery_CRUD');
        if(($this->session->userdata('uloga'))!='Admin'){
            $this->session->set_flashdata('poraka', 'Немате пристап до администраторскиот панел');
            redirect('najava');
        }
    }
    
    public function index()
	{
        //$this->load->view('admin');
        $this->prikazi((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
    
    public function prikazi($output = null)
	{
        $this->load->view('admin',(array)$output);
	}
    
    function kriptiraj_lozinka($vlez, $primary_key = null)
    {
	    $this->load->helper('security');
	    $vlez['lozinka'] = do_hash($vlez['lozinka'], 'md5');
	    return $vlez;
	   
    }
    
    public function korisnici()
	{
        $tabela = new grocery_CRUD();

        $tabela->set_table('korisnici');
        $tabela->set_relation('id_tipkorisnik','ulogi','imeuloga');
        $tabela->set_language('makedonski');
        $tabela->columns('id_tipkorisnik','korisnicko_ime','lozinka');
        $tabela->display_as('id_tipkorisnik','Улога');
        $tabela->display_as('korisnicko_ime','Корисничко име');
        $tabela->display_as('lozinka','Лозинка');
        $tabela->fields('id_tipkorisnik','korisnicko_ime','lozinka');
        $tabela->change_field_type('lozinka','password');
        $tabela->callback_before_insert(array($this,'kriptiraj_lozinka'));
        $tabela->set_theme('datatables');
        $this->prikazi($tabela->render());
	}
    
    public function kompanija()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_table('kompanija');
        $tabela->set_relation('id_kompanija','korisnici','korisnicko_ime');
        $tabela->set_relation('id_tipkompanija','ulogi','imeuloga');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_kompanija','id_tipkompanija','imekompanija','danocen_broj','e_mail','adresa','telefon');
        $tabela->fields('id_kompanija','id_tipkompanija','imekompanija','danocen_broj','e_mail','adresa','telefon');
        $tabela->display_as('id_kompanija','Корисничко име');
        $tabela->display_as('id_tipkompanija','Улога');
        $tabela->display_as('imekompanija','Назив');
        $tabela->display_as('danocen_broj','ЕДБ');
        $tabela->display_as('e_mail','Е-Маил');
        $tabela->display_as('adresa','Адреса');
        $tabela->display_as('telefon','Телефонски број');
        $this->prikazi($tabela->render());
    }
    
    public function vozac()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_table('vozac');
        $tabela->set_relation('id_vozac','korisnici','korisnicko_ime');
        $tabela->set_relation('id_kompanija','kompanija','imekompanija');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_vozac','id_kompanija','ime_vozac','tip_na_vozacka');
        $tabela->display_as('id_vozac','Корисничко име');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('ime_vozac','Име и презиме');
        $tabela->display_as('tip_na_vozacka','Возачка дозвола');
        $this->prikazi($tabela->render());
    }
    
    public function vozilo()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_relation('id_kompanija','kompanija','imekompanija');
        $tabela->set_relation('tip_na_vozilo','tip_na_vozilo','naziv');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_kompanija','tip_na_vozilo','euro_standard','broj_na_sasija','tip_na_prikolka','registracija');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('tip_na_vozilo','Тип на возило');
        $tabela->display_as('euro_standard','ЕУР стандард');
        $tabela->display_as('broj_na_sasija','Број на шасија');
        $tabela->display_as('tip_na_prikolka','Приколка');
        $tabela->display_as('registracija','Регистарски ознаки');
        $tabela->set_subject('Возила');
        $this->prikazi($tabela->render());
    }
    
    public function tovar()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_table('tovar');
        $tabela->set_relation('id_kompanija','kompanija','imekompanija');
        $tabela->set_relation('tip_na_potrebno_vozilo','tip_na_vozilo','naziv');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_kompanija','utovarno_mesto','istovarno_mesto','tezina','cena','tip_na_potrebno_vozilo');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('tip_na_vozilo','Тип на возило');
        $tabela->display_as('utovarno_mesto','Место на утовар');
        $tabela->display_as('istovarno_mesto','Место на истовар');
        $tabela->display_as('tezina','Тежина');
        $tabela->display_as('cena','Цена');
        $tabela->display_as('tip_na_potrebno_vozilo','Потребно возило');
        $this->prikazi($tabela->render());
    }
    
    public function tura()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_table('tura');
        $tabela->set_relation('id_prevoznik','kompanija','imekompanija');
        $tabela->set_relation('id_spedicija','kompanija','imekompanija');
        $tabela->set_relation('id_tovar','tovar','id_tovar');
        $tabela->set_relation('id_vozac','vozac','ime_vozac');
        $tabela->set_relation('id_vozilo','vozilo','registracija');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->fields('id_prevoznik','id_spedicija','id_tovar','id_vozilo','id_vozac');
        $this->prikazi($tabela->render());
    }
}