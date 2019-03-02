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
    public function dateNews()
    {
    	// SELECT created_date AS courseTime FROM course ORDER BY created_date DESC LIMIT 0,1
    	$this->db->select('created_date AS courseTime')->from('course')->order_by('created_date', 'DESC')->limit(1);
    	$courseTime = $this->db->get();
    	foreach ($courseTime->result_array() as $row) {
    		$date['courseTime'] = $row['courseTime'];
    	}
    	// SELECT created_date AS userTime FROM user ORDER BY created_date DESC LIMIT 0,1
    	$this->db->select('created_date AS userTime')->from('user')->order_by('created_date', 'DESC')->limit(1);
    	$userTime = $this->db->get();
    	foreach ($userTime->result_array() as $row) {
    		$date['userTime'] = $row['userTime'];
    	}
    	// SELECT date_own AS ownTime FROM own ORDER BY date_own DESC LIMIT 0,1
    	$this->db->select('date_own AS ownTime')->from('own')->order_by('date_own', 'DESC')->limit(1);
    	$ownTime = $this->db->get();
    	foreach ($ownTime->result_array() as $row) {
    		$date['ownTime'] = $row['ownTime'];
    	}
    	// SELECT DATE_FORMAT(ngay_cmt, '%Y-%m-%d') AS cmtTime FROM cmt ORDER BY ngay_cmt DESC LIMIT 0,1
    	$this->db->select("DATE_FORMAT(ngay_cmt, '%Y-%m-%d') AS cmtTime")->from('cmt')->order_by('ngay_cmt', 'DESC')->limit(1);
    	$cmtTime = $this->db->get();
    	foreach ($cmtTime->result_array() as $row) {
    		$date['cmtTime'] = $row['cmtTime'];
    	}
    	// SELECT SUM(menh_gia) AS money FROM `money_history` WHERE 1
    	$this->db->select('SUM(menh_gia) AS money')->from('money_history');
    	$money = $this->db->get();
    	foreach ($money->result_array() as $row) {
    		$date['money'] = $row['money'];
    	}
    	
		return $date;
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
		// course cart adminchat teacherchat money_history payment_request own user
		$this->db->where_in('id_user', $idToStr)->delete('course');
		$this->db->where_in('id_user', $idToStr)->delete('cart');
		$this->db->where_in('id_user', $idToStr)->delete('adminchat');
		$this->db->where_in('id_user', $idToStr)->delete('teacherchat');
		$this->db->where_in('id_user', $idToStr)->delete('money_history');
		$this->db->where_in('id_user', $idToStr)->delete('payment_request');
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
		$this->db->where('id_cs', $id)->delete('episodes_course');
		$this->db->where('id_cs', $id)->delete('cmt');
		$this->db->where('id_cs', $id)->delete('own');
		$this->db->where('id_cs', $id)->delete('cart');
		$this->db->where('id_cs', $id)->delete('course');
	}
	public function multi_del_course($idToStr)
	{
		$this->db->where_in('id_cs', $idToStr)->delete('episodes_course');
		$this->db->where_in('id_cs', $idToStr)->delete('cmt');
		$this->db->where_in('id_cs', $idToStr)->delete('own');
		$this->db->where_in('id_cs', $idToStr)->delete('cart');
		$this->db->where_in('id_cs', $idToStr)->delete('course');
	}
	public function add_course($data)
	{
		$this->db->insert('course', $data);
	}
	public function get_id_newest_course($data)
	{
		$query = $this->db->get_where('course', $data);
		foreach ($query->result_array() as $row) {
    		$newest_id = $row['id_cs'];
    	}
		return $newest_id;
	}
	public function add_episodes_course($newest_id, $i)
	{
		$this->db->set('id_cs', $newest_id);
		$this->db->set('ep_number', $i);
		$this->db->insert('episodes_course');
	}
	public function update_course($data)
	{
		$this->db->where('id_cs', $data['id_cs']);
		$this->db->update('course', $data);
	}
	public function so_bai_hoc($id_cs)
	{
		$this->db->select('sobh_cs')->where('id_cs', $id_cs);
		$query = $this->db->get('course');
		foreach ($query->result_array() as $row) {
    		$sobh_cs = $row['sobh_cs'];
    	}
		return $sobh_cs;
	}
	public function load_episodes_course($id_cs)
	{
		$this->db->where('id_cs', $id_cs);
		$query = $this->db->get('episodes_course');
		return $query->result_array();
	}
	public function edit_episodes_course_without_video($ep_number, $ep_title, $id_cs)
	{
		$this->db->set('ep_title', $ep_title);
		$this->db->where('id_cs', $id_cs);
		$this->db->where('ep_number', $ep_number);
		$this->db->update('episodes_course');
	}
	public function edit_episodes_course_with_video($ep_number, $ep_title, $id_cs, $video_name)
	{
		$this->db->set('ep_title', $ep_title);
		$this->db->set('video_name', $video_name);
		$this->db->where('id_cs', $id_cs);
		$this->db->where('ep_number', $ep_number);
		$this->db->update('episodes_course');
	}
	public function qldh()
	{
		$this->db->select('own.*, user.name_user, course.ten_cs, course.gia_cs, coupon.code_cp, coupon.percent_discount');
		$this->db->from('own');
		$this->db->join('coupon', 'own.id_cp = coupon.id_cp', 'left');
		$this->db->join('user', 'own.id_user = user.id_user', 'left');
		$this->db->join('course', 'own.id_cs = course.id_cs', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function qlbl()
	{
		// SELECT cmt.*, course.ten_cs, user.email_user FROM cmt, course, user WHERE cmt.id_cs = course.id_cs AND course.id_user = user.id_user
		$this->db->select('cmt.*, course.ten_cs, user.email_user')->where('cmt.id_cs = course.id_cs')->where('course.id_user = user.id_user');
		$query = $this->db->get('cmt, course, user');
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
	public function load_payment()
	{
		$query = $this->db->get('payment_request');
		return $query->result_array();
	}
	public function payment_accept($id_payreq)
	{
		$this->db->set('state_payreq', 1);
		$this->db->set('date_payment', date('Y-m-d H:i:s'));
		$this->db->where('id_payreq', $id_payreq);
		$this->db->update('payment_request');
	}
	public function qlmgg()
	{
		$query = $this->db->get('coupon');
		return $query->result_array();
	}
	public function delete_coupon($id)
	{
		$this->db->where('id_cp', $id)->delete('coupon');
	}
	public function add_coupon($add_data)
	{
		$this->db->insert('coupon', $add_data);
	}
	public function get_once_available()
	{
		// SELECT * FROM `coupon` WHERE `expiration_date` > 'today' LIMIT 0,1
        $this->db->where('expiration_date >', date("Y-m-d"))->limit(1);
		$query = $this->db->get('coupon');
		return $query->result_array();
	}
	// Export data to Excel Files
    public function employeeList() {
        $this->db->select(array('e.id_user', 'e.email_user', 'e.pass_user', 'e.name_user', 'e.job_user', 'e.sex_user', 'e.	about_user', 'e.permission_user', 'e.code_user', 'e.coin_user', 'e.avatar_user', 'e.created_date',));
        $this->db->from('user as e');
        $query = $this->db->get();
        return $query->result_array();
    }
   	// Chart
   	public function count_all_user()
   	{
   		$user = $this->db->from('user');
    	return $this->db->count_all_results();
   	}
   	public function data_chart($per)
   	{
        $this->db->from('user')->where('permission_user', $per);
        return $this->db->count_all_results();
   	}
}