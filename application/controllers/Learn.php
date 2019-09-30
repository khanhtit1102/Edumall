<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learn extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));	
		$this->load->library("session");
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
	}
	public function course($id_cs = 0)
	{
		$this->load->model('m_learn');
		$model = new M_Learn();
		$this->load->view('v_learn');
		$view = new V_Learn();

		
		# Kiểm tra sở hữu khóa học
		$id_user = $this->session->userdata('id_user');
		$per_user = $this->session->userdata('permission_user');
		$check_own = $model->check_own($id_user, $id_cs);
		$check_teacher = $model->check_teacher($id_user, $id_cs);
		if ($per_user != 3) {
			if ($check_own != 1 && $check_teacher != 1) {
				$this->session->set_flashdata('error', 'Bạn chưa sở hữu khóa học này!'.$message);
				redirect(base_url('auth'));
			}
		}
		//Thêm comment
		if ($this->input->post('comment') == 'submit') {
			$item['id_cs'] = $id_cs;
			$item['ten_cmt'] = $this->input->post('txtname');
			$item['email_cmt'] = $this->input->post('txtemail');
			$item['nd_cmt'] = $this->input->post('txtnd');
			$item['ngay_cmt'] = date("Y-m-d H:i:s");
			$model->add_comment($item);
		}
		if ($this->input->get('episode')) {
			$ep_number = $this->input->get('episode');
		}
		else{
			$ep_number = 1;
		}
		$course = $model->show_once($id_cs);
		$all_episodes = $model->show_episode($id_cs);
		$link_episode = $model->show_link_episode($id_cs, $ep_number);
		if ($course == null) {
			redirect(base_url('courses'));
		}
		$comment = $model->show_comment($id_cs);
		
		$view->index($course, $all_episodes, $link_episode, $comment);
	}
}