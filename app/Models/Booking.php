<?php
namespace Models;
use Resources, Models;


class Booking {
    // Data kas -------------------
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
		
    }    
	
	public function input_order($data_order){
		$this->db->insert('pemesanan',$data_order);
		$id=$this->db->insertId();
		return $id;
	}
	
	public function view_order($id){
		return $this->db->row("SELECT * FROM pemesanan WHERE id='".$id."'");
	}
	
	public function view_bookdate_byId($id){
		return $this->db->row("SELECT book_date FROM pemesanan WHERE id='".$id."'");
	}
	
	public function view_id_by_no_pesanan($no_pesanan){
		return $this->db->row("SELECT id FROM pemesanan WHERE no_pesanan='".$no_pesanan."'");
	}
	
	public function viewall_by_no_pesanan($no_pesanan){
		return $this->db->row("SELECT * FROM pemesanan WHERE no_pesanan='".$no_pesanan."'");
	}
	
	public function view_order_status_byId($id){
		return $this->db->row("SELECT keterangan,instruksi FROM status_order WHERE id='".$id."'");
	}
	
	public function viewall_order_by_idHotel($id_hotel){
		return $this->db->results("SELECT * FROM pemesanan WHERE id_hotel='".$id_hotel."' ORDER by FIELD (status,'4','6','5','7','3','2','1') ASC, book_date DESC");
	}
	
	public function edit_status($data_pesanan,$id_pesanan){
		return $this->db->update("pemesanan",$data_pesanan,array('id'=>$id_pesanan));
	}
	
	//input checked_room
	public function input_checked($data_checked){
		$this->db->insert('checked_room',$data_checked);
		$id=$this->db->insertId();
		return $id;
	}
	
	public function hot_deals($limit){
		$this->db->results("SELECT id_hotel,count(id_hotel) as jml FROM pemesanan GROUP BY id_hotel ORDER BY jml DESC LIMIT $limit");
	}
	
	
}