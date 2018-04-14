<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_m extends CI_Model {

	public function getBlog(){
		$this->db->order_by('created_at','desc');
		$query = $this->db->get('nama');
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function submit()
	{
		$field = array(
		'title' =>$this->input->post('txt_title'),
		'description'=>$this->input->post('txt_description'),
		'created_at'=>date('Y-m-d')
		);
		$this->db->insert('nama', $field);
		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getBlogById($id)
	{
		$this->db->where('id',$id);
	 	$query = $this->db->get('nama');
	 	if($query->num_rows() > 0){
	 		return $query->row();
	 	} else {
	 		return false;
	 	}
	}

	public function update()
	{
		$id = $this->input->post('txt_hidden');
		$field = array(
		'title' =>$this->input->post('txt_title'),
		'description'=>$this->input->post('txt_description'),
		'update_at'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
		$this->db->update('nama', $field);
		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('nama');
		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
