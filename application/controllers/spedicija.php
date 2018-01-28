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
        $tabela->where('imekompanija',($this->session->userdata('imekompanija')));
        $this->prikazi($tabela->render());
    }
}