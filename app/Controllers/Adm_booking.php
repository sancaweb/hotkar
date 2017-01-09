<?php
namespace Controllers;
use Resources, Models, Libraries;

class Adm_booking extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->pengaturan = new Models\Pengaturan;
		$this->user_back = new Models\User_back;
		$this->booking = new Models\Booking;
		$this->request= new Resources\Request;
		$this->upload=new Resources\Upload;
		$this->image = new Resources\Image;
		$this->randomstring=new Libraries\Randomstring;
		$this->pdf=new Libraries\Print_pdf;
		$this->email=new Libraries\Email;
		
    }
	
	public function index($page=1)
    {
        //pagination
		$this->pagination = new Resources\Pagination();
        $page = (int) $page;
        $limit = 5;
		$total_pemesanan=$this->booking->totalAll_order();
		
				
		$data['viewall_pemesanan']=$this->booking->viewall_order_page($page, $limit);
		
		$data['total_pemesanan'] = $total_pemesanan;
		$data['pageLinks'] = $this->pagination->setOption(
				array(
					'limit' => $limit,
					'base' => $this->uri->baseUri.'index.php/adm_booking/index/%#%/',
					'total' => $total_pemesanan,	
					'current' => $page,
					)
							)->getUrl(); 
		
		$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
		//end pagination
		$list_hotel=$this->hotel->viewall_hotel();
		$list_status=$this->booking->viewall_status();
		
		$data['title'] = 'Admin Panel';
		$data['subtitle']= 'Data Pemesanan';
		$data['page']='booking';
		$data['konten']='admin/konten/booking';
		$data['total_pemesanan']=$total_pemesanan;
		$data['list_hotel']= $list_hotel;
		$data['list_status']=$list_status;
		//FOR Modal
		$data['viewall_pemesanan_modal_edit']=$this->booking->viewall_order_page($page, $limit);
		
        $this->output('admin/index', $data);
    }
	
	public function edit_pemesanan($page=1)
    {
        if($_POST){
			$id_pemesanan=$this->request->post('id_pemesanan');
			$status=$this->request->post('status');
			$data_pesanan=array(
				'status'=>$status
			);
			//$this->booking->edit_status($data_pesanan,$id_pemesanan);
			
			//pagination
			$this->pagination = new Resources\Pagination();
			$page = (int) $page;
			$limit = 5;
			$total_pemesanan=$this->booking->totalAll_order();
			
					
			$data['viewall_pemesanan']=$this->booking->viewall_order_page($page, $limit);
			
			$data['total_pemesanan'] = $total_pemesanan;
			$data['pageLinks'] = $this->pagination->setOption(
					array(
						'limit' => $limit,
						'base' => $this->uri->baseUri.'index.php/adm_booking/index/%#%/',
						'total' => $total_pemesanan,	
						'current' => $page,
						)
								)->getUrl(); 
			
			$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
			//end pagination
			$list_hotel=$this->hotel->viewall_hotel();
			$list_status=$this->booking->viewall_status();
			
			$data['title'] = 'Admin Panel';
			$data['subtitle']= 'Data Pemesanan';
			$data['page']='booking';
			$data['konten']='admin/konten/booking';
			$data['total_pemesanan']=$total_pemesanan;
			$data['list_hotel']= $list_hotel;
			$data['list_status']=$list_status;
			//FOR Modal
			$data['viewall_pemesanan_modal_edit']=$this->booking->viewall_order_page($page, $limit);
			
			$this->output('admin/index', $data);
		}else{
			$this->redirect('adm_booking');
		}
		
		
    }
	
public function tes_pdf(){
		$filename='Lailahaillallah';
		$nama_pemesan='Gua aja dah ya';
		$cetak=$this->pdf->cetak($filename,$nama_pemesan);
		
		$penerima='sanca.snake@gmail.com';
		$pengirim='hotelkarawang.com';
		$nama='Hotel Karawang ';
		$subjek='Voucher Pemesanan';
		$pesan='Terimakasih telah mempercayai hotelkarawang.com';
		$files=$filename.'.pdf';
		$this->email->email($penerima,$pengirim,$nama,$subjek,$pesan,$files);
		
	}
	
	
}
