<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Display extends CI_Model
{
	public function show_once_course($id)
	{
		$this->db->where('id_cs', $id);
		$query = $this->db->get('course');
		return $query->result_array();
	}
	public function hasown($data)
	{
		$this->db->from('own')->where('id_user', $data['id_user'])->where('id_cs', $data['id_cs']);
    	return $this->db->count_all_results();
	}
	public function add_to_cart($data)
	{
		$this->db->from('cart')->where('id_user', $data['id_user'])->where('id_cs', $data['id_cs']);
    	$count = $this->db->count_all_results();
		if ($count == 1) {
			$result = 0;
		}
		else{
			$this->db->insert('cart', $data);
			$result = 1;
		}
		return $result;
	}
}

