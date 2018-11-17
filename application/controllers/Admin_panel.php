<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");
		// $this->load->library('pagination');

		// Kiểm tra tài khoản ADMIN
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
		else{
			if ($this->session->userdata('permission_user') < 3) {
				redirect(base_url('home'));
			}
		}
		$this->load->model('m_admin');
		
		$this->load->view('v_admin');
		
	}
	public function index()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		// Load Count Header
		$dashboard_count = $model->dashboard_count();
		// Load Admin Chat
		$admin_chat = $model->admin_chat();
		if ($this->input->post('chat_admin') == 'submit') {
			if ($this->input->post('content_chat') == null) {
				echo "<script type='text/javascript'>alert('Không được để trống ô chat!');</script>";
			}
			else{
				$comment['id_user'] = $this->session->userdata('id_user');
				$comment['content_chat'] = $this->input->post('content_chat');
				$comment['date_chat'] = date("Y-m-d H:i:s");
				$model->add_chat($comment);
				redirect(base_url('admin_panel'));
			}
		}
		$page = 'dashboard';
		$view->index($dashboard_count, $admin_chat, $page);
	}
	public function qltv()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$result = $model->qltv();
		$page = 'qltv';
		$view->qltv($result, $page);
	}
	public function edit_user($id = '')
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qltv'));
		}
		else{
			if ($this->input->post('update_user') == 'submit') {
				$data['id_user'] = $id;
				$data['name_user'] = $this->input->post('name_user');
				$data['sex_user'] = $this->input->post('sex_user');
				$data['email_user'] = $this->input->post('email_user');
				$data['job_user'] = $this->input->post('job_user');
				$data['about_user'] = $this->input->post('about_user');
				$data['coin_user'] = $this->input->post('coin_user');
				$data['permission_user'] = $this->input->post('permission_user');

				$model_update = new M_Admin();
				$model_update->update_user($data);
				redirect(base_url('admin_panel/qltv'));
			}
			$result = $model->show_one_user($id);
			$page = 'edit_user';
			$view->edit_user($result, $page);
		}
	}
	public function delete_user($id = '')
	{
		$model = new M_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qltv'));
		}
		else{
			$model->delete_user($id);
			redirect(base_url('admin_panel/qltv'));
		}
	}
	public function add_user()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add_user') == 'submit') {
			$data['name_user'] = $this->input->post('name_user');
			$data['pass_user'] = md5($this->input->post('pass_user'));
			$data['sex_user'] = $this->input->post('sex_user');
			$data['email_user'] = $this->input->post('email_user');
			$data['job_user'] = $this->input->post('job_user');
			$data['about_user'] = $this->input->post('about_user');
			$data['coin_user'] = $this->input->post('coin_user');
			$data['permission_user'] = $this->input->post('permission_user');
			$data['created_date'] = date("Y-m-d H:i:s");

			$model_update = new M_Admin();
			$model_update->add_user($data);
			redirect(base_url('admin_panel/qltv'));
		}
		$page = 'add_user';
		$view->add_user($page);
	}
	public function chart_user()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->load_chart_data();
		$page = 'chart_user';
		$view->chart_user($result, $page);
	}
	public function qlkh()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->qlkh();
		$page = 'qlkh';
		$view->qlkh($result, $page);
	}
	public function edit_course($id = '')
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qlkh'));
		}
		else{
			if ($this->input->post('update_course') == 'submit') {
				$data['id_cs'] = $id;
				$data['ten_cs'] = $this->input->post('ten_cs');
				$data['info_cs'] = $this->input->post('info_cs');
				$data['tc_cs'] = $this->input->post('tc_cs');
				$data['mota_cs'] = $this->input->post('mota_cs');
				$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
				$data['gia_cs'] = $this->input->post('gia_cs');
				$data['id_cate'] = $this->input->post('theloai_cs');
				$data['sobh_cs'] = $this->input->post('sobh_cs');
				$data['time_cs'] = $this->input->post('time_cs');
				$data['playlist_key'] = $this->input->post('playlist_key');

				$model_update = new M_Admin();
				$model_update->update_course($data);
				redirect(base_url('admin_panel/qlkh'));
			}
			
			
			$result = $model->show_one_course($id);
			$page = 'edit_course';
			$view->edit_course($result, $page);
		}
	}
	public function delete_course($id = '')
	{
		$model = new M_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qlkh'));
		}
		else{
			$model->delete_course($id);
			redirect(base_url('admin_panel/qlkh'));
		}
	}
	public function add_course()
	{
		$model_update = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('add_course') == 'submit') {
			$data['ten_cs'] = $this->input->post('ten_cs');
			$data['info_cs'] = $this->input->post('info_cs');
			$data['tc_cs'] = $this->session->userdata('name_user');
			$data['mota_cs'] = $this->input->post('mota_cs');
			$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
			$data['gia_cs'] = $this->input->post('gia_cs');
			$data['id_cate'] = $this->input->post('theloai_cs');
			$data['sobh_cs'] = $this->input->post('sobh_cs');
			$data['time_cs'] = $this->input->post('time_cs');
			$data['playlist_key'] = $this->input->post('playlist_key');
			$data['created_date'] = date("Y-m-d");;

			$model_update->add_course($data);
			redirect(base_url('admin_panel/qlkh'));
		}
		$page = 'add_course';
		$view->add_course($page);
	}
	public function chart_course()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->load_chart_data();
		$page = 'chart_course';
		$view->chart_course($result, $page);
	}
	public function qldh()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->qldh();
		$page = 'qldh';
		$view->qldh($result, $page);
	}
	public function chart_order()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->load_chart_data();
		$page = 'chart_order';
		$view->chart_order($result, $page);
	}
	public function qlbl()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->qlbl();
		$page = 'qlbl';
		$view->qlbl($result, $page);
	}
	public function delete_cmt($id = '')
	{
		$model = new M_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qlbl'));
		}
		else{
			$model->delete_cmt($id);
			redirect(base_url('admin_panel/qlbl'));
		}
	}
	public function chart_cmt()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->load_chart_data();
		$page = 'chart_cmt';
		$view->chart_cmt($result, $page);
	}
}
