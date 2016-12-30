<?php
namespace Models;
use Resources, Models;


class Hotel {
    // Data kas -------------------
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
    }    
	
	public function input_hotel($data_hotel){
		$this->db->insert('hotel',$data_hotel);
		$id=$this->db->insertId();
		return $id;
	}
	
	public function total_hotel(){
		return $this->db->getVar("SELECT COUNT(id) FROM hotel");
	}
	
	public function viewall_hotel(){
		return $this->db->results("SELECT id,nama_hotel,kecamatan FROM hotel ORDER by nama_hotel ASC");
	}
	
	public function viewall_hotel_limit($limit){
		return $this->db->results("SELECT id,nama_hotel,kecamatan FROM hotel ORDER by rand() LIMIT $limit");
	}
	public function viewall_hotel_limit2($limit){
		return $this->db->results("SELECT id,nama_hotel FROM hotel ORDER by rand() LIMIT 2,$limit");
	}
	
	public function viewall_hotel_page($page = 1, $limit = 5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT * FROM hotel ORDER BY id DESC LIMIT $offset,$limit");
	}
	
	public function view_nama_hotel_byID($id_hotel){
		return $this->db->row("SELECT nama_hotel FROM hotel WHERE id='".$id_hotel."'");
	}
	
	public function view_nama_kec_byID($id_hotel,$limit){
		return $this->db->row("SELECT kecamatan FROM hotel WHERE id='".$id_hotel."' LIMIT $limit");
	}
	
	public function cari_hotelJson($katakunci){
		return $this->db->results("
					SELECT hotel.nama_hotel, kec_karawang.nama_kec FROM hotel
					JOIN kec_karawang ON kec_karawang.id = hotel.kecamatan
					WHERE 
					hotel.nama_hotel LIKE '%".$katakunci."%' OR
					hotel.alamat LIKE '%".$katakunci."%' OR
					kec_karawang.nama_kec LIKE '%".$katakunci."%'
					");
	}
	
	
	public function cari_hotel_order($katakunci){
		return $this->db->results("SELECT id,nama_hotel,alamat,kecamatan,informasi FROM hotel 
					WHERE nama_hotel LIKE '%".$katakunci."%' OR 
					kecamatan LIKE '%".$katakunci."%' OR 
					alamat LIKE '%".$katakunci."%'");
	}

	public function hitung_hotel_order($katakunci){
		return $this->db->getVar("SELECT count(id) FROM hotel 
					WHERE nama_hotel LIKE '%".$katakunci."%' OR 
					kecamatan LIKE '%".$katakunci."%' OR 
					alamat LIKE '%".$katakunci."%'");
	}
	
	public function cari_hotel_order_array($nama_hotel){
		return $this->db->results("SELECT id,nama_hotel,alamat,kecamatan,informasi FROM hotel WHERE nama_hotel LIKE '%".$nama_hotel."%' ");
	}
	
	public function hitung_hotel_order_array($nama_hotel){
		return $this->db->getVar("SELECT count(id) FROM hotel WHERE nama_hotel LIKE '%".$nama_hotel."%'");
	}
		
	public function view_detail_hotel_byId($id){
		return $this->db->row("SELECT * FROM hotel WHERE id='".$id."'");
	}
	
	public function edit_hotel($data_hotel,$id){
		return $this->db->update("hotel",$data_hotel,array('id'=>$id));
	}
	
	public function related_hotel($kecamatan,$limit=3){
		return $this->db->results("SELECT id,nama_hotel FROM hotel WHERE kecamatan LIKE '%".$kecamatan."%' LIMIT $limit");
	}
	
	public function get_id_hotel_by_userId($user_id){
		return $this->db->row("SELECT id FROM hotel WHERE user_id='".$user_id."'");
	}
	
	//FASILITAS Hotel
	public function get_fasilitas_hotel_by_idHotel($id_hotel){
		return $this->db->results("SELECT id_hotel,fasilitas_hotel FROM fasilitas_hotel WHERE id_hotel='".$id_hotel."'");
	}
		
	public function get_fasilitas_hotel_by_idHotel_page($id_hotel,$page = 1, $limit = 5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT id,fasilitas_hotel FROM fasilitas_hotel WHERE id_hotel='".$id_hotel."' LIMIT $offset,$limit");
	}
	
	public function input_fasilitas_hotel($data_fasilitas_hotel){
		return $this->db->insert('fasilitas_hotel',$data_fasilitas_hotel);
	}
	
	public function hitung_fasilitas_hotel_byIDhotel($id_hotel){
		return $this->db->getVar("SELECT count(id) FROM fasilitas_hotel WHERE id_hotel='".$id_hotel."'");
	}	
	
	public function hapus_fasilitas_hotel_byId($id){
		return $this->db->delete('fasilitas_hotel', array('id' => $id));
	}
	
	
	public function edit_fasilitas($data_fasilitas,$id){
		return $this->db->update("fasilitas_hotel",$data_fasilitas,array('id'=>$id));
	}	
	
	//gambar_hotel
	
	public function input_gambar($gambar_hotel){
		return $this->db->insert('gambar_hotel',$gambar_hotel);
	}	
	
	public function getone_gambar_hotel_by_idHotel($id_hotel){
		return $this->db->row("SELECT id_hotel,url_gambar FROM gambar_hotel WHERE id_hotel='".$id_hotel."' ORDER by rand() ASC LIMIT 1");
	}
	public function get_gambar_hotel_by_idHotel($id_hotel){
		return $this->db->results("SELECT url_gambar FROM gambar_hotel WHERE id_hotel='".$id_hotel."' ORDER by id ASC");
	}
	
	public function get_gambar_hotel_by_idHotel_page($id_hotel,$page = 1, $limit = 2){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT id,url_gambar FROM gambar_hotel WHERE id_hotel='".$id_hotel."' LIMIT $offset,$limit");
	}
	
	public function hitung_gambar_by_idHotel($id_hotel){
		return $this->db->getVar("SELECT COUNT(id) FROM gambar_hotel WHERE id_hotel='".$id_hotel."'");
	}
	
	public function hapus_gambar_byId($id){
		return $this->db->delete('gambar_hotel', array('id' => $id));
	}
	public function get_urlGambar_byID($id){
		return $this->db->row("SELECT url_gambar FROM gambar_hotel WHERE id='".$id."'");
	}
	
	
	//Kamar
	
	public function viewall_kamar_page($page = 1, $limit = 5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT * FROM kamar ORDER BY id DESC LIMIT $offset,$limit");
	}
	
	public function harga_terendah_kamar_byIdhotel($id_hotel){
		return $this->db->row("SELECT harga FROM kamar WHERE id_hotel='".$id_hotel."' ORDER by harga ASC LIMIT 1");
	}
	
	public function input_kamar($data_kamar){
		$this->db->insert('kamar',$data_kamar);
		$id=$this->db->insertId();
		return $id;
	}
	
	
	public function hitung_kamar_by_idHotel($id_hotel){
		return $this->db->getVar("SELECT COUNT(id) FROM kamar WHERE id_hotel='".$id_hotel."'");
	}
	
	
	public function viewall_kamar_page_byIDhotel($id_hotel,$page = 1, $limit = 5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT * FROM kamar WHERE id_hotel='".$id_hotel."' ORDER BY id DESC LIMIT $offset,$limit");
	}
	
	public function hitungall_kamar(){
		return $this->db->getVar("SELECT COUNT(id) FROM kamar");
	}
	
	public function viewall_kamar_byIDhotel($id_hotel){
		return $this->db->results("SELECT * FROM kamar WHERE id_hotel='".$id_hotel."' ORDER BY harga ASC");
	}
	
	public function view_kamar_byId($id_kamar){
		return $this->db->row("SELECT * FROM kamar WHERE id='".$id_kamar."'");
	}
	
	//gambar kamar	
	
	public function input_gambar_kamar($gambar_kamar){
		return $this->db->insert('gambar_kamar',$gambar_kamar);
	}
	
	public function view_gambar_kamar_byIDkamar($id_kamar){
		return $this->db->row("SELECT url_gambar FROM gambar_kamar WHERE id_kamar='".$id_kamar."' ORDER by id ASC LIMIT 1");
	}
	public function viewall_gambar_kamar_byIDkamar($id_kamar){
		return $this->db->results("SELECT url_gambar FROM gambar_kamar WHERE id_kamar='".$id_kamar."' ORDER by id ASC");
	}
	
	
	
	//FASILITAS kamar
	public function get_fasilitas_kamar_by_idKamar($id_kamar){
		return $this->db->results("SELECT id_kamar,fasilitas_kamar FROM fasilitas_kamar WHERE id_kamar='".$id_kamar."'");
	}
	
	public function get_fasilitas_kamar_by_idKamar_page($id_kamar,$page = 1, $limit = 5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT id,id_kamar,fasilitas_kamar FROM fasilitas_kamar WHERE id_kamar='".$id_kamar."' LIMIT $offset,$limit");
	}
	
	public function input_fasilitas_kamar($data_fasilitas_kamar){
		return $this->db->insert('fasilitas_kamar',$data_fasilitas_kamar);
	}
}