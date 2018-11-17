 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model
{
	public function load_all_cate()
	{
		// SELECT * FROM category WHERE 1 ORDER BY stt_cate ASC
		$this->db->order_by('stt_cate', 'ASC');
		$query = $this->db->get('category');
		return $query->result_array();
	}
	public function load_slide_newest()
	{
		// SELECT id_cs,thumb_cs,ten_cs,name_user,gia_cs FROM course, user WHERE course.id_user = user.id_user ORDER BY id_cs DESC LIMIT 7
		$this->db->select('id_cs,thumb_cs,ten_cs,name_user,gia_cs')->where('course.id_user = user.id_user')->order_by('id_cs', 'DESC')->limit(7);
		$query = $this->db->get('course, user');
		return $query->result_array();
	}
	public function load_slide_price()
	{
		// SELECT id_cs,thumb_cs,ten_cs,name_user,gia_cs FROM course, user WHERE course.id_user = user.id_user ORDER BY gia_cs DESC LIMIT 7
		$this->db->select('id_cs,thumb_cs,ten_cs,name_user,gia_cs')->where('course.id_user = user.id_user')->order_by('gia_cs', 'DESC')->limit(7);
		$query = $this->db->get('course, user');
		return $query->result_array();
	}
	public function load_slide_rand()
	{
		// SELECT id_cs,thumb_cs,ten_cs,name_user,gia_cs FROM course, user WHERE course.id_user = user.id_user ORDER BY RAND() DESC LIMIT 7
		$this->db->select('id_cs,thumb_cs,ten_cs,name_user,gia_cs')->where('course.id_user = user.id_user')->order_by('id_cs', 'RANDOM')->limit(7);
		$query = $this->db->get('course, user');
		return $query->result_array();
	}
}

