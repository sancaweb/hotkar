<?php
namespace Controllers;
use Resources, Models, Libraries;

class Data_json extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->request = new Resources\Request;
		$this->upload=new Resources\Upload;
		$this->home = new Models\Home;
		$this->hotel = new Models\Hotel;
		$this->user_back = new Models\User_back;
		$this->pengaturan = new Models\Pengaturan;
		$this->review = new Models\Review;
		
    }
	
	public function cari_hotel()
    {
		$katakunci = trim(strip_tags($_GET['term']));
		$data_hotel=$this->hotel->cari_hotelJson($katakunci);
		if($data_hotel){
		foreach($data_hotel as $data_hotel){
			$data[]=$data_hotel->nama_hotel.'-'.$data_hotel->nama_kec;
		}	
		
		}else{
			$data[]="Maaf Data yang anda cari tidak ada.";
		}
		
		echo json_encode($data);
    }
	
	public function cari_kabkot()
    {
		$katakunci = trim(strip_tags($_GET['term']));
		//$data_hotel=$this->hotel->viewall_hotel();
		$data_kabkot=$this->pengaturan->data_kabkot($katakunci);
				
		//print_r($data_hotel);
		if($data_kabkot){
		foreach($data_kabkot as $data_kabkot){
			//echo $data_hotel->nama_hotel.'<br>';
			$data[]=$data_kabkot->nama_kabkot;
		}
		
		
		}else{
			$data[]="Maaf Data yang anda cari tidak ada.";
		}
		
		echo json_encode($data);
    }
	
	
	public function input_review(){
		
		$errors         = array();  	// array to hold validation errors
		$data 			= array(); 		// array to pass back data
		
		
		
		// validate the variables ======================================================
			// if any of these variables don't exist, add an error to our $errors array

			if (empty($this->request->post('nama_guest',FILTER_SANITIZE_MAGIC_QUOTES)))
				$errors['nama_guest'] = 'Nama Guest wajib di Isi.';

			if (empty($this->request->post('asal_kota')))
				$errors['asal_kota'] = 'Asal Kota wajib di Isi.';

			if (empty($this->request->post('judul',FILTER_SANITIZE_MAGIC_QUOTES)))
				$errors['judul'] = 'Judul wajib di Isi.';
			
			if (empty($this->request->post('testimoni')))
				$errors['testimoni'] = 'Testimoni wajib di Isi.';


		// return a response ===========================================================

			// if there are any errors in our errors array, return a success boolean of false
			if ( ! empty($errors)) {

				// if there are items in our errors array, return those errors
				$data['success'] = false;
				$data['errors']  = $errors;
			} else {

				// if there are no errors process our form, then return a message

				// DO ALL YOUR FORM PROCESSING HERE
				// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

				$id_hotel=$this->request->post('id_hotel');
				$nama_guest=ucwords($this->request->post('nama_guest',FILTER_SANITIZE_MAGIC_QUOTES));
				$asal_kota=$this->request->post('asal_kota');
				
				$judul=ucwords($this->request->post('judul',FILTER_SANITIZE_MAGIC_QUOTES));
				$testimoni=$this->request->post('testimoni');
				$bintang=$this->request->post('bintang');
				$kebersihan=substr($this->request->post('kebersihan'),2);
				$kenyamanan=substr($this->request->post('kenyamanan'),2);
				$pelayanan=substr($this->request->post('pelayanan'),2);
				$fasilitas=substr($this->request->post('fasilitas'),2);
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
					'rekom'=>$rekomendasi,
					'tanggal'=>$tanggal
				);
				$this->review->input_review($data_review);
				
				$rata_nilai=array($kebersihan,$kenyamanan,$pelayanan,$fasilitas);
					
					
				// show a message of success and provide a true success variable
				$data['success'] = true;
				$data['message'] = 'Input Testimoni berhasil. Terimakasih: '.$nama_guest.' atas partisipasi anda.';
				$data['rata_nilai']=max($rata_nilai);
				$data['nama_guest']=$nama_guest;
				$data['asal_kota']=$asal_kota;
				$data['judul']=$judul;
				$data['tanggal']=date("M d, Y",strtotime($tanggal));
				$data['testimoni']=$testimoni;
				$data['kebersihan']=$kebersihan;
				$data['kenyamanan']=$kenyamanan;
				$data['pelayanan']=$pelayanan;
				$data['fasilitas']=$fasilitas;
				$data['rekom']=$rekomendasi;
				
			}

			// return all our data to an AJAX call
			echo json_encode($data);
		
		
		
	}
	
	public function edit_user(){
		
		$errors         = array();  	// array to hold validation errors
		$data 			= array(); 		// array to pass back data
		
		
		
		// validate the variables ======================================================
			// if any of these variables don't exist, add an error to our $errors array

			$username=$this->request->post('username');
			$old_password=md5($this->request->post('old_password'));
			
			if($this->user_back->cek_user_pass($username,$old_password)){
				
			}else{
				$errors['cek_user'] = 'Password yang anda masukan salah.';
			}
		// return a response ===========================================================

			// if there are any errors in our errors array, return a success boolean of false
			if ( ! empty($errors)) {
				// if there are items in our errors array, return those errors
				$data['success'] = false;
				$data['errors']  = $errors;
			} else {

				// if there are no errors process our form, then return a message

				// DO ALL YOUR FORM PROCESSING HERE
				// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

				$id_user=$this->request->post('id_user');
				$nama_pengguna=ucwords($this->request->post('nama_pengguna',FILTER_SANITIZE_MAGIC_QUOTES));
				$email=$this->request->post('email');
				$new_password=md5($this->request->post('new_password'));
				$input_date=date('Y-m-d');
				
				//Edit User
				$data_user=array(
					'nama_pengguna'=>$nama_pengguna,
					'email'=>$email,
					'password'=>$new_password,
					'input_date'=>$input_date
				);
				
				$this->user_back->edit_user($data_user,$id_user);
				
				// show a message of success and provide a true success variable
				$data['success'] = true;
				$data['message'] = 'Edit data User Berhasil';
				$data['id_user']=$id_user;
				$data['username']=$username;
				$data['nama_pengguna']=$nama_pengguna;
				$data['email']=$email;				
			}

			// return all our data to an AJAX call
			echo json_encode($data);
		
	}
	
	public function edit_hotel(){
		
		$errors         = array();  	// array to hold validation errors
		$data 			= array(); 		// array to pass back data
		
		
		
		// validate the variables ======================================================
			// if any of these variables don't exist, add an error to our $errors array

			if (empty($this->request->post('nama_hotel',FILTER_SANITIZE_MAGIC_QUOTES)))
				$errors['nama_hotel'] = 'Nama Hotel wajib di Isi.';

			if (empty($this->request->post('alamat')))
				$errors['alamat'] = 'Alamat wajib di Isi.';
			
		// return a response ===========================================================

			// if there are any errors in our errors array, return a success boolean of false
			if ( ! empty($errors)) {

				// if there are items in our errors array, return those errors
				$data['success'] = false;
				$data['errors']  = $errors;
			} else {

				// if there are no errors process our form, then return a message

				// DO ALL YOUR FORM PROCESSING HERE
				// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

				$id_hotel=$this->request->post('id_hotel');
				$nama_hotel=ucwords($this->request->post('nama_hotel',FILTER_SANITIZE_MAGIC_QUOTES));
				$alamat=$this->request->post('alamat');
				$kecamatan=$this->request->post('kecamatan');
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
								
				//Input fasilitas hotel
				$fasilitas_hotel=$this->request->post('fasilitas_hotel');
				
				if(!empty($fasilitas_hotel)){					
					foreach($fasilitas_hotel as $fasilitas_hotel){
						$data_fasilitas_hotel=array(
								'id_hotel'=>$id_hotel,
								'fasilitas_hotel'=>ucwords($fasilitas_hotel),
								'input_date'=>date('Y-m-d'),
						);
						$this->hotel->input_fasilitas_hotel($data_fasilitas_hotel);									
					}
				}
				//END input fasilitas
				
				//hapus_fasilitas
				$hapus_fasilitas=$this->request->post('hapus_fasilitas');
				//penghapusan fasilitas ceklis
				if(!empty($hapus_fasilitas)){
				// Loop to store and display values of individual checked checkbox.
				foreach($hapus_fasilitas as $hapus_fasilitas){
				$this->hotel->hapus_fasilitas_hotel_byId($hapus_fasilitas);
				}
				}
				//END Hapus fasilitas
				// show a message of success and provide a true success variable
				$data['success'] = true;
				$data['message'] = 'Edit data Hotel Berhasil';
				$data['id_hotel']=$id_hotel;
				$data['nama_hotel']=$nama_hotel;
				$data['alamat']=$alamat;
				$data['kecamatan']=$kecamatan;
				$data['informasi']=$informasi;
				$data['input_date']=$input_date;
				
			}

			// return all our data to an AJAX call
			echo json_encode($data);
		
	}
	
	public function load_fasilitas_hotel(){
		$id_hotel=$this->request->post('id_hotel');
		$fasilitas_hotel=$this->hotel->get_fasilitas_hotel_by_idHotel($id_hotel);
		if($fasilitas_hotel){
			$page2=0;
			$no2=0;
			  $limit=2;
			  echo '<div id="load_div_fasilitas">';
		  foreach($fasilitas_hotel as $fasilitas_hotel){
			  $page2++;
			  if($page2 ==1){
				  echo '';
					$label_fasilitas='FASILITAS HOTEL:';
				  }else{
					$label_fasilitas='';
				  }
			  echo'
			<div class="form-group" >
			  <label for="fasilitas_hotel" class="col-sm-2 control-label">
			  '.$label_fasilitas.'
			  </label>';
				if($this->hotel->get_fasilitas_hotel_by_idHotel_page($id_hotel,$page2, $limit)){
					$data_fasilitas=$this->hotel->get_fasilitas_hotel_by_idHotel_page($id_hotel,$page2, $limit);
					foreach($data_fasilitas as $data_fasilitas){
					echo'
						<div class="col-sm-5">
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
							  <input name="old_fasilitas_hotel'.$no2.'" type="text" class="form-control input-lg" value="'.$data_fasilitas->fasilitas_hotel.'" readonly>
							<span class="input-group-addon" id="basic-addon1">
							<input type="checkbox" name="hapus_fasilitas[]" value="'.$data_fasilitas->id.'">
							<i class="fa fa-times" aria-hidden="true"></i>
							</span>
							</div>
						  </div>';
						$no2++;
					}
				}
				echo'
			</div>';
		  }
		  echo '</div>';
	  }
	}
	
	public function load_gambar_hotel(){
		$id_hotel=$this->request->post('id_hotel');
		if($this->hotel->get_gambar_hotel_by_idHotel($id_hotel)){
			$gambar_hotel=$this->hotel->get_gambar_hotel_by_idHotel($id_hotel);
			
			$page=0;
			$no=0;
			echo '<div id="load_div_gambar">';
			foreach($gambar_hotel as $gambar_hotel){
				$page++;
				$limit=4;
				if($page==1){
					$label_foto='FOTO :';
				}else{
					$label_foto='';
				}
				echo '	
						<div class="form-group" >
						  <label class="col-sm-2 control-label">
						  '.$label_foto.'
						  </label>';
							
				if($this->hotel->get_gambar_hotel_by_idHotel_page($id_hotel,$page, $limit)){
					$url_gambar=$this->hotel->get_gambar_hotel_by_idHotel_page($id_hotel,$page, $limit);
						
					foreach($url_gambar as $url_gambar){
						echo '
						  <div class="col-sm-2">
						  <a href="'.$this->uri->baseUri.'upload/gambar_hotel/'.$url_gambar->url_gambar.'" data-lightbox="lightbox'.$url_gambar->url_gambar.'" data-title="Gambar Hotel">
							<img src="'.$this->uri->baseUri.'upload/gambar_hotel/thumbs/'.$url_gambar->url_gambar.'" class="img-responsive img-thumbnail">
						  </a>
						  <input  type="checkbox" name="hapus_foto<?php echo $no;?>" value="<?php echo $url_gambar->id;?>"> Hapus
						  </div>';
					
						$no++;
					}
						}
						echo'
						</div>';
			}
			echo'</div>';
		}else{
			echo 'Gambar tidak ditemukan';
		}
	}
	
	
	public function load_more_rev(){
		
		  
		  $id_hotel=$this->request->post('id_hotel');
		  $page_rev=$this->request->post('page_rev') + 1;
		  if($this->review->getall_review_byIDhotel_page($id_hotel)){
			   $id_hotel=$this->request->post('id_hotel');
				$page_rev=$this->request->post('page_rev');
				$limit=5;
				
				if($data_review=$this->review->getall_review_byIDhotel_page($id_hotel,$page_rev,$limit)){		
				foreach ($data_review as $data_review){
					$rata_nilai=array($data_review->kebersihan,$data_review->kenyamanan,$data_review->pelayanan,$data_review->fasilitas);
					if($data_review->rekom=="1"){						
						$gambar_rekom='<img src="'.$this->uri->baseUri.STYLE.'images/check.png" alt=""/>';
						$text_rekom='<span class="green">Recommended for Everyone</span>';										
					}else{						
						$gambar_rekom='<img src="'.$this->uri->baseUri.STYLE.'images/delete_old.png" alt=""/>';
						$text_rekom='<span class="red">Not Recommended </span>';						
					}
					echo'
						<div class="hpadding20">							
						<div class="col-md-4 offset-0 center">
							<div class="padding20">
								<div class="bordertype5">
									<div class="circlewrap">
										<img src="'.$this->uri->baseUri.STYLE.'images/user-avatar.jpg" class="circleimg" alt=""/>
										
										<span>'.max($rata_nilai).'/span>
									</div>
									<span class="dark">by '.$data_review->nama_guest.'</span><br/>
									from '.$data_review->asal_kota.'<br/>
								</div>
								
							</div>
						</div>
						<div class="col-md-8 offset-0">
							<div class="padding20">
								<span class="opensans size16 dark">'.$data_review->judul.'</span><br/>
								<span class="opensans size13 lgrey">'.date("M d, Y",strtotime($data_review->tanggal)).'</span><br/>
								<p>'.$data_review->testimoni.'</p>	
								<ul class="circle-list">
									<li>'.$data_review->kebersihan.'</li>
									<li>'.$data_review->kenyamanan.'</li>
									<li>'.$data_review->pelayanan.'</li>
									<li>'.$data_review->fasilitas.'</li>
								</ul>
								<br/>
									'.$gambar_rekom.$text_rekom.'					
									
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="line2"></div>
					';
				}
				}
				
		  }
	}
	
	public function load_status_order(){
		  
		  $no_pesanan=$this->request->post('no_pesanan');
		  if($this->review->view_status_noPesanan($no_pesanan)){ //pengecekan apakan no pesanan ada
			  $no_pesanan=$this->request->post('no_pesanan');
			  $id_status=$this->review->view_status_noPesanan($no_pesanan)->status;
				  if($this->review->view_order_status($id_status)){ //pengecekan order statusS
					$keterangan=$this->review->view_order_status($id_status)->keterangan;
					$instruksi=$this->review->view_order_status($id_status)->instruksi;
					 echo '
						<p id="pesannya" class="center size18 green"><strong>'.ucwords($keterangan).'</strong><br/>
						'.$instruksi.'
						</p>
					  ';
				  //Script Kirim Email disini
				  
				  }
				
		  }
	}
	
	
	
}
