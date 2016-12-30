<?php
namespace Controllers;
use Resources, Models, Libraries;

class Home extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->pengaturan = new Models\Pengaturan;
		$this->booking = new Models\Booking;
		$this->review = new Models\Review;
		$this->rating= new Libraries\Rating;
		
    }
	
	public function index()
    {
		
		$limit=3;
		$data_hotel=$this->hotel->viewall_hotel_limit($limit);
		$data_hotel2=$this->hotel->viewall_hotel_limit2($limit);
		$home_slide=$this->hotel->viewall_hotel_limit($limit);
		$hot_deals=$this->booking->hot_deals($limit);
		
		$data['data_hotel'] = $data_hotel;
		$data['data_hotel2'] = $data_hotel2;
		$data['home_slide'] = $home_slide;
		$data['hot_deals'] = $hot_deals;
		$data['top_rating_hotel']=$this->review->top_rekom($limit);
		
        $data['title'] = 'Home';
		$data['subtitle']= 'Halaman utama';
		$data["page"]='home';
		
		$data['menu']='home';	
		
		
        $this->output(TEMPLATE.'homepage', $data);
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
