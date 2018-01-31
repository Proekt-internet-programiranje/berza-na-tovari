<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prevoznik extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('najava_model', 'najava');
        if($this->session->userdata('uloga')!='Prevoznik')
            redirect('najava');
    }
    
    public function index()
	{
        //$this->load->view('admin');
        $this->prikazi((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
    
    public function prikazi($output = null)
	{
        $this->load->view('prevoznik',(array)$output);
	}
    public function aa()
	{
        $this->load->view('vozacadd');
	}
    public function dodadi_vozac()
    {

        $tabela = new grocery_CRUD();
        $tabela->set_table('vozac');
        $tabela->set_relation('id_vozac','korisnici','korisnicko_ime',array('ima_tura' => 'ne'));
        $tabela->set_relation('id_kompanija','kompanija','imekompanija');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_vozac','id_kompanija','ime_vozac','tip_na_vozacka');
        $tabela->display_as('id_vozac','Корисничко име');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('ime_vozac','Име и презиме');
        $tabela->display_as('tip_na_vozacka','Возачка дозвола');
        $tabela->where('imekompanija',($this->session->userdata('imekompanija')));
        $tabela->unset_add();
        $this->prikazi($tabela->render());
    
    }
    

    public function objavi_vozilo()
    {
        $id=$this->session->userdata('id_korisnik');
        $tabela = new grocery_CRUD();
        $tabela->set_table('vozilo');
        $tabela->set_relation('id_kompanija','kompanija','imekompanija',array('id_kompanija' => $id));
        $tabela->set_relation('tip_na_vozilo','tip_na_vozilo','naziv');
        $tabela->set_theme('datatables');
        $tabela->set_language('makedonski');
        $tabela->columns('id_kompanija','tip_na_vozilo','euro_standard','broj_na_sasija','tip_na_prikolka','registracija','ima_tura');
        $tabela->display_as('id_kompanija','Назив на компанија');
        $tabela->display_as('tip_na_vozilo','Тип на возило');
        $tabela->display_as('euro_standard','ЕУР стандард');
        $tabela->display_as('broj_na_sasija','Број на шасија');
        $tabela->display_as('tip_na_prikolka','Приколка');
        $tabela->display_as('registracija','Регистарски ознаки');
        $tabela->set_subject('Возила');
        $tabela->set_rules('id_kompanija','required');
        $tabela->set_rules('tip_na_vozilo','required');
        $tabela->set_rules('euro_standard','required|integer');
        $tabela->set_rules('broj_na_sasija','required|numeric');
        $tabela->set_rules('tip_na_prikolka','required');
        $tabela->set_rules('registracija','required|numeric');
        $tabela->where('imekompanija',($this->session->userdata('imekompanija')));
        $tabela->field_type('ima_tura','hidden','ne');
        $this->prikazi($tabela->render());
    }

    function smeni_id($vlez, $primary_key = null)
    {
	    $vlez['id_kompanija'] = $this->session->userdata('id_korisnik');
	    return $vlez;
	   
    }
    
    public function pregled_tovari()
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
        $tabela->unset_add();
        $tabela->unset_edit();
        $tabela->unset_delete();
        $tabela->where('ima_tura','ne');
        $this->prikazi($tabela->render());
    }

    public function vozacreg(){
        $id=$this->session->userdata('id_korisnik');
        if($_POST){
                $rezultat= $_POST;
                $podatoci = [
                    'id_tipkorisnik' => '4',
                    'korisnicko_ime' => $rezultat['korisnicko_ime'],
                    'lozinka' => $rezultat['lozinka'],
                    'ime_vozac' => $rezultat['ime_vozac'],
                    'tip_na_vozacka' => $rezultat['tip_na_vozacka'],
                    'id_kompanija' => $id
                            ];
        
                
                if(!$this->najava->vozacreg($podatoci)){
                    $this->session->set_flashdata('poraka', 'Регистрирањето беше неуспешно');
                    redirect('prevoznik/dodadi_vozac');
                } else {
                    $this->session->set_flashdata('poraka', 'Регистрацијата беше успешна, најавете се');
                    redirect('prevoznik/dodadi_vozac');
                } 
                
            }
        }

        public function vidivozac()
        {
            $this->load->model('najava_model','najava');
            $rezultat = $this->najava->zemi_id_vozac($this->session->userdata('id_korisnik'));
            $this->load->view('vidivozac',array('rezultat' => $rezultat));
        }
        
        public function obraboti_vozac()
        {
            $this->load->model('najava_model','najava');
            $rezultat = $this->najava->obraboti_vozac($_POST['vozac']);
            foreach($rezultat as $lokacija)
            {
                $lat=$lokacija->Latitude;
                $long=$lokacija->Longitude;
            }
            if(isset($lat)&&isset($long))
            $this->load->view('iframelokacija',array('lat' => $lat, 'long' => $long));
        }
    }