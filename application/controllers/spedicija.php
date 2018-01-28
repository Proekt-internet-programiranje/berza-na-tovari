<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spedicija extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index()
	{
        //$this->load->view('admin');
        $this->prikazi((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
    
    public function prikazi($output = null)
	{
        $this->load->view('spedicija',(array)$output);
	}

    
    public function vnesi_tovar()
    {
        $id=$this->session->userdata('id_korisnik');
        $tabela = new grocery_CRUD();
        $tabela->set_table('tovar');
        $tabela->set_relation('id_kompanija','kompanija','imekompanija',array('id_kompanija' => $id));
        $tabela->set_relation('tip_na_potrebno_vozilo','tip_na_vozilo','naziv');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_kompanija','utovarno_mesto','istovarno_mesto','tezina','cena','tip_na_potrebno_vozilo');
        $tabela->fields('id_kompanija','utovarno_mesto','istovarno_mesto','tezina','cena','tip_na_potrebno_vozilo');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('tip_na_vozilo','Тип на возило');
        $tabela->display_as('utovarno_mesto','Место на утовар');
        $tabela->display_as('istovarno_mesto','Место на истовар');
        $tabela->display_as('tezina','Тежина');
        $tabela->display_as('cena','Цена');
        $tabela->display_as('tip_na_potrebno_vozilo','Потребно возило');
        $tabela->where('imekompanija',($this->session->userdata('imekompanija')));
        //$tabela->callback_before_insert(array($this,'smeni_id'));
        //$tabela->callback_add_field('id_kompanija', function () { 
            //$ime=$this->session->userdata('imekompanija');
            //return '<input type="text" maxlength="50" value="'.$ime.'" name="id_kompanija">'; });
        $this->prikazi($tabela->render());
    }
    function smeni_id($vlez, $primary_key = null)
    {
	    $vlez['id_kompanija'] = $this->session->userdata('id_korisnik');
	    return $vlez;
	   
    }
    
    public function pregled_vozila()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_table('vozilo');
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
        $tabela->unset_add();
        $tabela->unset_edit();
        $tabela->unset_delete();
        $this->prikazi($tabela->render());
    }
    
    public function vnesi_tura()
    {
        $tabela = new grocery_CRUD();
        $tabela->set_table('tura');
        $tabela->set_relation('id_prevoznik','kompanija','imekompanija');
        $tabela->set_relation('id_spedicija','kompanija','imekompanija');
        $tabela->set_relation('id_tovar','tovar','id_tovar');
        $tabela->set_relation('id_vozac','vozac','ime_vozac');
        $tabela->set_relation('id_vozilo','vozilo','registracija');
        $tabela->columns('id_prevoznik','id_spedicija','id_tovar','id_vozac','id_vozilo');
        $tabela->fields('id_prevoznik','id_spedicija','id_tovar','id_vozac','id_vozilo');
        $tabela->display_as('id_prevoznik','Превозник');
        $tabela->display_as('id_spedicija','Шпедиција');
        $tabela->display_as('id_tovar','Шифра на товар');
        $tabela->display_as('id_vozac','Возач');
        $tabela->display_as('id_vozilo','Возило');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->fields('id_prevoznik','id_spedicija','id_tovar','id_vozilo','id_vozac');
        $tabela->where('id_spedicija',($this->session->userdata('id_korisnik')));
        $tabela->callback_add_field('id_spedicija', function () { 
            $ime=$this->session->userdata('imekompanija');
            return '<input type="text" maxlength="50" value="'.$ime.'" name="id_spedicija">'; });
        $tabela->callback_before_insert(array($this,'smeni_id_spedicija'));
        $this->prikazi($tabela->render());
    }
    
    function smeni_id_spedicija($vlez, $primary_key = null)
    {
	    $vlez['id_spedicija'] = $this->session->userdata('id_korisnik');
	    return $vlez;
	   
    }
    
}