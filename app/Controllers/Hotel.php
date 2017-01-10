<?php
namespace Controllers;
use Resources, Models, Libraries;

class Hotel extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->pengaturan = new Models\Pengaturan;
		$this->review = new Models\Review;
		$this->request= new Resources\Request;
		$this->readmore= new Libraries\Readmore;
		$this->rating= new Libraries\Rating;
		
    }
	
	public function index($page=1)
    {
		//pagination
		$this->pagination = new Resources\Pagination();
        $page = (int) $page;
        $limit = 6;
		$total_hotel=$this->hotel->total_hotel();
		
				
		$data['viewall_hotel']=$this->hotel->viewall_hotel_page($page, $limit);
		
		$data['total_hotel'] = $total_hotel;
		$data['pageLinks'] = $this->pagination->setOption(
				array(
					'limit' => $limit,
					'base' => $this->uri->baseUri.'index.php/hotel/index/%#%/',
					'total' => $total_hotel,	
					'current' => $page,
					)
							)->getUrl(); 
		
		$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
		//end pagination
		
		
        $data['title'] = 'Hotel';
		$data['subtitle']= 'Halaman List Hotel';
		$data["page"]='hotel';
		$data['konten']='konten/home';
		$data['menu']='hotel';
        
        $this->output(TEMPLATE.'konten/list_hotel', $data);
    }
	
	public function pencarian(){
		if($_POST){
			$checkin=$this->request->post('checkin');
			$checkout=$this->request->post('checkout');
			
			$katakunci=$this->request->post('cari_hotel');		
			$pisah_cari=explode("-",$katakunci);
			
			$jumlah_explode=count($pisah_cari);
			if($jumlah_explode == 2){
				$nama_hotel=$pisah_cari[0]; 
				$kecamatan=$pisah_cari[1];
				
				$hasil_cari_hotel=$this->hotel->cari_hotel_order_array($nama_hotel);
				$jumlah_pencarian=$this->hotel->hitung_hotel_order_array($nama_hotel);
				}else{
					$hasil_cari_hotel=$this->hotel->cari_hotel_order($katakunci);
					$jumlah_pencarian=$this->hotel->hitung_hotel_order($katakunci);
				}
			
			
			$session_order=array(
				 'cari_hotel'=>$this->request->post('cari_hotel'),
				 'checkin'=>$checkin,
				 'checkout'=>$checkout,
				);
			
			 $this->session->setValue($session_order);
			
			$data['title'] = 'Pencarian Hotel';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='list';
			$data['menu']='hotel';
			$data['jumlah_pencarian']=$jumlah_pencarian;
			$data['hasil_cari_hotel']=$hasil_cari_hotel;
			$data['checkin']=$checkin;
			$data['checkout']=$checkout;
			$this->output(TEMPLATE.'konten/list_hotel', $data);
			
		}else{
			$this->redirect('error');
		}
	}
	
	public function detail($id_hotel=''){
		
		$id=$id_hotel;
		if($this->hotel->view_detail_hotel_byId($id) || $id != ''){
			
			if($this->session->getValue('checkin') AND $this->session->getValue('checkout')){
				$data['checkin']=$this->session->getValue('checkin');
				$data['checkout']=$this->session->getValue('checkout');
			}
			
			$id=base64_decode($id);
			$view_detail_hotel=$this->hotel->view_detail_hotel_byId($id);
			$data['nama_hotel']=$this->hotel->view_nama_hotel_byID($id);
			$data['nama_keamatan']=$this->hotel->view_nama_kec_byID($id,$limit=3);
			$data['fasilitas_hotel']=$this->hotel->get_fasilitas_hotel_by_idHotel($id);			
			$data['kamar_hotel']=$this->hotel->viewall_kamar_byIDhotel($id);
			$data['view_detail_hotel']=$view_detail_hotel;
			$data['title'] = 'Detail Hotel';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='detail_hotel';
			$data['menu']='hotel';
			$data['id_hotel']=$id;
			$kebersihan='kebersihan';
			$data['rata_kebersihan']=$this->review->rata_rating($kebersihan,$id);
			
			$pelayanan='pelayanan';
			$data['rata_pelayanan']=$this->review->rata_rating($pelayanan,$id);
			
			$kenyamanan='kenyamanan';
			$data['rata_kenyamanan']=$this->review->rata_rating($kenyamanan,$id);
			
			$fasilitas='fasilitas';
			$data['rata_fasilitas']=$this->review->rata_rating($fasilitas,$id);
			
			$this->output(TEMPLATE.'konten/detail_hotel', $data);
			
		}else{
			$this->redirect('error');
		}
		
		
	}
	
	public function tes_pencarian(){
		$katakunci="amar";
		$data_hotel=$this->hotel->cari_hotelJson($katakunci);
		print_r($data_hotel);
	}
	public function tes_email(){
		 $this->email = new Resources\Email;
			
			$to='sanca.snake@gmail.com';
			$subject='Registrasi Umroh Online';
			$message='Tes Email
			';
			
			  $send = $this->email
			->to($to)
			->subject($subject)
			->message($message)
			->from('info@mariumroh.com', 'Mariumroh.com')
			->mail();
	    
        if( $send )
            echo 'success';
        else
            echo 'failed';
		
		
	}
}
