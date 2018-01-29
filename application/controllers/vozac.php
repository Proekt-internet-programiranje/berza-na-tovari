<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vozac extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('najava_model', 'najava');
        if($this->session->userdata('uloga')!='Vozac')
            redirect('najava');
    }
    
    public function index()
	{
        //$this->load->view('admin');
        $this->prikazi((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
    }
    public function prikazi($output = null)
	{
        $this->load->view('vozac',(array)$output);
	}
    
    

    public function sostojba_na_vozilo()
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
        $this->prikazi($tabela->render());
    }
    
    public function pregled_tura()
    {
  
        $id=$this->session->userdata('id_korisnik');
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
        $tabela->where('id_vozac',$id);

        $this->prikazi($tabela->render());
    }

    
        
    
    }