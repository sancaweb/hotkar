<?php
namespace Controllers;
use Resources, Models, Libraries;

class Adm_hotel extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->pengaturan = new Models\Pengaturan;
		$this->user_back = new Models\User_back;
		$this->request= new Resources\Request;
		$this->upload=new Resources\Upload;
		$this->randomstring=new Libraries\Randomstring;
		$this->image = new Resources\Image; 
		
    }
	
	public function index($page=1)
    {
        //pagination
		$this->pagination = new Resources\Pagination();
        $page = (int) $page;
        $limit = 5;
		$total_hotel=$this->hotel->total_hotel();
		
				
		$data['viewall_hotel']=$this->hotel->viewall_hotel_page($page, $limit);
		
		$data['total_hotel'] = $total_hotel;
		$data['pageLinks'] = $this->pagination->setOption(
				array(
					'limit' => $limit,
					'base' => $this->uri->baseUri.'index.php/adm_hotel/index/%#%/',
					'total' => $total_hotel,	
					'current' => $page,
					)
							)->getUrl(); 
		
		$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
		//end pagination
		
		$data['title'] = 'Admin Panel';
		$data['subtitle']= 'Data Hotel';
		$data['page']='hotel';
		$data['konten']='admin/konten/hotel';
		$data['total_hotel']=$this->hotel->total_hotel();
		$data['data_kec_karawang']=$this->pengaturan->viewall_kec_karawang();
		//FOR Modal
		$data['viewall_hotel_modal_detail']=$this->hotel->viewall_hotel_page($page, $limit);
		$data['viewall_hotel_modal_edit']=$this->hotel->viewall_hotel_page($page, $limit);
		
        $this->output('admin/index', $data);
    }
	
	public function pro_input_hotel($page=1)
    {
		if($_POST){
			//data user_hotel
			$username=$this->request->post('username');
			$password=$this->request->post('password');
			$nama_pengguna=ucwords($this->request->post('nama_pengguna'));
			$email=$this->request->post('email');
			
			$data_user_back=array(
				'username'=>$username,
				'password'=>md5($password),
				'nama_pengguna'=>$nama_pengguna,
				'email'=>$email,
				'user_grup'=>3,
				'input_date'=>date('Y-m-d'),
			);
			
			$user_back_id=$this->user_back->input_user($data_user_back);
			
			$nama_hotel=ucwords($this->request->post('nama_hotel'));
			$alamat=ucwords($this->request->post('alamat'));
			$kecamatan=ucwords($this->request->post('kecamatan'));
			$informasi=$this->request->post('informasi');
			$input_date=date('Y-m-d');
			
			
			//Input Hotel
			$data_hotel=array(
				'nama_hotel'=>$nama_hotel,
				'alamat'=>$alamat,
				'kecamatan'=>$kecamatan,
				'informasi'=>$informasi,
				'user_id'=>$user_back_id,
				'input_date'=>$input_date
			);
			
			$hotel_id=$this->hotel->input_hotel($data_hotel);
			
			// upload gambar_hotel
			$pengulang_gambar=$this->request->post('pengulang_gambar');
			$x=0;
			foreach($pengulang_gambar as $pengulang_gambar) {
				
				//prosesupload
				$foto=$_FILES['foto'.$x.''];
					if(isset($_FILES['foto'.$x.''])) {
						$this->upload->setOption(
							array(
								'folderLocation' => 'upload/gambar_hotel',
								'autoRename' => true,
								'permittedFileType' => 'gif|png|jpg|jpeg',
								'maximumSize' => 5000000, //5Mb
								'editImage' => array(
									'editType' => PIMG_RESIZE,
									'resizeWidth' => 723,
									'resizeHeight' => 407
								)
							
						));
						
						$file = $this->upload->now($foto);
						$nama_foto=$this->upload->getFileInfo();						
						
						if($file) {
							$this->image
							->setOption(
								array(
								'editType' => PIMG_RESIZE,
								'folder' => 'upload/gambar_hotel',
								'resizeWidth' => 120,
								'resizeHeight' => 68,
								'saveTo'=>'upload/gambar_hotel/thumbs',
								)
							)
							->edit($nama_foto['name']);
							//sukses
							//input gambar_hotel
							if($x==1){
								$featured='yes';
							}else{
								$featured='no';
							}
							
							$gambar_hotel=array(
								'id_hotel'=>$hotel_id,
								'url_gambar'=>$nama_foto['name'],
								'featured'=>$featured,
								'input_date'=>date('Y-m-d'),
							);
							
							$this->hotel->input_gambar($gambar_hotel);
							
						}
											
					} //if isset $foto
				//END UPLOAD
				$x++;
			} // pengulangan foto
			
			//fasilitas hotel
			$pengulang_fasilitas_hotel=$this->request->post('pengulang_fasilitas_hotel');
			$fasilitas_hotel=$this->request->post('fasilitas_hotel');
			$i=0;
			foreach($pengulang_fasilitas_hotel as $pengulang_fasilitas_hotel){
				$data_fasilitas_hotel=array(
						'id_hotel'=>$hotel_id,
						'fasilitas_hotel'=>ucwords($fasilitas_hotel[$i]),
						'input_date'=>date('Y-m-d'),
				);
				$this->hotel->input_fasilitas_hotel($data_fasilitas_hotel);
				$i++;
			}
			
			//pagination
			$this->pagination = new Resources\Pagination();
			$page = (int) $page;
			$limit = 10;
			$total_hotel=$this->hotel->total_hotel();
					
			$data['viewall_hotel']=$this->hotel->viewall_hotel_page($page, $limit);
			$data['total_hotel'] = $total_hotel;
			$data['pageLinks'] = $this->pagination->setOption(
					array(
						'limit' => $limit,
						'base' => $this->uri->baseUri.'index.php/adm_hotel/index/%#%/',
						'total' => $total_hotel,	
						'current' => $page,
						)
								)->getUrl(); 
			
			$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
			//end pagination
			
			$data['title'] = 'Admin Panel';
			$data['subtitle']= 'Data Hotel';
			$data["page"]='hotel';
			$data['konten']='admin/konten/hotel';			
			$data['total_hotel']=$this->hotel->total_hotel();
			$data['data_kec_karawang']=$this->pengaturan->viewall_kec_karawang();
			
			//FOR Modal
			$data['viewall_hotel_modal_detail']=$this->hotel->viewall_hotel_page($page, $limit);
			$data['viewall_hotel_modal_edit']=$this->hotel->viewall_hotel_page($page, $limit);
		
			$this->output('admin/index', $data);
		}else{
			$this->redirect('adm_hotel');
		}
    }
	
	public function pro_edit_hotel($page=1)
    {
		if($_POST){
			$id_hotel=$this->request->post('id_hotel');
			$nama_hotel=ucwords($this->request->post('nama_hotel'));
			$alamat=ucwords($this->request->post('alamat'));
			$kecamatan=ucwords($this->request->post('kecamatan'));
			$informasi=$this->request->post('informasi');
			$input_date=date('Y-m-d');
			
			//Edit Hotel
			$data_hotel=array(
				'nama_hotel'=>$nama_hotel,
				'alamat'=>$alamat,
				'kecamatan'=>$kecamatan,
				'informasi'=>$informasi,
				'input_date'=>$input_date
			);
			
			$this->hotel->edit_hotel($data_hotel,$id_hotel);
			
			$jumlah_gambar=$this->hotel->hitung_gambar_by_idHotel($id_hotel);
			//proses penghapusan foto jika ada yang di ceklis
			for ($x = 0; $x < $jumlah_gambar; $x++) {
				$fotonya='hapus_foto'.$x;
				
				if(isset($_POST[$fotonya])){
					$hapus_foto=$this->request->post($fotonya);					
					if($this->hotel->get_urlGambar_byID($hapus_foto)){
						$url_gambar=$this->hotel->get_urlGambar_byID($hapus_foto)->url_gambar;
					
						if(file_exists('upload/gambar_hotel/'.$url_gambar)){
							unlink('upload/gambar_hotel/'.$url_gambar);						
						}
						if(file_exists('upload/gambar_hotel/thumbs/'.$url_gambar)){
							unlink('upload/gambar_hotel/thumbs/'.$url_gambar);						
						}
						
						$this->hotel->hapus_gambar_byId($hapus_foto);
					}
					
					
				}
				
			}
			
			
			
			//upload gambar_hotel<--
			$pengulang_gambar=$this->request->post('pengulang_gambar');
			$z=0;
			foreach($pengulang_gambar as $pengulang_gambar) {
				
				//prosesupload <--
					if(isset($_FILES['foto'.$z.''])) {
						$this->upload->setOption(
							array(
								'folderLocation' => 'upload/gambar_hotel',
								'autoRename' => true,
								'permittedFileType' => 'gif|png|jpg|jpeg',
								'maximumSize' => 5000000, //5Mb
								'editImage' => array(
									'editType' => PIMG_RESIZE,
									'resizeWidth' => 723,
									'resizeHeight' => 407
								)
							
						));
						
						$file = $this->upload->now($_FILES['foto'.$z.'']);
						$nama_foto=$this->upload->getFileInfo();						
						
						if($file) {
							$this->image
							->setOption(
								array(
								'editType' => PIMG_RESIZE,
								'folder' => 'upload/gambar_hotel',
								'resizeWidth' => 120,
								'resizeHeight' => 68,
								'saveTo'=>'upload/gambar_hotel/thumbs',
								)
							)
							->edit($nama_foto['name']);
							//sukses <--
														
							$gambar_hotel=array(
								'id_hotel'=>$id_hotel,
								'url_gambar'=>$nama_foto['name'],
								'input_date'=>date('Y-m-d'),
							);
							
							$this->hotel->input_gambar($gambar_hotel);
							
						}
											
					} //if isset $foto
				//END UPLOAD <--
				$x++;
			} // pengulangan upload foto
			
			
			//penghapusan fasilitas ceklis
			$jumlah_fasilitas=$this->hotel->hitung_fasilitas_hotel_byIDhotel($id_hotel);
			for ($y = 0; $y < $jumlah_fasilitas; $y++) {
				$id_fasilitas='hapus_fasilitas'.$y;
				$old_fasilitasnya='old_fasilitas_hotel'.$y;
				
				if(isset($_POST[$id_fasilitas])){
					$hapus_fasilitas=$this->request->post($id_fasilitas);
					$this->hotel->hapus_fasilitas_hotel_byId($hapus_fasilitas)	;
				}else{
					//edit fasilitas hotel					
					$old_fasilitas_hotel=$this->request->post($old_fasilitasnya);
					$hapus_fasilitas=$this->request->post($id_fasilitas);
					$data_fasilitas=array(
						'fasilitas_hotel'=>$old_fasilitas_hotel,
						);
					
					$this->hotel->edit_fasilitas($data_fasilitas,$hapus_fasilitas);
				}
				
				
			}
			
			//Input fasilitas hotel
			$fasilitas_hotel=array_filter($this->request->post('fasilitas_hotel'),'strlen');
			
			if(!empty($fasilitas_hotel)){
				
				$pengulang_fasilitas_hotel=$this->request->post('pengulang_fasilitas_hotel');
				
				$i=0;
				foreach($pengulang_fasilitas_hotel as $pengulang_fasilitas_hotel){
					$data_fasilitas_hotel=array(
							'id_hotel'=>$id_hotel,
							'fasilitas_hotel'=>ucwords($fasilitas_hotel[$i]),
							'input_date'=>date('Y-m-d'),
					);
					$this->hotel->input_fasilitas_hotel($data_fasilitas_hotel);
					
					$i++;				
				}
				
			
			}
			
			//pagination
			$this->pagination = new Resources\Pagination();
			$page = (int) $page;
			$limit = 10;
			$total_hotel=$this->hotel->total_hotel();
					
			$data['viewall_hotel']=$this->hotel->viewall_hotel_page($page, $limit);
			$data['total_hotel'] = $total_hotel;
			$data['pageLinks'] = $this->pagination->setOption(
					array(
						'limit' => $limit,
						'base' => $this->uri->baseUri.'index.php/adm_hotel/index/%#%/',
						'total' => $total_hotel,	
						'current' => $page,
						)
								)->getUrl(); 
			
			$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
			//end pagination
			
			$data['alert']='
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4>	<i class="icon fa fa-check"></i> Edit Hotel Berhasil</h4>
				</div>
			';
			
			$data['title'] = 'Admin Panel';
			$data['subtitle']= 'Data Hotel';
			$data["page"]='hotel';
			$data['konten']='admin/konten/hotel';			
			$data['total_hotel']=$this->hotel->total_hotel();
			$data['data_kec_karawang']=$this->pengaturan->viewall_kec_karawang();
			//FOR Modal
			$data['viewall_hotel_modal_detail']=$this->hotel->viewall_hotel_page($page, $limit);
			$data['viewall_hotel_modal_edit']=$this->hotel->viewall_hotel_page($page, $limit);
		
			$this->output('admin/index', $data);
		}else{
			$this->redirect('adm_hotel');
		}
    }
		
	public function kamar($page=1)
    {
		//pagination
			$this->pagination = new Resources\Pagination();
			$page = (int) $page;
			$limit = 10;
			$total_kamar=$this->hotel->hitungall_kamar();
					
			$data['viewall_kamar']=$this->hotel->viewall_kamar_page($page, $limit);
			$data['total_kamar'] = $total_kamar;
			$data['pageLinks'] = $this->pagination->setOption(
					array(
						'limit' => $limit,
						'base' => $this->uri->baseUri.'index.php/adm_hotel/kamar/%#%/',
						'total' => $total_kamar,	
						'current' => $page,
						)
								)->getUrl(); 
			
			$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
			//end pagination
		
		
		
        $data['title'] = 'Admin Panel';
		$data['subtitle']= 'Data Kamar Hotel';
		$data["page"]='kamar';
		$data['konten']='admin/konten/kamar';
		//$data['list_hotel']=$this->hotel->viewall_hotel();
        $this->output('admin/index', $data);
    }
	
	public function view_kamar($id_hotel='',$page=1)
    {
		$id_hotel=$id_hotel;
		
		if($this->hotel->view_nama_hotel_byID($id_hotel) || $id_hotel != ''){
			
			$id_hotel=base64_decode($id_hotel);
			
			//pagination
			$this->pagination = new Resources\Pagination();
			$page = (int) $page;
			$limit = 10;
			$total_kamar=$this->hotel->hitung_kamar_by_idHotel($id_hotel);
					
			$data['viewall_kamar']=$this->hotel->viewall_kamar_page_byIDhotel($id_hotel,$page, $limit);
			$data['total_kamar'] = $total_kamar;
			$data['pageLinks'] = $this->pagination->setOption(
					array(
						'limit' => $limit,
						'base' => $this->uri->baseUri.'index.php/adm_hotel/view_kamar/'.base64_encode($id_hotel).'/%#%/',
						'total' => $total_kamar,	
						'current' => $page,
						)
								)->getUrl(); 
			
			$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
			//end pagination
			
			$data['id_hotel']=$id_hotel;			
			$data['nama_hotel']=$this->hotel->view_nama_hotel_byID($id_hotel)->nama_hotel;			
			$data['title'] = 'Admin Panel';
			$data['subtitle']= 'Data Kamar Hotel';
			$data["page"]='kamar';
			$data['konten']='admin/konten/kamar';
			
			$this->output('admin/index', $data);
			
			
		}else{
			$this->redirect('error');
		}
		
    }
	
	public function pro_input_kamar($page=1)
    {
		if($_POST){
			
			$id_hotel=$this->request->post('id_hotel');
			$nama_kamar=ucwords($this->request->post('nama_kamar'));
			$kapasitas=$this->request->post('kapasitas');
			$harga=str_replace(',','',$this->request->post('harga'));
			$jumlah_ketersediaan=$this->request->post('jumlah_ketersediaan');
			$informasi=$this->request->post('informasi');
			
			$input_date=date('Y-m-d');
			
			
			//Input kamar
			$data_kamar=array(
				'id_hotel'=>$id_hotel,
				'nama_kamar'=>$nama_kamar,
				'kapasitas'=>$kapasitas,
				'harga'=>$harga,
				'jumlah_ketersediaan'=>$jumlah_ketersediaan,
				'informasi'=>$informasi,
				'input_date'=>$input_date
			);
			
			$id_kamar=$this->hotel->input_kamar($data_kamar);
			
			// upload gambar_kamar
			$pengulang_gambar=$this->request->post('pengulang_gambar');
			$x=0;
			foreach($pengulang_gambar as $pengulang_gambar) {
				
				//prosesupload
				$foto=$_FILES['foto'.$x.''];
					if(isset($foto)) {
						$this->upload->setOption(
							array(
								'folderLocation' => 'upload/gambar_kamar',
								'autoRename' => true,
								'permittedFileType' => 'gif|png|jpg|jpeg',
								'maximumSize' => 5000000, //5Mb
								'editImage' => array(
									'editType' => PIMG_RESIZE,
									'resizeWidth' => 723,
									'resizeHeight' => 407
								)
							
						));
						
						$file = $this->upload->now($foto);
						$nama_foto=$this->upload->getFileInfo();						
						
						if($file) {
							$this->image
							->setOption(
								array(
								'editType' => PIMG_RESIZE,
								'folder' => 'upload/gambar_kamar',
								'resizeWidth' => 200,
								'resizeHeight' => 148, 
								'saveTo'=>'upload/gambar_kamar/thumbs',
								)
							)
							->edit($nama_foto['name']);
							//sukses
							//input gambar_kamar
							
							$gambar_kamar=array(
								'id_kamar'=>$id_kamar,
								'url_gambar'=>$nama_foto['name'],
								'input_date'=>$input_date
							);
							
							$this->hotel->input_gambar_kamar($gambar_kamar);
							
						}
											
					} //if isset $foto
				//END UPLOAD
				$x++;
			} // pengulangan foto
			
			//fasilitas kamar
			$pengulang_fasilitas_kamar=$this->request->post('pengulang_fasilitas_kamar');
			$fasilitas_kamar=$this->request->post('fasilitas_kamar');
			$i=0;
			foreach($pengulang_fasilitas_kamar as $pengulang_fasilitas_kamar){
				$data_fasilitas_kamar=array(
						'id_hotel'=>$id_hotel,
						'id_kamar'=>$id_kamar,		
						'fasilitas_kamar'=>ucwords($fasilitas_kamar[$i]),
						'input_date'=>$input_date,
				);
				$this->hotel->input_fasilitas_kamar($data_fasilitas_kamar);
				$i++;
			}
			
			$data['alert']='
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4>	<i class="icon fa fa-check"></i> Input Kamar Berhasil</h4>
				</div>
			';
			
			//pagination
			$this->pagination = new Resources\Pagination();
			$page = (int) $page;
			$limit = 10;
			$total_kamar=$this->hotel->hitung_kamar_by_idHotel($id_hotel);
					
			$data['viewall_kamar']=$this->hotel->viewall_kamar_page_byIDhotel($id_hotel,$page = 1, $limit = 5);
			$data['total_kamar'] = $total_kamar;
			$data['pageLinks'] = $this->pagination->setOption(
					array(
						'limit' => $limit,
						'base' => $this->uri->baseUri.'index.php/adm_hotel/kamar/%#%/',
						'total' => $total_kamar,	
						'current' => $page,
						)
								)->getUrl(); 
			
			$data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
			//end pagination
			
			$data['nama_hotel']=$this->hotel->view_nama_hotel_byID($id_hotel)->nama_hotel;
			
			$data['title'] = 'Admin Panel';
			$data['subtitle']= 'Data Kamar';
			$data["page"]='kamar';
			$data['konten']='admin/konten/kamar';
			$data['id_hotel']=$id_hotel;
			//FOR Modal
			$data['viewall_kamar_modal_detail']=$this->hotel->viewall_kamar_page_byIDhotel($id_hotel,$page = 1, $limit = 5);
			
			$this->output('admin/index', $data);
		}else{
			$this->redirect('adm_hotel');
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
	
	public function hapus_fasilitas(){
		
	}
}
