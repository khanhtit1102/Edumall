<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'form'));	
		$this->load->library("session");
	}
	public function index()
	{
		
		if ($this->session->has_userdata('id_user')) {
			$this->load->model('m_auth');
			$model = new M_Auth();

			$this->load->view('v_auth');
			$view = new V_Auth();

			// Show owner courses
			$this->load->model('m_auth');
			$model = new M_Auth();
			$owner = $model->show_owner_course();

			$data = $model->show_once();

			if ($this->input->post('changeinfo') == 'changeinfo') {
				$id = $this->session->userdata('id_user');
				$name = $this->input->post('name_user');
				$job = $this->input->post('job_user');
				$about = $this->input->post('about_user');

				$model->changeinfo($id, $name, $job, $about);
			}
			if ($this->input->post('changepass') == 'changepass') {
				$id = $this->session->userdata('id_user');
				$oldpass = $this->input->post('oldpass');
				$newpass = $this->input->post('newpass');

				$model->changepass($id, $oldpass, $newpass);
			}
			if ($this->input->post('change_image') == 'submit') {
				$config['upload_path']          = './res/uploads/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 10240;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                	$this->session->set_flashdata('error', $this->upload->display_errors());
                }
                else
                {
                    $upload_data = array('upload_data' => $this->upload->data());
                    foreach ($upload_data as $key => $value) {
                    	$file_name = $value['file_name'];
                    }
                    $id_user = $this->session->userdata['id_user'];
                    $model->change_image($file_name, $id_user);
                    $this->session->set_flashdata('error', 'Thay đổi ảnh đại diện thành công!');
                    redirect(base_url('auth'));
                }
			}
			$view->show_info($data, $owner);
		}
		else{
			redirect(base_url('auth/login'));
		}
	}
	public function login()
	{
		if ($this->session->has_userdata('id_user')) {
			redirect(base_url('auth'));
		}
		else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Mật khẩu', 'required|min_length[6]');
			if($this->form_validation->run() == FALSE){
				$this->load->view('v_auth');
				$view = new V_Auth();
				$view->show_login();
			}
			else{
				$this->login_submit();
			}
		}
		
	}
	public function login_submit()
	{
		$this->load->model('m_auth');
		$model = new M_Auth();

		if ($this->input->post('login') == 'login') {
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));
			$error = $model->login($email, $pass);
            if ($error == 3) {
                $this->session->set_flashdata('error', 'Tài khoản của bạn đã được đăng nhập ở nơi khác.<br>Vui lòng đăng xuất tài khoản ở thiết bị trước!');
            }
			if ($error == 2) {
				$this->session->set_flashdata('error', 'Tài khoản của bạn chưa được kích hoạt!<br>- Vui lòng kiểm tra lại hộp thư đến trong Email!');
			}
			if ($error == 1) {
				$this->session->set_flashdata('error', 'Đăng nhập thành công!');
				redirect(base_url('auth'));
			}
			if ($error == 0){
				$this->session->set_flashdata('error', 'Tài khoản hoặc mật khẩu không đúng!<br>- Vui lòng nhập lại!');
			}

		}
		else{

		}
        redirect(base_url('auth/login'));
	}
	public function login_fb()
	{
		$this->load->library('facebook', array('appId' => '236587060565211', 'secret' => '14195e4f595a015e30bdd201c6c93240'));
		$user = $this->facebook->getUser();
		if ($user) {
			echo $data['user_profile'] = $this->facebook->api('/me/'); die();
		}
		else{
			echo $data['login_url'] = $this->facebook->getLoginUrl(); die();
		}
	}
	public function register()
	{
		if ($this->session->has_userdata('id_user')) {
			redirect(base_url('auth'));
		}
		else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Họ và tên', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Mật khẩu', 'required|min_length[6]');
			if($this->form_validation->run() == FALSE){
				$this->load->view('v_auth');
				$view = new V_Auth();
				$view->show_register();
			}
			else{
				$this->register_submit();
			}
		}
		
		
	}
	public function register_submit()
	{
		
		if ($this->input->post('register') == 'register') {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));
			$type_account = $this->input->post('type_account');
			$job_user = $this->input->post('job');
			$date = date("Y-m-d");
			$code = $this->generateRandomString();

			// Tạo dữ liệu gửi Email
            $subject = 'Kích hoạt tài khoản của bạn';

			$link = base_url('auth/request').'?type=active&email='.$email.'&code='.$code;
			if ($type_account == 2) {
				$link = base_url('auth/request').'?type=active_teacher&email='.$email.'&code='.$code;
			}
			$message = 'Xin chào '.$username.' !<br>Email của bạn đã được sử dụng để kích hoạt tài khoản trên hệ thống Edumall.<br>Nếu bạn thực hiện việc này, hãy bấm vào <a href="'.$link.'">đây</a> để kích hoạt!<br>Hoặc đường liên kết sau: '.$link.'<br>- Nếu bạn không thực hiện việc này, hãy bỏ qua thư của chúng tôi.<br>Cảm ơn bạn!';
			$result = $this->sendMail($email, $subject, $message);

			// Đã gửi Email

			if ($result == 1) {
				$this->session->set_flashdata('error', '<b>Gửi Email thành công!</b>!<br>Hãy kiểm tra lại hộp thư đến trong Email để xác nhận!');
			}
			if ($result == 0) {
				$this->session->set_flashdata('error', '<b>Lỗi gửi Email!</b><br>Đây là lỗi của chúng tôi.<br>Liên hệ <a href="mailto:khanhtitictu@gmail.com">Admin</a> để báo lỗi.<br>Đây là đường link kích hoạt của bạn: <a href="'.$link.'">'.$link.'</a>');
			}
			$this->load->model('m_auth');
			$model = new M_Auth();
			$model->register($username, $email, $pass, $type_account, $job_user, $date, $code);
		}
		redirect(base_url('auth/register'));
	}
	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function request()
	{
		$type = $this->input->get('type');
		$email = $this->input->get('email');
		$code = $this->input->get('code');
		if ($type == NULL || $email == NULL || $code == NULL) {
			redirect(base_url('auth'));
		}
		else{
			$this->load->model('m_auth');
			$model = new M_Auth();

			if ($type == 'active') {
				$result = $model->active($email, $code);
				if ($result == 1) {
					$this->session->set_flashdata('error', 'Kích hoạt tài khoản thành công!');
				}
				else{
					$this->session->set_flashdata('error', 'Kích hoạt tài khoản không thành công hoặc bạn đã kích hoạt trước đó!');
				}
				redirect(base_url('auth/login'));
			}
			if ($type == 'active_teacher') {
				$result = $model->active_teacher($email, $code);
				if ($result == 1) {
					$this->session->set_flashdata('error', 'Kích hoạt tài khoản thành công!');
				}
				else{
					$this->session->set_flashdata('error', 'Kích hoạt tài khoản không thành công hoặc bạn đã kích hoạt trước đó!');
				}
				redirect(base_url('auth/login'));
			}
			if ($type == 'forgot_password') {
				$result = $model->check_code($email, $code);
				if ($result == 1) {
					if ($this->input->post('newpass')) {
						$newpass = md5($this->input->post('newpass'));
						$model->reset_pass($email, $newpass, $code);
						$this->session->set_flashdata('error', 'Mật khẩu của bạn đã được đổi!');
						redirect(base_url('auth/login'));
					}
					$this->load->view('v_auth');
					$view = new V_Auth();
					$view->reset_pass();
				}
				else{
					$this->session->set_flashdata('error', 'Thay đổi mật khẩu thất bại hoặc sai mã bí mật!');
					redirect(base_url('auth/login'));
				}
			}
		}
	}
	public function forgot_password()
	{
		$email = $this->input->post('email');
		if ($email == NULL) {
			$this->session->set_flashdata('error', 'Tìm lại mật khẩu trống!');
		}
		else{
			$this->load->model('m_auth');
			$model = new M_Auth();	
			$result = $model->forgot_pass($email);
            $subject = 'Yêu cầu đặt lại mật khẩu';

			// Nếu nhập đúng Email có trong hệ thống
			if ($result == 1) {

				// Tạo dữ liệu gửi Email
				$code = $this->generateRandomString();
				$link = base_url('auth/request/').'?type=forgot_password&email='.$email.'&code='.$code;
				$message = 'Xin chào !<br>Bạn đã yêu cầu cấp lại mật khẩu tài khoản của bạn trên hệ thống Edumall.<br>Nếu bạn thực hiện việc này, hãy bấm vào <a href="'.$link.'">đây</a> để đặt lại mật khẩu!<br>Hoặc đường liên kết sau: '.$link.'<br>- Nếu bạn không thực hiện việc này, hãy bỏ qua thư của chúng tôi.<br>Cảm ơn bạn!';
				$result_email = $this->sendMail($email, $subject, $message);

				// Đã gửi Email

				if ($result_email == 1) {
					$this->session->set_flashdata('error', '<b>Gửi Email thành công!</b>!<br>Hãy kiểm tra lại hộp thư đến trong Email để xác nhận!');
				}
				if ($result_email == 0) {
					$this->session->set_flashdata('error', '<b>Lỗi gửi Email!</b><br>Đây là lỗi của chúng tôi.<br>Liên hệ <a href="mailto:khanhtitictu@gmail.com">Admin</a> để báo lỗi.<br>Đây là đường link kích hoạt của bạn: <a href="'.$link.'">'.$link.'</a>');
				}
				$model->set_code($email, $code);
			}
			else{
				$this->session->set_flashdata('error', '<b>Lỗi!</b><br>Email bạn nhập vào không có trong hệ thống của chúng tôi!');
			}
		}
		redirect(base_url('auth/login'));
	}
	private function sendMail($email, $subject, $message)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
  			'smtp_user' => 'khanhnongvan0@gmail.com',
  			'smtp_pass' => 'ahkxlstejnrhlhqv',
  			'mailtype' => 'html',
  			'charset' => 'UTF-8',
  			'wordwrap' => TRUE,
                        'smtp_crypto' => 'tls'
  		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
     	$this->email->from('Quản trị viên hệ thống');
    	$this->email->to($email);
    	$this->email->subject($subject);
    	$this->email->message($message);
    	if($this->email->send())
    	{
    		$result = 1;
    	}
    	else
    	{
    		$result = 0;
    		// show_error($this->email->print_debugger());
    	}
    	return $result;

    }
    public function money()
	{
		if ($this->session->has_userdata('id_user') == FALSE) {
			redirect(base_url('auth'));
		}
		$this->load->view('v_auth');
		$view = new V_Auth();
		$this->load->model('m_auth');
		$model = new M_Auth();
		if ($this->input->post('nap_the') == 'submit') {
			$menh_gia = $this->input->post('menh_gia');
			$ma_nap = $this->input->post('ma_nap');
			$model->add_money($menh_gia, $ma_nap);
			$this->session->set_flashdata('error', 'Nạp thêm <b>'.number_format($menh_gia).'</b> VND thành công!');
			redirect(base_url('auth'));
		}
		$view->add_money();
		
	}
	public function logout()
	{
	    // Clear IP on DB
        $this->load->model('m_auth');
        $model = new M_Auth();
        $model->clear_last_ip();
		// Clear all SESSION value
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}

}