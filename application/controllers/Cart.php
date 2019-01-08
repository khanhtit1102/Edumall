<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'date'));	
		$this->load->library("session");
		// Kiểm tra đăng nhập và số lượng giỏ hàng
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
	}
	public function index()
	{
		$this->load->model('m_cart');
		$model = new M_Cart();
		$this->load->view('v_cart');
		$view = new V_Cart();
		//Kiểm tra số lượng giỏ hàng
		$count = $model->count();
		if ($count == 0) {
			$this->session->set_flashdata('error', 'Chưa có khóa nào trong giỏ hàng! <a href="courses">Mua thêm khóa học</a>');
		}

		if ($this->input->get('delete')) {
			$id_cs = $this->input->get('delete');
			$model->delete_once_cart($id_cs);
			redirect(base_url('cart'));
		}
		if ($this->input->post('action') == 'buy') {
			if ($this->session->userdata['tien_thua'] < 0) {
			$this->session->set_flashdata('error', 'Bạn không đủ tiền! Vui lòng <a href="'.base_url("auth/money").'"">nạp thêm tiền</a> để mua khóa học.');
			}
			else{
				if ($this->input->post('code_cp')) {
					$code_cp = $this->input->post('code_cp');
				}
				else{
					$code_cp = 'null';
				}
				$model->buy_all_cart($code_cp);
				$this->session->set_flashdata('error', 'Mua thành công! <a href="auth">Vào học</a> thôi nào!');
			}
		}
		if ($this->input->post('action') == 'cancel') {
			$id = $this->session->userdata('id_user');
			$model->delete_all_cart($id);
			redirect(base_url('cart'));
		}

		// Khai báo tránh chuyền biến lỗi
		$coupon_discount['code_cp'] = '';
		$coupon_discount['percent_discount'] = 0;

		if ($this->input->get('coupon')) {
			$coupon = $this->input->get('coupon');
			$isset_coupon = $model->check_coupon($coupon);
			if ($isset_coupon != 1) {
				$this->session->set_flashdata('coupon_noti', '<b style="color:red">Lỗi! </b>Mã giảm giá không tồn tại!');
			}
			else{
				$expiration = $model->expiration($coupon);
				$date_expiration = (strtotime(date('Y-m-d')) - strtotime($expiration)) / (60*60*24);
				if ($date_expiration > 0) {
					$this->session->set_flashdata('coupon_noti', '<b style="color:red">Lỗi! </b>Mã giảm giá đã hết hạn!');
				}
				else{
					$coupon_apply = $model->coupon_apply($coupon);
					foreach ($coupon_apply as $key => $value){
						$coupon_discount['id_cp'] = $value['id_cp'];
						$coupon_discount['code_cp'] = $value['code_cp'];
						$coupon_discount['percent_discount'] = $value['percent_discount'];
						$coupon_discount['expiration_date'] = $value['expiration_date'];
					}
					$this->session->set_flashdata('coupon_noti', '<b>Thành công! </b>Áp dụng mã thành công!');
				}
			}
		}
		
		$result = $model->show_all_cart();
		$view->index($result, $count, $coupon_discount);
	}
	public function remove_coupon()
	{
		$this->session->set_flashdata('coupon_noti', '<b>Thành công! </b>Xóa mã giảm giá thành công!');
		redirect(base_url('cart'));
	}
}