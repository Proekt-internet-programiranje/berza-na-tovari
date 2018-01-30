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
    
    public function pregled_na_tura()
    {
        $id=$this->session->userdata('id_korisnik');
        $tabela = new grocery_CRUD();
        $tabela->set_table('tura');
        $tabela->set_relation('id_prevoznik','kompanija','imekompanija');
        $tabela->set_relation('id_spedicija','kompanija','imekompanija');
        $tabela->set_relation('id_tovar','tovar','id_tovar');
        $tabela->set_relation('id_vozac','vozac','ime_vozac');
        $tabela->set_relation('id_vozilo','vozilo','registracija');
        $tabela->columns('id_prevoznik','id_spedicija','id_tovar','id_vozac','id_vozilo','zavrsena');
        $tabela->display_as('id_prevoznik','Превозник');
        $tabela->display_as('id_spedicija','Шпедиција');
        $tabela->display_as('id_tovar','Шифра на товар');
        $tabela->display_as('id_vozac','Возач');
        $tabela->display_as('id_vozilo','Возило');
        $tabela->display_as('zavrsena','Завршена');
        $tabela->field_type('zavrsena','dropdown',array('da' => 'Да', 'ne' => 'Не'));
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->fields('id_prevoznik','id_spedicija','id_tovar','id_vozilo','id_vozac','zavrsena');
        $tabela->where('jfe5c348e.id_vozac',$id);
        $tabela->where('zavrsena','ne');
        $tabela->unset_add();
        $tabela->unset_delete();
        $tabela->edit_fields('zavrsena');
        $tabela->callback_after_update(array($this,'smeni_vozac'));
        $this->prikazi($tabela->render());
        
    }
    public function smeni_vozac($post_array,$primary_key)
    {
        
        $this->db->query("update vozac set ima_tura='ne' where id_vozac='".$post_array["id_vozac"]."'");
        $this->db->query("update vozilo set ima_tura='ne' where id_vozilo='".$post_array["id_vozilo"]."'");
    }

    public function pregled_na_turi()
    {
        $id=$this->session->userdata('id_korisnik');
        $tabela = new grocery_CRUD();
        $tabela->set_table('tura');
        $tabela->set_relation('id_prevoznik','kompanija','imekompanija');
        $tabela->set_relation('id_spedicija','kompanija','imekompanija');
        $tabela->set_relation('id_tovar','tovar','id_tovar');
        $tabela->set_relation('id_vozac','vozac','ime_vozac');
        $tabela->set_relation('id_vozilo','vozilo','registracija');
        $tabela->columns('id_prevoznik','id_spedicija','id_tovar','id_vozac','id_vozilo','zavrsena');
        $tabela->display_as('id_prevoznik','Превозник');
        $tabela->display_as('id_spedicija','Шпедиција');
        $tabela->display_as('id_tovar','Шифра на товар');
        $tabela->display_as('id_vozac','Возач');
        $tabela->display_as('id_vozilo','Возило');
        $tabela->display_as('zavrsena','Завршена');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->fields('id_prevoznik','id_spedicija','id_tovar','id_vozilo','id_vozac','zavrsena');
        $tabela->where('jfe5c348e.id_vozac',$id);
        $tabela->where('zavrsena','da');
        $tabela->unset_add();
        $tabela->unset_edit();
        $tabela->unset_delete();
        
        $this->prikazi($tabela->render());
       
        
    }

    public function lokacija ()
    {
        $this->load->view('lokacija');
    }
    public function lokacijadb ()
    {
        $id=$this->session->userdata('id_korisnik');
        if (isset($_GET["w1"]) && isset($_GET["w2"])) {
//echo $_GET["w1"];
//echo $_GET["w2"];

$this->db->query("insert into lokacija (id_vozac, Latitude, Longitude) values ($id,'". $_GET["w1"]."', '". $_GET["w2"]."')");
        }
        $this->load->view('lokacija');
    }
    
    


    
        
    
    }