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
				
				$data['alert']='
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4>	<i class="icon fa fa-check"></i> Status Pemesanan dengan No.'.$no_pesanan.' sudah dirubah.</h4>
					</div>
				';
				$data['data_booking'] = $data_booking;
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
	public function booking_form(){
		if($_POST){
			$id_kamar=$this->request->post('id_kamar');
			$checkin=$this->request->post('checkin');
			$checkout=$this->request->post('checkout');
			$jml_kamar=$this->request->post('jml_kamar');
			
			$acak=$this->randomstring->randomstring(4);			
			$tgl=date("d");
			$bln=date("m");
			$thn=date("y");
			$no_pesanan=$tgl.$acak.$bln.$thn;
			
			
			$data['data_kamar']=$this->hotel->view_kamar_byId($id_kamar);
			$data['checkin']=$checkin;
			$data['checkout']=$checkout;
			$data['jml_kamar']=$jml_kamar;
			$data['no_pesanan']=$no_pesanan;
			
			$data['title'] = 'Booking Form';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='booking_form';
			$data['menu']='hotel';
			

			$this->output(TEMPLATE.'konten/booking_form', $data);
		}else{
			$this->redirect('home');
		}
		
		
	}
	
	public function booking_review(){
		if($_POST){
			$id_kamar=$this->request->post('id_kamar');
			$id_hotel=$this->request->post('id_hotel');
			$checkin=$this->request->post('checkin');
			$checkout=$this->request->post('checkout');
			$jml_kamar=$this->request->post('jml_kamar');
			
			$nama_guest=ucwords($this->request->post('nama_guest',FILTER_SANITIZE_MAGIC_QUOTES));
			$no_tlp=$this->request->post('nama_guest');
			$email=$this->request->post('email');
			$permintaan=$this->request->post('permintaan');
			$nama_bank=$this->request->post('nama_bank');
			$no_pesanan=$this->request->post('no_pesanan');
			
			
			$data['data_kamar']=$this->hotel->view_kamar_byId($id_kamar);
			$data['checkin']=$checkin;
			$data['checkout']=$checkout;
			$data['jml_kamar']=$jml_kamar;

			//data FORM
			$data['nama_guest']=$nama_guest;			
			$data['no_tlp']=$no_tlp;			
			$data['email']=$email;			
			$data['permintaan']=$permintaan;			
			$data['nama_bank']=$nama_bank;
			$data['no_pesanan']=$no_pesanan;
			
			$data['title'] = 'Booking Form';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='booking_review';
			$data['menu']='hotel';
			
			$this->session->deleteValue('no_pesanan');
			
			$this->output(TEMPLATE.'konten/booking_review', $data);
			
		}else{
			$this->redirect('home');
		}
	}
	
	public function info_pembayaran(){
		
		if($_POST){
			$id_kamar=$this->request->post('id_kamar');
			$id_hotel=$this->request->post('id_hotel');
			$checkin=$this->request->post('checkin');
			$checkout=$this->request->post('checkout');
			$jml_kamar=$this->request->post('jml_kamar');
			$no_pesanan=$this->request->post('no_pesanan');
			
			$nama_guest=ucwords($this->request->post('nama_guest',FILTER_SANITIZE_MAGIC_QUOTES));
			$no_tlp=$this->request->post('no_tlp');
			$email=$this->request->post('email');
			$permintaan=$this->request->post('permintaan');
			$nama_bank=$this->request->post('nama_bank');
			
			$data_order=array(
				'no_pesanan'=>$no_pesanan,
				'tlp'=>$no_tlp,
				'nama_guest'=>$nama_guest,
				'bank_transfer'=>$nama_bank,
				'email'=>$email,
				'id_hotel'=>$id_hotel,
				'id_kamar'=>$id_kamar,
				'checkin'=>$checkin,
				'checkout'=>$checkout,
				'jml_kamar'=>$jml_kamar,
				'permintaan'=>$permintaan,
				'book_date'=>date("Y-m-d H:i:s"),
				'status'=>'1',
				'input_date'=>date('Y-m-d'),
			);
			
			if($this->session->getValue('no_pesanan')){
				$no_pesanannya=$this->session->getValue('no_pesanan');
				$order_id=$this->booking->view_id_by_no_pesanan($no_pesanannya)->id;
			}else{
				if($this->booking->view_id_by_no_pesanan($no_pesanan)){
					$no_pesanannya=$no_pesanan;
					$order_id=$this->booking->view_id_by_no_pesanan($no_pesanannya)->id;
					$this->session->setValue('no_pesanan',$no_pesanannya);
				}else{
					$order_id=$this->booking->input_order($data_order);
					$this->session->setValue('no_pesanan',$no_pesanan);
				}
				
			}
			
			$data['data_kamar']=$this->hotel->view_kamar_byId($id_kamar);
			$data['book_date']=$this->booking->view_bookdate_byId($order_id)->book_date;
			
			$data['checkin']=$checkin;
			$data['checkout']=$checkout;
			$data['jml_kamar']=$jml_kamar;
			$data['order_id']=$order_id; 
			$data['no_pesanan']=$no_pesanan;
			

			//data FORM
			$data['nama_guest']=$nama_guest;			
			$data['no_tlp']=$no_tlp;			
			$data['email']=$email;			
			$data['permintaan']=$permintaan;			
			$data['nama_bank']=$nama_bank;			
			
			
			$data['title'] = 'Pembayaran';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='info_pembayaran';
			$data['menu']='hotel';
			
			$this->output(TEMPLATE.'konten/instruksi_bayar', $data);
			
		}else{
			$this->session->deleteValue('no_pesanan');
			$this->redirect('home');
		}
	}
	
	public function finish_booking($order_id){
			
			$order_id=base64_decode($order_id);
			$data_order=$this->booking->view_order($order_id);			
			
			$data['data_kamar']=$this->hotel->view_kamar_byId($data_order->id_kamar);
			$data['checkin']=$data_order->checkin;
			$data['checkout']=$data_order->checkout;
			$data['jml_kamar']=$data_order->jml_kamar;
			$data['no_pesanan']=$data_order->no_pesanan;
			$data['title'] = 'Pembayaran';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='finish_booking';
			$data['menu']='hotel';
			
			$this->output(TEMPLATE.'konten/finish_booking', $data);
		
	}
	
	public function cek_pemesanan(){
		$data['title'] = 'Cek Pemesanan';
		$data['subtitle']= 'Cek Pemesanan Hotel';
		$data["page"]='cek_pemesanan';
		$data['menu']='cek_pemesanan';
		$this->output(TEMPLATE.'konten/cek_pemesanan', $data);
	}
	
	public function procek_pemesanan(){
		
		if($_POST){
		$no_pesanan=TRIM($this->request->post('no_pesanan',FILTER_SANITIZE_MAGIC_QUOTES));
		//echo $no_pesanan;exit;
		$data_pesanan=$this->booking->viewall_by_no_pesanan($no_pesanan);
		
		$data['title'] = 'Cek Pemesanan';
		$data['subtitle']= 'Cek Pemesanan Hotel';
		$data["page"]='procek_pemesanan';
		$data['menu']='cek_pemesanan';
		$data['data_pesanan']=$data_pesanan;
		$this->output(TEMPLATE.'konten/procek', $data);
			
		}else{
			$this->redirect('booking/cek_pemesanan');
		}
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
