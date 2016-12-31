<?php
namespace Controllers;
use Resources, Models, Libraries;

class Admhotel extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->request= new Resources\Request;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->review = new Models\Review;
		$this->pengaturan = new Models\Pengaturan;
		$this->user_back = new Models\User_back;
		$this->booking = new Models\Booking;
		$this->randomstring = new Libraries\Randomstring;
    }
	
	public function index()
    {
		if($this->session->getValue('id_user')){
		$user_id=$this->session->getValue('id_user');
		$id_hotel=$this->hotel->get_id_hotel_by_userId($user_id)->id;
		$data_user=$this->user_back->get_user_byID($user_id);
		$data_booking=$this->booking->viewall_order_by_idHotel($id_hotel);
		
		$data['data_booking'] = $data_booking;
		$data['title'] = 'Administasi Hotel';
		$data['subtitle']= 'Halaman utama';
		$data["page"]='admhotel';
		$data['menu']='admhotel';
		$data['menu_tab']='profile';
		$data['konten_page']=TEMPLATE.'konten/admhotel/profile';
		$data['data_kec_karawang']=$this->pengaturan->viewall_kec_karawang();
		$data['data_hotel']=$this->hotel->view_detail_hotel_byId($id_hotel);
		$this->output(TEMPLATE.'konten/admhotel', $data);
		}else{
			$this->redirect('holog');
		}
    }
	
	public function booking_list()
    {
		if($this->session->getValue('id_user')){
			$user_id=$this->session->getValue('id_user');
			$id_hotel=$this->hotel->get_id_hotel_by_userId($user_id)->id;
			$data_user=$this->user_back->get_user_byID($user_id);
			
			$data_booking=$this->booking->viewall_order_by_idHotel($id_hotel);
			$totalAll_booking=$this->booking->hitungAll_order_by_idHotel($id_hotel);
			
			$data['data_booking'] = $data_booking;
			$data['totalAll_booking'] = $totalAll_booking;
			$data['paid_to_you']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,6);
			$data['all_done']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,7);
			$data['total_checked']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,5);
			$data['payment_verified']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,4);
			$data['masih_proses']=$this->booking->hitung_transaction_on_process($id_hotel);
			
			$data['title'] = 'Administasi Hotel';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='booking';
			$data['menu']='admhotel';
			$data['menu_tab']='booking';
			
			$data['konten_page']=TEMPLATE.'konten/admhotel/booking';
			$this->output(TEMPLATE.'konten/admhotel', $data);
		}else{
			$this->redirect('holog');
		}
    }
	
	public function checked_in_room($id='',$no_pesanan='')
    {
		if($this->session->getValue('id_user')){
			if($id =='' || $no_pesanan==''){
				$this->redirect('admhotel/booking_list');
			}else{
				$id=base64_decode($id);
				$no_pesanan=base64_decode($no_pesanan);
				$user_id=$this->session->getValue('id_user');
				$id_hotel=$id_hotel=$this->hotel->get_id_hotel_by_userId($user_id)->id;;
				//input_chacked
				$data_checked=array(
					'no_pesanan'=>$no_pesanan,
					'id_hotel'=>$id_hotel,
					'user_id'=>$this->session->getValue('id_user'),
					'input_date'=>date("Y-m-d H:i:s")		
				);
				$this->booking->input_checked($data_checked);
				//edit_pesanan
				$data_pesanan=array(
					'status'=>'5'
				);
				
				$this->booking->edit_status($data_pesanan,$id);
				
				
				$data_user=$this->user_back->get_user_byID($user_id);
				
				$data_booking=$this->booking->viewall_order_by_idHotel($id_hotel);
				
				$totalAll_booking=$this->booking->hitungAll_order_by_idHotel($id_hotel);
				$data['alert']='
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4>	<i class="icon fa fa-check"></i> Status Pemesanan dengan No.'.$no_pesanan.' sudah dirubah.</h4>
					</div>
				';
				
				$data['data_booking'] = $data_booking;
				$data['totalAll_booking'] = $totalAll_booking;
				$data['paid_to_you']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,6);
				$data['all_done']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,7);
				$data['total_checked']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,5);
				$data['payment_verified']=$this->booking->hitung_order_by_idHotel_and_status($id_hotel,4);
				$data['masih_proses']=$this->booking->hitung_transaction_on_process($id_hotel);
				
				
				$data['title'] = 'Administasi Hotel';
				$data['subtitle']= 'Halaman utama';
				$data["page"]='booking';
				$data['menu']='admhotel';
				$data['menu_tab']='booking';
				
				$data['konten_page']=TEMPLATE.'konten/admhotel/booking';
				$this->output(TEMPLATE.'konten/admhotel', $data);
				
			}
			
			
			
			
		}else{
			$this->redirect('holog');
		}
    }
	
	
	
	public function room_list()
    {
		if($this->session->getValue('id_user')){
		$user_id=$this->session->getValue('id_user');
		$id_hotel=$this->hotel->get_id_hotel_by_userId($user_id)->id;
		$data_user=$this->user_back->get_user_byID($user_id);
		$data_booking=$this->booking->viewall_order_by_idHotel($id_hotel);
		
		$data['data_booking'] = $data_booking;
		$data['title'] = 'Administasi Hotel';
		$data['subtitle']= 'Halaman utama';
		$data["page"]='room_list';
		$data['menu']='admhotel';
		$data['menu_tab']='room_list';
		
		$data['konten_page']=TEMPLATE.'konten/admhotel/room_list';
		$this->output(TEMPLATE.'konten/admhotel', $data);
		}else{
			$this->redirect('holog');
		}
    }
	
	public function change_password()
    {
		if($this->session->getValue('id_user')){
		$user_id=$this->session->getValue('id_user');
		$id_hotel=$this->hotel->get_id_hotel_by_userId($user_id)->id;
		$data_user=$this->user_back->get_user_byID($user_id);
		$data_booking=$this->booking->viewall_order_by_idHotel($id_hotel);
		
		$data['data_booking'] = $data_booking;
		$data['title'] = 'Administasi Hotel';
		$data['subtitle']= 'Halaman utama';
		$data["page"]='change_password';
		$data['menu']='admhotel';
		$data['menu_tab']='change_password';
		
		$data['konten_page']=TEMPLATE.'konten/admhotel/change_password';
		$this->output(TEMPLATE.'konten/admhotel', $data);
		}else{
			$this->redirect('holog');
		}
    }
	
	//ke bawah gak jelas, nanti delete aja
	
	
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
