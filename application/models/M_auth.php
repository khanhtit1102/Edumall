<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
	public function login($email, $pass)
	{
		$sql = "SELECT count(id_user) FROM user WHERE email_user = '$email' AND pass_user ='$pass'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count(id_user)'];
		}
		if ($count == 1 ) {
			// Lưu thông tin vào SESSION
			$sql = "SELECT * FROM user WHERE email_user = '$email'";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				# Check Kích hoạt
				$per = $row['permission_user'];
				$session_user = array(
					'id_user'=> $row['id_user'],
					'email_user'=> $row['email_user'],
					'name_user' => $row['name_user'],
					'job_user' => $row['job_user'],
					'about_user' => $row['about_user'],
					'avatar_user' => $row['avatar_user'],
					'permission_user' => $row['permission_user'],
					'coin_user' => $row['coin_user'],
					);
			}
			if ($per == 0) {
				$error = 2; 
			}
			else{
				$this->session->set_userdata($session_user);
				$error = 1;
			}
		}
		else{
			$error = 0;
		}
		return $error;
	}
	public function register($username, $email, $pass, $type_account, $job_user, $date, $code)
	{
		$sql = "SELECT count(id_user) FROM user WHERE email_user = '$email'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count(id_user)'];
		}
		if ($count == 1) {
			$this->session->set_flashdata('error', 'Tài khoản đã bị trùng! Vui lòng nhập lại!');
		}
		else{
			$sql = "INSERT INTO user(name_user, pass_user, email_user, permission_user, job_user, created_date, code_user) VALUES ('$username', '$pass', '$email', '$type_account', '$job_user', '$date', '$code')";
			$query = $this->db->query($sql);
		}
	}
	public function active($email, $code)
	{
		# Kiểm tra email và code
		$sql = "SELECT count(email_user) AS count FROM user WHERE email_user = '$email' AND code_user = '$code'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count'];
		}
		if ($count == 1) {
			$this->db->set('permission_user', 1);
			$this->db->set('code_user', '');
			$this->db->where('email_user', $email);
			$this->db->update('user');
			$result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
	}
	public function active_teacher($email, $code)
	{
		# Kiểm tra email và code
		$sql = "SELECT count(email_user) AS count FROM user WHERE email_user = '$email' AND code_user = '$code' AND permission_user = '2'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count'];
		}
		if ($count == 1) {
			$this->db->set('permission_user', 2);
			$this->db->set('code_user', '');
			$this->db->where('email_user', $email);
			$this->db->update('user');
			$result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
	}
	public function forgot_pass($email)
	{
		$sql = "SELECT count(email_user) AS count FROM user WHERE email_user = '$email' AND permission_user != '0'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count'];
		}
		return $count;
	}
	public function set_code($email, $code)
	{
		$this->db->set('code_user', $code);
		$this->db->where('email_user', $email);
		$this->db->update('user');
	}
	public function check_code($email, $code)
	{
		$sql = "SELECT count(email_user) AS count FROM user WHERE email_user = '$email' AND code_user = '$code'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count'];
		}
		return $count;
	}
	public function reset_pass($email, $newpass, $code)
	{
		$this->db->set('pass_user', $newpass);
		$this->db->set('code_user', '');
		$this->db->where('email_user', $email);
		$this->db->where('code_user', $code);
		$this->db->update('user');
	}
	public function show_once()
	{
		$id = $this->session->userdata('id_user');
		$sql = "SELECT * FROM user WHERE id_user = '$id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function show_owner_course()
	{
		#SELECT course.id_cs, course.ten_cs, course.thumb_cs, user.name_user FROM course, own, user WHERE course.id_cs = own.id_cs AND own.id_user = user.id_user AND own.id_user = 1 ORDER BY own.date_own DESC
		$id = $this->session->userdata('id_user');
		$this->db->select('course.id_cs, course.ten_cs, course.thumb_cs, user.name_user');
		$this->db->where('course.id_cs = own.id_cs');
		$this->db->where('own.id_user = user.id_user');
		$this->db->where('own.id_user', $id);
		$this->db->order_by('own.date_own', 'DESC');
		
		$query = $this->db->get('course, own, user');
		return $query->result_array();
	}
	public function change_image($file_name, $id_user)
	{
		$this->db->set('avatar_user', $file_name);
		$this->db->where('id_user', $id_user);
		$this->db->update('user');
	}
	public function changeinfo($id, $name, $job, $about)
	{
		$sql = "UPDATE user SET name_user = '$name', job_user = '$job', about_user = '$about' WHERE id_user = '$id'";
		$query = $this->db->query($sql);
		$this->session->set_flashdata('error', 'Thay đổi thông tin thành công!');
	}
	public function changepass($id, $oldpass, $newpass)
	{
		if (strlen($oldpass) < 6 || strlen($newpass) < 6) {
			$this->session->set_flashdata('error', 'Vui lòng nhập mật khẩu lớn hơn 6 ký tự!');
		}
		else{
			$oldpass = md5($oldpass);
			$newpass = md5($newpass);
			$sql = "SELECT count(id_user) FROM user WHERE id_user = '$id' AND pass_user ='$oldpass'";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				$count = $row['count(id_user)'];
			}
			if ($count == 1) {
				$sql = "UPDATE user SET pass_user = '$newpass' WHERE id_user = '$id' ";
				$query = $this->db->query($sql);
				$this->session->set_flashdata('error', 'Đổi mật khẩu thành công!');

			}
			else{
				$this->session->set_flashdata('error', 'Sai mật khẩu hiện tại!');
			}
		}
	}
	public function add_money($menh_gia, $ma_nap)
	{
		$id = $this->session->userdata('id_user');
		$old_coin = $this->session->userdata('coin_user');
		$new_coin = $menh_gia + $old_coin;
		// Thêm dữ liệu vào bảng money_history
		$data = array(
			'id_user' => $id,
			'menh_gia' => $menh_gia,
			'ma_nap' => $ma_nap,
		);
		$this->db->insert('money_history', $data);
		// Sửa tiền của user
		$this->db->set('coin_user', $new_coin);
		$this->db->where('id_user', $id);
		$this->db->update('user');
		$this->session->set_userdata('coin_user', $new_coin);
	}
}