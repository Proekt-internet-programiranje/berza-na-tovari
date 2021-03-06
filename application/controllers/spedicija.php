<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Spedicija extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('uloga')!='Spedicija')
            redirect('najava');
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
        $tabela->fields('id_kompanija','utovarno_mesto','istovarno_mesto','tezina','cena','tip_na_potrebno_vozilo','ima_tura');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('tip_na_vozilo','Тип на возило');
        $tabela->display_as('utovarno_mesto','Место на утовар');
        $tabela->display_as('istovarno_mesto','Место на истовар');
        $tabela->display_as('tezina','Тежина');
        $tabela->display_as('cena','Цена');
        $tabela->display_as('tip_na_potrebno_vozilo','Потребно возило');
        $tabela->where('imekompanija',($this->session->userdata('imekompanija')));
        $tabela->field_type('ima_tura','hidden','ne');
        //$tabela->callback_before_insert(array($this,'smeni_id'));
        //$tabela->callback_add_field('id_kompanija', function () { 
            //$ime=$this->session->userdata('imekompanija');
            //return '<input type="text" maxlength="50" value="'.$ime.'" name="id_kompanija">'; });
        $this->prikazi($tabela->render());
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
        $tabela->where('ima_tura','ne');
        $this->prikazi($tabela->render());
    }
    
    
    
    public function vnesi_tura()
    {
        $prevoznik_id=$_SESSION['prevoznikid'];
        $id=$this->session->userdata('id_korisnik');
        $tabela = new grocery_CRUD();
        $tabela->set_table('tura');
        $tabela->set_relation('id_prevoznik','kompanija','imekompanija',array('id_kompanija' => $prevoznik_id));
        $tabela->set_relation('id_spedicija','kompanija','imekompanija',array('id_kompanija' => $id));
        $tabela->set_relation('id_tovar','tovar','id_tovar',array('id_kompanija' => $id,'ima_tura' => 'ne'));
        $tabela->set_relation('id_vozac','vozac','ime_vozac',array('id_kompanija' => $prevoznik_id));
        $tabela->set_relation('id_vozilo','vozilo','registracija',array('id_kompanija' => $prevoznik_id));
        $tabela->columns('id_prevoznik','id_spedicija','id_tovar','id_vozac','id_vozilo');
        $tabela->display_as('id_prevoznik','Превозник');
        $tabela->display_as('id_spedicija','Шпедиција');
        $tabela->display_as('id_tovar','Шифра на товар');
        $tabela->display_as('id_vozac','Возач');
        $tabela->display_as('id_vozilo','Возило');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->fields('id_prevoznik','id_spedicija','id_tovar','id_vozilo','id_vozac','zavrsena');
        $tabela->where('id_spedicija',($this->session->userdata('id_korisnik')));
        $tabela->callback_after_insert(array($this, 'smeni_tovar'));
        $tabela->field_type('zavrsena','hidden','ne');
        //$tabela->callback_add_field('id_spedicija', function () { 
            //$ime=$this->session->userdata('imekompanija');
            //return '<input type="text" maxlength="50" value="'.$ime.'" name="id_spedicija">'; });
        //$tabela->callback_before_insert(array($this,'smeni_id_spedicija'));
        $this->prikazi($tabela->render());
    }
    
    public function smeni_tovar($post_array,$primary_key)
    {
        $this->db->query("update tovar set ima_tura='da' where tovar.id_tovar='".$post_array["id_tovar"]."'");
        $this->db->query("update vozilo set ima_tura='da' where vozilo.id_vozilo='".$post_array["id_vozilo"]."'");
        $this->db->query("update vozac set ima_tura='da' where vozac.id_vozac='".$post_array["id_vozac"]."'");
    }
    
    
    
    function prevoznici()
    {
        $this->load->model('najava_model','najava');
        $rezultat = $this->najava->prevoznici();
        $prevoznici1 = array();
        foreach($rezultat as $red) 
        {
        $tmp['id'] = $red->id_kompanija;
        $tmp['naziv'] = $red->imekompanija;
        $prevoznici1[] = $tmp;
        }
        
        
        $this->load->view('prevoznici',array('prevoznik' => $prevoznici1));
    }
    
    public function obraboti_prevoznikid()
    {   if($_POST)
        $_SESSION['prevoznikid']= $_POST['prevoznik'];
        redirect("/spedicija/vnesi_tura/add");
    }
    
    
}