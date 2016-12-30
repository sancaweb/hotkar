<?php
namespace Models;
use Resources, Models;


class User_back {
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
    }
	
	public function input_user($data_user_back){
		$this->db->insert('u_back',$data_user_back);
		$id=$this->db->insertId();
		return $id;
	}
	
	public function get_user_byID($id){
		return $this->db->row("SELECT * FROM u_back WHERE id='".$id."'");
	}
	
	public function cek_user_pass($username,$password){
		return $this->db->row("SELECT username,password FROM u_back WHERE username='".$username."' AND password='".$password."'");
	}
	
	public function cek_grup($username,$password){
		return $this->db->row("SELECT user_grup FROM u_back WHERE username='".$username."' AND password='".$password."'");
	}
	public function get_id_by_user_pass($username,$password){
		return $this->db->row("SELECT id FROM u_back WHERE username='".$username."' AND password='".$password."'");
	}
	
	public function get_nama_grup_byId($user_grup){
		return $this->db->row("SELECT nama_grup FROM user_grup WHERE grup='".$user_grup."'");
	}
	
	public function edit_user($data_user,$id){
		return $this->db->update("u_back",$data_user,array('id'=>$id));
	}
	
	
}