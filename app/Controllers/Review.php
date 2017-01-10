<?php
namespace Controllers;
use Resources, Models, Libraries;

class Review extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->booking = new Models\Booking;
		$this->review = new Models\Review;
		
    }
	
	public function index()
    {
		echo 'Halaman tidak tersedia.'
    }
	
	public function input_review(){
		
		$id_hotel=$this->request->post('id_hotel');
		$nama_guest=$this->request->post('nama_guest');
		$asal_kota=$this->request->post('asal_kota');
		
		$judul=$this->request->post('judul');
		$testimoni=$this->request->post('testimoni');
		$bintang=$this->request->post('bintang');
		$kebersihan=$this->request->post('kebersihan');
		$kenyamanan=$this->request->post('kenyamanan');
		$pelayanan=$this->request->post('pelayanan');
		$fasilitas=$this->request->post('fasilitas');
		$rekomendasi=$this->request->post('rekomendasi');
		$tanggal=date('Y-m-d');
		
		$data_review=array(
			'id_hotel'=>$id_hotel,
			'nama_guest'=>$nama_guest,
			'asal_kota'=>$asal_kota,
			'judul'=>$judul,
			'testimoni'=>$testimoni,
			'bintang'=>$bintang,
			'kebersihan'=>$kebersihan,
			'kenyamanan'=>$kenyamanan,
			'pelayanan'=>$pelayanan,
			'fasilitas'=>$fasilitas,
			'rekom'=>$rekomendasi
			'tanggal'=>$tanggal
		);
		$this->review->input_review($data_review);
		
		
		
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
