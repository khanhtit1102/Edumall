<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_Panel extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");

		// Kiểm tra tài khoản Giáo Viên
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
		else{
			if ($this->session->userdata('permission_user') != 2) {
				redirect(base_url('home'));
			}
		}
		$this->load->model('m_teacher');
		
		$this->load->view('v_teacher');
		
	}
	public function index()
	{
		$model = new M_Teacher();
		$view = new V_Teacher();
		// Load Count Header
		$id_user = $this->session->userdata('id_user');
		$dashboard_count = $model->dashboard_count($id_user);
		// Load Teacher Chat
		$teacher_chat = $model->teacher_chat();
		if ($this->input->post('teacher_chat') == 'submit') {
			if ($this->input->post('content_chat') == null) {
				echo "<script type='text/javascript'>alert('Không được để trống ô chat!');</script>";
			}
			else{
				$comment['id_user'] = $this->session->userdata('id_user');
				$comment['content_chat'] = $this->input->post('content_chat');
				$comment['date_chat'] = date("Y-m-d H:i:s");
				$model->add_chat($comment);
				redirect(base_url('teacher_panel'));
			}
		}
		$page = 'dashboard';
		$view->index($dashboard_count, $teacher_chat, $page);

	}
	public function qltt()
	{
		$model = new M_Teacher();
		$view = new V_Teacher();

		$id_user = $this->session->userdata('id_user');
		$result = $model->qltt($id_user);
		$page = 'qltt';
		$view->qltt($result, $page);
	}
	public function payment()
	{
		$model = new M_Teacher();
		$view = new V_Teacher();
		$data['id_user'] = $this->session->userdata('id_user');
		if ($this->input->post('payment_request') == 'submit') {
			$coin_user = $this->session->userdata('coin_user');
			$data['date_payreq'] = date('Y-m-d H:i:s');
			$data['method_payreq'] = $this->input->post('method_payreq');
			$data['name_holder'] = $this->input->post('name_holder');
			$data['number_cart'] = $this->input->post('number_cart');
			$data['amount_payreq'] = $this->input->post('amount_payreq');
			$data['message_payreq'] = $this->input->post('message_payreq');
			// Kiểm tra dữ liệu nhập vào
			if ($data['method_payreq'] == null || $data['name_holder'] == null || $data['number_cart'] == null || $data['amount_payreq'] == null) {
				$this->session->set_flashdata('error', '<b>Lỗi! </b>Vui lòng nhập đầy đủ thông tin..!');
			}
			else{
				if ($data['amount_payreq'] <= 0 || $data['amount_payreq'] > $coin_user) {
					$this->session->set_flashdata('error', '<b>Lỗi số tiền! </b>Vui lòng nhập số dương và không quá số tiền bạn có..!');
				}
				else{
					$new_coin = $this->session->userdata('coin_user')-$data['amount_payreq'];
					$model->add_payment_request($data, $new_coin);
					$this->session->set_userdata('coin_user', $new_coin);
					$this->session->set_flashdata('error', '<b>Thành công! </b> Vui lòng đợi Quản trị viên thanh toán cho bạn..!');
				}
			}
			redirect(base_url('teacher_panel/payment'));
		}
		$result = $model->get_history_payment($data['id_user']);
		$page = 'payment';
		$view->payment($result, $page);
	}
	public function qlkh()
	{
		$model = new M_Teacher();
		$view = new V_Teacher();

		$id_user = $this->session->userdata('id_user');

		if ($this->input->get('delete')) {
			$id = $this->input->get('delete');
			$model->delete_course($id, $id_user);
		}
		$result = $model->qlkh($id_user);
		$page = 'qlkh';
		$view->qlkh($result, $page);
	}
	public function delete_course($id = '')
	{
		$model = new M_Teacher();
		if ($id == null) {

		}
		else{
			$id_user = $this->session->userdata('id_user');
			$check_own = $model->check_own($id, $id_user);
			if ($check_own != 1) {
				$this->session->set_flashdata('error', '<b>Lỗi! </b>Dữ liệu xóa không đúng..!');
			}
			else{
				$model->delete_course($id);
				$this->session->set_flashdata('error', '<b>Thành công! </b>Xóa tài khoản thành công!');
			}
		}
		redirect(base_url('teacher_panel/qlkh'));
	}
	public function edit_course($id = '')
	{
		$model = new M_Teacher();
		$view = new V_Teacher();
		if ($id == null) {
			redirect(base_url('teacher_panel/qlkh'));
		}
		else{
			if ($this->input->post('update_course') == 'submit') {
				$data['id_cs'] = $id;
				$data['ten_cs'] = $this->input->post('ten_cs');
				$data['info_cs'] = $this->input->post('info_cs');
				$data['mota_cs'] = $this->input->post('mota_cs');
				$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
				$data['gia_cs'] = $this->input->post('gia_cs');
				$data['id_cate'] = $this->input->post('theloai_cs');
				$data['sobh_cs'] = $this->input->post('sobh_cs');
				$data['time_cs'] = $this->input->post('time_cs');
				$data['playlist_key'] = $this->input->post('playlist_key');

				if ($data['ten_cs'] == NULL || $data['info_cs'] == NULL || $data['mota_cs'] == NULL || $data['giaotrinh_cs'] == NULL || $data['gia_cs'] == NULL || $data['id_cate'] == NULL || $data['sobh_cs'] == NULL || $data['time_cs'] == NULL || $data['playlist_key'] == NULL) {
					$this->session->set_flashdata('error', '<b>Lỗi dữ liệu! </b>Không được để trống tất cả thông tin khóa học!');
					redirect(base_url('teacher_panel/edit_course/'.$id));
				}
				$model->update_course($data);
				$this->session->set_flashdata('error', 'Sửa khóa học thành công!');
				redirect(base_url('teacher_panel/qlkh'));
			}
			
			
			$result = $model->show_one_course($id);
			$page = 'edit_course';
			$view->edit_course($result, $page);
		}
	}
	public function add_course()
	{
		$model_update = new M_Teacher();
		$view = new V_Teacher();
		if ($this->input->post('add_course') == 'submit') {
			$data['ten_cs'] = $this->input->post('ten_cs');
			$data['info_cs'] = $this->input->post('info_cs');
			$data['id_user'] = $this->session->userdata('id_user');
			$data['mota_cs'] = $this->input->post('mota_cs');
			$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
			$data['gia_cs'] = $this->input->post('gia_cs');
			$data['id_cate'] = $this->input->post('theloai_cs');
			$data['sobh_cs'] = $this->input->post('sobh_cs');
			$data['time_cs'] = $this->input->post('time_cs');
			$data['playlist_key'] = $this->input->post('playlist_key');
			$data['created_date'] = date("Y-m-d");
			if ($data['ten_cs'] == NULL || $data['info_cs'] == NULL || $data['mota_cs'] == NULL || $data['giaotrinh_cs'] == NULL || $data['gia_cs'] == NULL || $data['id_cate'] == NULL || $data['sobh_cs'] == NULL || $data['time_cs'] == NULL || $data['playlist_key'] == NULL) {
				$this->session->set_flashdata('error', '<b>Lỗi dữ liệu! </b>Không được để trống tất cả thông tin khóa học!');
				redirect(base_url('teacher_panel/add_course'));
			}
			// Upload Image
			$config['upload_path']          = 'res/uploads';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 10240;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('thumb_cs'))
			{
				$this->session->set_flashdata('error', '<b>Lỗi!</b> Ảnh không được tải lên.'.$this->upload->display_errors());
			}
			else
			{
				$upload_data = array('upload_data' => $this->upload->data());
				foreach ($upload_data as $key => $value) {
					$data['thumb_cs'] = $value['file_name'];
				}
				$model_update->add_course($data);
				$this->session->set_flashdata('error', 'Thêm khóa học thành công!');
				redirect(base_url('teacher_panel/qlkh'));
			}
		}
		$page = 'add_course';
		$view->add_course($page);
	}
	public function qlbl()
	{
		$model = new M_Teacher();
		$view = new V_Teacher();

		$id_user = $this->session->userdata('id_user');
		$result = $model->qlbl($id_user);
		$page = 'qlbl';
		$view->qlbl($result, $page);
	}
}
