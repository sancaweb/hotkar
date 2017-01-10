<?php
namespace Controllers;
use Resources, Models, Libraries;

class Cek extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->hotel = new Models\Hotel;
		$this->session = new Resources\Session;
		
    }
	
	public function index()
    {
		$data['title'] = 'Cek Pemesanan';
		$data['subtitle']= 'Cek Pemesanan Hotel';
		$data["page"]='cek_pemesanan';
		$data['menu']='cek_pemesanan';
		$limit=3;
		$home_slide=$this->hotel->viewall_hotel_limit($limit);
		
		$data['home_slide'] = $home_slide;
		$this->output(TEMPLATE.'konten/cek_pemesanan', $data);
    }
	
	
}
