<?php
namespace Controllers;
use Resources, Models, Libraries;

class Booking extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->request= new Resources\Request;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->review = new Models\Review;
		$this->booking = new Models\Booking;
		$this->pengaturan = new Models\Pengaturan;
		$this->randomstring = new Libraries\Randomstring;
		$this->email_attach = new Libraries\Email;
    }
	
	public function index()
    {
		echo'Halaman tidak tersedia.';
    }
	
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
			$no_tlp=$this->request->post('no_tlp');
			$email=$this->request->post('email');
			$permintaan=$this->request->post('permintaan');
			$nama_bank=$this->request->post('nama_bank');
			$no_pesanan=$this->request->post('no_pesanan');
			$total_bayar=$this->request->post('total_bayar');
			
			
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
			$data['total_bayar']=$total_bayar;
			
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
			$random_unik=rand(1,999);
			$total_bayar=$this->request->post('total_bayar') + $random_unik;
			
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
				'total_bayar'=>$total_bayar,
				'kode_transaksi'=>$random_unik,
				'status'=>'1',
				'input_date'=>date('Y-m-d'),
			);
			
			if($this->session->getValue('no_pesanan')){
				$no_pesanannya=$this->session->getValue('no_pesanan');
				$id_pesanan=$this->booking->view_id_by_no_pesanan($no_pesanannya)->id;
			}else{
				if($this->booking->view_id_by_no_pesanan($no_pesanan)){
					$no_pesanannya=$no_pesanan;
					$id_pesanan=$this->booking->view_id_by_no_pesanan($no_pesanannya)->id;
					$this->session->setValue('no_pesanan',$no_pesanannya);
				}else{
					$id_pesanan=$this->booking->input_order($data_order);
					$this->session->setValue('no_pesanan',$no_pesanan);
				}
				
			}
			
			$data['data_kamar']=$this->hotel->view_kamar_byId($id_kamar);
			$data['book_date']=$this->booking->view_bookdate_byId($id_pesanan)->book_date;
			
			$data['checkin']=$checkin;
			$data['checkout']=$checkout;
			$data['jml_kamar']=$jml_kamar;
			$data['id_pesanan']=$id_pesanan; 
			$data['no_pesanan']=$no_pesanan;
			$data['random_unik']=$random_unik;
			

			//data FORM
			$data['nama_guest']=$nama_guest;			
			$data['no_tlp']=$no_tlp;			
			$data['email']=$email;			
			$data['permintaan']=$permintaan;			
			$data['nama_bank']=$nama_bank;	
			$data['total_bayar']=$total_bayar;		
			
			
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
	
	public function finish_booking($id_pesanan=''){
			$id_pesanan=$id_pesanan;
			if($id_pesanan == ''){
				$this->redirect('home');
			}else{
				$id_pesanan=base64_decode($id_pesanan);
				
				$data_order=$this->booking->view_order($id_pesanan);
				if($data_order){
					
					$data_pesanan=array(
						'status'=>'2'
					);
					$this->booking->edit_status($data_pesanan,$id_pesanan);
					
					
					$data['data_kamar']=$this->hotel->view_kamar_byId($data_order->id_kamar);
					$data['checkin']=$data_order->checkin;
					$data['checkout']=$data_order->checkout;
					$data['jml_kamar']=$data_order->jml_kamar;
					$data['no_pesanan']=$data_order->no_pesanan;
					$data['total_bayar']=$data_order->total_bayar;
					$data['title'] = 'Pembayaran';
					$data['subtitle']= 'Halaman utama';
					$data["page"]='finish_booking';
					$data['menu']='hotel';
					
					$this->output(TEMPLATE.'konten/finish_booking', $data);
				}else{
					$this->redirect('home');
				}
				
			}
			
	}
		
	public function procek_pemesanan(){
		
		if($_POST){
		$no_pesanan=TRIM($this->request->post('no_pesanan',FILTER_SANITIZE_MAGIC_QUOTES));
		
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
