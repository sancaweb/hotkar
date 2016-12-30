<?php
namespace Models;
use Resources, Models;


class Pengaturan {
    // Data kas -------------------
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
		
    }
	
	public function data_kabkot($kabkot){
		return $this->db->results("SELECT nama_kabkot FROM kabkot 
					WHERE nama_kabkot LIKE '%".$kabkot."%'");
	}
	
	public function viewall_kec_karawang(){
		return $this->db->results("SELECT id,nama_kec FROM kec_karawang ORDER BY nama_kec ASC");
	}
	
	public function get_nama_kec_karawang_byId($id){
		return $this->db->row("SELECT nama_kec FROM kec_karawang WHERE id='".$id."'");
	}
	
	public function get_nama_kec_byKunci($kunci){
		return $this->db->results("SELECT id,nama_kec FROM kec 
					WHERE nama_kec LIKE '%".$kunci."%'ORDER BY nama_kec ASC");
	}
	
	public function input_kec_karawang($data_kec_karawang){
		return $this->db->insert('kec_karawang',$data_kec_karawang);
	}
	
	
}