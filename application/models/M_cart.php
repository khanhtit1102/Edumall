<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Cart extends CI_Model
{
	public function show_all_cart()
	{
		#SELECT * FROM course WHERE id_cs IN (SELECT id_cs FROM cart WHERE id_user = 1)
		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_cs IN (SELECT id_cs FROM cart WHERE id_user = '.$id_user.')', NULL, FALSE);
		$query = $this->db->get('course');
		return $query->result_array();
		#SELECT * FROM course WHERE id_cs IN (SELECT id_cs FROM cart WHERE id_user = 1)
	}
	public function count()
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->from('cart')->where('id_user', $id_user);
		return $this->db->count_all_results();
	}
	public function delete_once_cart($id_cs)
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_cs', $id_cs)->where('id_user', $id_user);
		$this->db->delete('cart');
	}
	public function delete_all_cart($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('cart');
	}
	public function buy_all_cart()
	{
		# Chuyển csdl vào bảng own
		$id = $this->session->userdata('id_user');
		$this->db->where('id_user', $id);
		$result = $this->db->get('cart')->result_array();
		foreach ($result as $row) {
			$data = array(
				'id_user' => $row['id_user'],
				'id_cs' => $row['id_cs'],
				'date_own' => date("Y-m-d"),
			);
			$this->db->insert('own', $data);
		}
		$this->delete_all_cart($id);
		# Update tiền cho user
		$tien_thua = $this->session->userdata['tien_thua'];
		$this->db->set('coin_user', $tien_thua, FALSE);
		$this->db->where('id_user', $id);
		$this->db->update('user');
		$this->session->userdata['coin_user'] = $this->session->userdata['tien_thua'];
		$this->session->unset_userdata['tien_thua'];
		$this->session->set_userdata('error', 'Mua thành công! <a href="auth">Vào học</a> thôi nào!');
	}
}

