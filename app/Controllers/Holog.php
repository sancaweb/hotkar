<?php
namespace Controllers;
use Resources, Models, Libraries;

class Holog extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->request= new Resources\Request;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->booking = new Models\Booking;
		$this->review = new Models\Review;
		$this->user_back = new Models\User_back;
		
    }
	
	public function index()
    {
		if($this->session->getAllValue()){
			if($this->session->getValue('user_grup')=="1" || $this->session->getValue('user_grup')=="2"){
				$this->redirect('adm_home');
			}else{
				$this->redirect('admhotel');
			}
		}else{
			
			
			$data['title'] = 'Administasi Hotel';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='admhotel';
			
			//captcha itungan
			$listoperator = array('+', '-');
			$operatornya=$listoperator[rand(0, 1)];
			$bil1=rand(0, 10);
			$bil2=rand(0, 10);
			$data['bil1']=$bil1;
			$data['bil2']=$bil2;
			$data['operatornya']=$operatornya;
			
			$this->output('login', $data);
		}
    }
		
	public function pro_log(){
		if($_POST){
			$username=$this->request->post('username',FILTER_SANITIZE_MAGIC_QUOTES);
			$password=md5($this->request->post('password',FILTER_SANITIZE_MAGIC_QUOTES));
			$bil1=$this->request->post('bil1');
			$operatornya=$this->request->post('operatornya');
			$bil2=$this->request->post('bil2');
			$hasil_isi=$this->request->post('hasil_isi');
			
			if($operatornya == '+'){
			$hasil_bil=$bil1+$bil2;
			}else{
				$hasil_bil=$bil1 - $bil2;
			}
			
			if($hasil_bil == $hasil_isi){
				if($this->user_back->cek_user_pass($username,$password)){
					$user_grup=$this->user_back->cek_grup($username,$password)->user_grup;
					$nama_grup=$this->user_back->get_nama_grup_byId($user_grup)->nama_grup;
					$id_user=$this->user_back->get_id_by_user_pass($username,$password)->id;
					$data_user=$this->user_back->get_user_byID($id_user);
					
					$data_session_log=array(
						'id_user'=>$id_user,
						'username'=>$username,						
						'nama_grup'=>$nama_grup,
						'nama_pengguna'=>$data_user->nama_pengguna,
						'user_grup'=>$user_grup,
					);
					$this->session->setValue($data_session_log);
					
					if($user_grup== "3" || $user_grup=="4"){
						$this->redirect('admhotel');
					}else{
						$this->redirect('adm_home');
					}
					
				}else{
					$data['title'] = 'Administasi Hotel';
					$data['subtitle']= 'Halaman utama';
					$data["page"]='admhotel';
					$data['animo']="on";
					//captcha itungan
					$listoperator = array('+', '-');
					$operatornya=$listoperator[rand(0, 1)];
					$bil1=rand(0, 10);
					$bil2=rand(0, 10);
					$data['bil1']=$bil1;
					$data['bil2']=$bil2;
					$data['operatornya']=$operatornya;
					
					$this->output('login', $data);
				}
				
				
			}else{
				$data['title'] = 'Administasi Hotel';
				$data['subtitle']= 'Halaman utama';
				$data["page"]='admhotel';
				$data['animo']="on";
				//captcha itungan
				$listoperator = array('+', '-');
				$operatornya=$listoperator[rand(0, 1)];
				$bil1=rand(0, 10);
				$bil2=rand(0, 10);
				$data['bil1']=$bil1;
				$data['bil2']=$bil2;
				$data['operatornya']=$operatornya;
				
				$this->output('login', $data);
			}
		} 
	}
	
	public function logout(){
		$this->session->destroy();
		$this->redirect('home');
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
