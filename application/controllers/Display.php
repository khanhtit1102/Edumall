<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));	
		$this->load->library("session");
		// Kiểm tra đăng nhập
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
	}
	public function index()
	{
		if ($this->input->get('id')) {
			$id = $this->input->get('id');
			$data['id_cs'] = $id;
			$data['id_user'] = $this->session->userdata('id_user');
		}
		else{
			redirect(base_url('courses'));
		}
		$this->load->model('m_display');
		$model = new M_Display();
		$hasown = $model->hasown($data);
		# Add to cart (My cart)
		$status = '';
		if ($this->input->post('add_to') == 'cart') {
			$result = $model->add_to_cart($data);
			if ($result == 1) {
				$status = "<div class='alert alert-success' style='margin: 0;'><strong>Thành công!</strong> Sản phẩm đã được thêm vào giỏ hàng!<br>Vui lòng đi tới <a href='cart'>giỏ hàng</a> để thanh toán!</div>";
			}
			if ($result == 0) {
				$status = "<div class='alert alert-danger' style='margin: 0;'><strong>Ồ!</strong> Khóa học này đã có trong <a href='cart'>giỏ hàng</a> của bạn!</div>";
			}
		}

		$result = $model->show_once_course($id);
		
		$this->load->view('v_display');
		$view = new V_Display();
		$view->index($result, $status, $hasown);
	}
}