<?php
namespace Controllers;
use Resources, Models, Libraries;

class Adm_home extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		
    }
	
	public function index()
    {
        $data['title'] = 'Admin Panel';
		$data['subtitle']= 'Halaman utama';
		$data["page"]='home';
		$data['konten']='admin/konten/dashboard';
		
        $this->output('admin/index', $data);
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
