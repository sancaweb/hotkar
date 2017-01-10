<?php
namespace Models;
use Resources, Models;


class Review {
    // Data kas -------------------
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
		
    }    
	
	public function input_review($data_review){
		return $this->db->insert('review',$data_review);
	}	
	
	public function getall_review_byIDhotel_page($id_hotel,$page = 1,$limit=5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT * FROM review WHERE id_hotel='".$id_hotel."' LIMIT $offset,$limit");
	}
	
	public function getall_review_byIDhotel($id_hotel){
		return $this->db->results("SELECT * FROM review WHERE id_hotel='".$id_hotel."' ORDER BY id DESC");
	}
	
	public function top_rekom($limit){
		return $this->db->results("SELECT id_hotel,avg(kebersihan + kenyamanan + pelayanan + fasilitas) as jumlah FROM review group by id_hotel ORDER BY jumlah DESC LIMIT $limit");
	}
	
	public function good_review($id_hotel,$limit){
		return $this->db->row("SELECT nama_guest,asal_kota,testimoni,avg(kebersihan + kenyamanan + pelayanan + fasilitas) as jumlah FROM review WHERE id_hotel='".$id_hotel."' ORDER BY jumlah DESC LIMIT $limit");
	}
	
	public function hitung_rev_by_Idhotel($id_hotel){
		return $this->db->getVar("SELECT count(id) FROM review WHERE id_hotel='".$id_hotel."'");
	}
	
	public function hitung_rekom_by_Idhotel($id_hotel){
		return $this->db->getVar("SELECT count(id) FROM review WHERE id_hotel='".$id_hotel."' AND rekom=1");
	}
	
	public function rata_penilaian($id_hotel){
		return $this->db->getVar("SELECT avg(kebersihan+kenyamanan+pelayanan+fasilitas)/4 FROM review WHERE id_hotel='".$id_hotel."'");
	}
	
	public function ambil_bintang_max_by_Idhotel($id_hotel){
		return $this->db->row("SELECT bintang FROM review WHERE id_hotel='".$id_hotel."' ORDER BY bintang DESC");
	}
	
	public function rata_bintang_by_Idhotel($id_hotel){
		return $this->db->getVar("SELECT AVG(bintang) FROM review WHERE id_hotel='".$id_hotel."'");
	}
	
	public function hitung_rekomAll_by_Idhotel($id_hotel){
		return $this->db->getVar("SELECT count(id) FROM review WHERE id_hotel='".$id_hotel."'");
	}
	
	public function hitung_rekom_yes_by_Idhotel($id_hotel){
		return $this->db->getVar("SELECT count(id) FROM review WHERE rekom='1' AND id_hotel='".$id_hotel."'");
	}	
	
	public function rata_rating($column,$id_hotel){
		return $this->db->getVar("SELECT avg($column) FROM review WHERE id_hotel='".$id_hotel."'");
	}
	
	public function view_status_noPesanan($no_pesanan){
		return $this->db->row("SELECT status FROM pemesanan WHERE no_pesanan='".$no_pesanan."'");
	}
	
	public function view_order_status($id){
		return $this->db->row("SELECT keterangan,instruksi FROM status_order WHERE id='".$id."'");
	}
	
}