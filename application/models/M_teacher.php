<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Teacher extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library("session");
    }
	public function dashboard_count($id_user)
    {
    	$course = $this->db->from('course')->where('id_user', $id_user);
    	$count_course = $this->db->count_all_results();
    	// SELECT * FROM `course` WHERE id_user = ''

    	$comment = $this->db->from('cmt, course')->where('course.id_user', $id_user)->where('cmt.id_cs = course.id_cs');
    	$count_comment = $this->db->count_all_results();
    	// SELECT * FROM cmt, course WHERE course.id_user='' AND cmt.id_cs = course.id_cs 

    	$own = $this->db->from('own, course')->where('course.id_user', $id_user)->where('own.id_cs = course.id_cs');
    	$count_own = $this->db->count_all_results();
        // SELECT * FROM own, course WHERE course.id_user='' AND own.id_cs = course.id_cs

    	$count_money = $this->db->select('gia_cs')->where('course.id_user', $id_user)->where('own.id_cs = course.id_cs')->get('own, course');
        // SELECT gia_cs FROM own, course WHERE course.id_user='' AND own.id_cs = course.id_cs
        $sum_money = 0;
        foreach($count_money->result() as $row){ 
            $sum_money += $row->gia_cs;
        }
        // Trừ 40% cho hệ thống
        $sum_money = $sum_money - $sum_money * 40/100;
    	$dashboard_count = array(
    		'course' => $count_course, 
    		'comment' => $count_comment, 
    		'own' => $count_own, 
    		'money' => $sum_money 
    	);
    	return $dashboard_count;
    }
    public function qltt($id_user)
    {
        // SELECT own.*, user.name_user, course.ten_cs, course.gia_cs FROM own, user, course WHERE own.id_user = user.id_user AND own.id_cs = course.id_cs AND course.id_user = ''
        $this->db->select('own.*, user.name_user, course.ten_cs, course.gia_cs')->from('own, user, course')->where('own.id_user = user.id_user')->where('own.id_cs = course.id_cs')->where('course.id_user', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_history_payment($id_user)
    {
        // SELECT * FROM `payment_request` WHERE id_user =  AND state_payreq = 1 ORDER BY date_payment DESC
        $this->db->where('id_user', $id_user)->where('state_payreq', '1')->order_by('date_payment', 'DESC');
        $query = $this->db->get('payment_request');
        return $query->result_array();
    }
    public function add_payment_request($data, $new_coin)
    {
        // Thêm dữ liệu vào bảng payment_request
        $this->db->insert('payment_request', $data);
        // Sửa số tiền của người dùng
        $this->db->set('coin_user', $new_coin);
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user');
    }
    public function qlkh($id_user)
    {
        // SELECT * FROM course WHERE id_user = 
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('course');
        return $query->result_array();
    }
    public function show_one_course($id)
    {
        $this->db->select('course.*, user.name_user');
        $this->db->from('course, user');
        $this->db->where('course.id_user = user.id_user');
        $this->db->where('id_cs', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_course($data)
    {
        $this->db->where('id_cs', $data['id_cs']);
        $this->db->update('course', $data);
    }
    public function check_own($id, $id_user)
    {
        // SELECT COUNT(id_cs) FROM course WHERE id_cs =  AND id_user = 
        $this->db->select('COUNT(id_cs)')->from('course')->where('id_cs', $id)->where('id_user', $id_user);
        $check_own = $this->db->count_all_results();
        return $check_own;
    }
    public function delete_course($id)
    {
        $this->db->where('id_cs', $id)->delete('cmt');
        $this->db->where('id_cs', $id)->delete('cart');
        $this->db->where('id_cs', $id)->delete('own');
        $this->db->where('id_cs', $id)->delete('course');
    }
    public function add_course($data)
    {
        $this->db->insert('course', $data);
    }
    public function qlbl($id_user)
    {
        // SELECT cmt.*, course.ten_cs FROM cmt, course WHERE cmt.id_cs = course.id_cs AND course.id_user = 
        $this->db->select('cmt.*, course.ten_cs')->where('cmt.id_cs = course.id_cs')->where('course.id_user', $id_user);
        $query = $this->db->get('cmt, course');
        return $query->result_array();
    }
    public function teacher_chat()
    {
        $this->db->from('teacherchat, user')->where('teacherchat.id_user = user.id_user')->order_by('teacherchat.date_chat', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function add_chat($comment)
    {
        $this->db->insert('teacherchat', $comment);
    }
}