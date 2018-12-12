<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library("session");
    }
    public function dashboard_count()
    {
    	$course = $this->db->from('course');
    	$count_course = $this->db->count_all_results();
    	$comment = $this->db->from('cmt');
    	$count_comment = $this->db->count_all_results();
    	$own = $this->db->from('own');
    	$count_own = $this->db->count_all_results();
    	$user = $this->db->from('user');
    	$count_user = $this->db->count_all_results();
    	$dashboard_count = array(
    		'course' => $count_course, 
    		'comment' => $count_comment, 
    		'own' => $count_own, 
    		'user' => $count_user 
    	);
    	return $dashboard_count;
    }
    public function admin_chat()
    {
    	$this->db->from('adminchat, user')->where('adminchat.id_user = user.id_user')->order_by('adminchat.date_chat', 'DESC');
    	$query = $this->db->get();
		return $query->result_array();
    }
    public function add_chat($comment)
    {
    	$this->db->insert('adminchat', $comment);
    }
	public function qltv()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function delete_user($id)
	{
		$this->db->where('id_user', $id)->delete('adminchat');
		$this->db->where('id_user', $id)->delete('teacherchat');
		$this->db->where('id_user', $id)->delete('cart');
		$this->db->where('id_user', $id)->delete('own');
		$this->db->where('id_user', $id)->delete('user');
	}
	public function multi_del_user($idToStr)
	{
		$this->db->where_in('id_user', $idToStr)->delete('adminchat');
		$this->db->where_in('id_user', $idToStr)->delete('teacherchat');
		$this->db->where_in('id_user', $idToStr)->delete('cart');
		$this->db->where_in('id_user', $idToStr)->delete('own');
		$this->db->where_in('id_user', $idToStr)->delete('user');
	}
	public function show_one_user($id)
	{
		$this->db->from('user')->where('id_user', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function show_one_course($id)
	{
		// SELECT course.*, user.name_user FROM course, user WHERE course.id_user = user.id_user
		$this->db->select('course.*, user.name_user');
		$this->db->from('course, user');
		$this->db->where('course.id_user = user.id_user');
		$this->db->where('id_cs', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_user($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}
	public function add_user($data)
	{
		$this->db->insert('user', $data);
	}
	public function qlkh()
	{
		$this->db->select('id_cs,ten_cs, name_user, gia_cs, id_cate, course.created_date');                  
        $this->db->where('course.id_user = user.id_user');
		$query = $this->db->get('course, user');
		return $query->result_array();
	}
	public function delete_course($id)
	{
		$this->db->where('id_cs', $id)->delete('cmt');
		$this->db->where('id_cs', $id)->delete('own');
		$this->db->where('id_cs', $id)->delete('cart');
		$this->db->where('id_cs', $id)->delete('course');
	}
	public function multi_del_course($idToStr)
	{
		$this->db->where_in('id_cs', $idToStr)->delete('cmt');
		$this->db->where_in('id_cs', $idToStr)->delete('own');
		$this->db->where_in('id_cs', $idToStr)->delete('cart');
		$this->db->where_in('id_cs', $idToStr)->delete('course');
	}
	public function add_course($data)
	{
		$this->db->insert('course', $data);
	}
	public function update_course($data)
	{
		$this->db->where('id_cs', $data['id_cs']);
		$this->db->update('course', $data);
	}
	public function search_member($name, $keyword)
	{
		$this->db->like($name, $keyword);
	}
	public function qldh()
	{
		$this->db->select('own.*, user.name_user, course.ten_cs, course.gia_cs')->where('own.id_user = user.id_user AND own.id_cs = course.id_cs');
		$query = $this->db->get('own,user,course');
		return $query->result_array();
	}
	public function qlbl()
	{
		$this->db->select('cmt.*, course.ten_cs')->where('cmt.id_cs = course.id_cs');
		$query = $this->db->get('cmt, course');
		return $query->result_array();
	}
	public function delete_cmt($id)
	{
		$this->db->where('id_cmt', $id)->delete('cmt');
	}
	public function load_chart_data()
	{
		$query = $this->db->get('adminchat');
		return $query->result_array();
	}
}