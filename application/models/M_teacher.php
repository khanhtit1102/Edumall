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

    	$count_money = $this->db->where('course.id_user', $id_user)->where('own.id_cs = course.id_cs')->get('own, course');
        // SELECT * FROM own, course WHERE course.id_user='40' AND own.id_cs = course.id_cs
        $sum_money = 0;
        foreach($count_money->result() as $row){ 
            $sum_money = $sum_money + $row->gia_cs;
        }
    	$dashboard_count = array(
    		'course' => $count_course, 
    		'comment' => $count_comment, 
    		'own' => $count_own, 
    		'money' => $sum_money 
    	);
    	return $dashboard_count;
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