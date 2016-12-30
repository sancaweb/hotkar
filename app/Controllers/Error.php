<?php
namespace Controllers;
use Resources, Models, Libraries;

class Error extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		
    }
	
	public function index()
    {
        $data['title'] = 'Home';
		$data['subtitle']= 'Halaman utama';
		$data["page"]='home';
		$data['konten']='konten/home';
		$data['menu']='home';
		
        $this->output('errors/404');
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
