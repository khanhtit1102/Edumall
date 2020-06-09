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
		// Load News Time - Phép tính trừ ngày
		$newTime = $model->dateNews();
		$newTime['courseTime'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($newTime['courseTime'])) / (60*60*24));
		$newTime['userTime'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($newTime['userTime'])) / (60*60*24));
		$newTime['ownTime'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($newTime['ownTime'])) / (60*60*24));
		$newTime['cmtTime'] = floor(abs(strtotime(date('Y-m-d')) - strtotime($newTime['cmtTime'])) / (60*60*24));
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
		$view->index($dashboard_count, $admin_chat, $page, $newTime);
	}
	public function qltv()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		if ($this->input->post('delete')) {
			if (!empty($this->input->post('id'))) {
				$id_mul_del =  $this->input->post('id');
				$count = count($id_mul_del);
				for ($i=0; $i < $count; $i++) { 
					$model->multi_del_user($id_mul_del[$i]);
				}
				$this->session->set_flashdata('error', 'Xóa thành công '.$count.' bản ghi!');
			}
			else{
                $this->session->set_flashdata('error', 'Chọn ít nhất 1 bản ghi để xóa!');
			}
		}
		$result = $model->qltv();
		$page = 'qltv';
		$view->qltv($result, $page);
	}
	public function send_mail()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$data['email'] = '';
		$data['subject'] = '';
		$data['message'] = '';


		if ($this->input->get('email')) {
			$data['email'] = $this->input->get('email');
		}
		switch ($this->input->get('subject')) {
			case 'call-user-back':
				$data['subject'] = 'Edumall rất nhớ bạn!';

				$coupon = $model->get_once_available();
				$data_cp['code_cp'] = '';
				foreach ($coupon as $key => $value) {
					$data_cp['code_cp'] = $value['code_cp'];
					$data_cp['percent_discount'] = $value['percent_discount'];
					$data_cp['expiration_date'] = $value['expiration_date'];
				}
				if ($data_cp['code_cp'] != NULL) {
					$data['message'] = "Đã lâu rồi chúng tôi không thấy bạn!<br>Hãy tiếp tục đăng nhập và trải nghiệm những khóa học của chúng tôi nào. Chúng tôi gửi bạn mã giảm giá mới nhất: <b><em>".$data_cp['code_cp']."</em></b> với ưu đãi <b>".$data_cp['percent_discount']."%</b> .<br>LƯU Ý: Mã giảm giá này chỉ có hạn đến ".$data_cp['expiration_date'].". <br>Hãy nhanh tay đăng nhập <a href='".base_url()."auth/login' taget='_blank'>tại đây</a> hoặc đường theo đường link sau: <br>".base_url('auth/login');
				}
				else{
					$data['message'] = "Đã lâu rồi chúng tôi không thấy bạn!<br>Hãy tiếp tục đăng nhập và trải nghiệm những khóa học của chúng tôi nào. <br>Hãy nhanh tay đăng nhập <a href='".base_url()."auth/login' taget='_blank'>tại đây</a> hoặc đường theo đường link sau: <br>".base_url('auth/login');
				}
				break;
			case 'reply_request_student':
				$data['subject'] = 'Học viên tại Edumall cần bạn!';
				$course = $this->input->get('course');
				$data['message'] = "Có vẻ như bạn đã quên những bình luận của học viên!<br>Hãy đăng nhập và trả lời những bình luận của họ nào. <br>Việc trả lời giúp học viên hiểu rõ và tiếp thu được nhiều hơn từ khóa học của bạn!<br>Hãy nhanh tay đăng nhập và truy cập vào khóa học của bạn <a href='".base_url('learn/course/').$course."' taget='_blank'>tại đây</a> hoặc đường theo đường link sau: <br>".base_url('learn/course/').$course;
				break;

			default:
				
				break;
		}
		if ($this->input->post('send_mail') == 'submit') {
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$result_email = $this->sendMail($email, $subject, $message);

				// Đã gửi Email

			if ($result_email == 1) {
				$this->session->set_flashdata('error', '<b>Gửi Email thành công!</b>!<br>'.$message);
			}
			if ($result_email == 0) {
				$this->session->set_flashdata('error', '<b>Lỗi gửi Email!<br>Đây là lỗi không có mạng.<br></b>'.$message);
			}
		}
		$page = 'send_mail';
		$view->send_mail($data, $page);
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
				$this->session->set_flashdata('error', 'Sửa thông tin thành công!');
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
			$this->session->set_flashdata('error', 'Xóa tài khoản thành công!');
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
			$this->session->set_flashdata('error', 'Thêm tài khoản thành công!');
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

		if ($this->input->post('delete')) {
			if (!empty($this->input->post('id'))) {
				$id_mul_del =  $this->input->post('id');
				$count = count($id_mul_del);
				for ($i=0; $i < $count; $i++) { 
					$model->multi_del_course($id_mul_del[$i]);
				}
				$this->session->set_flashdata('error', 'Xóa thành công '.$count.' bản ghi!');
			}
			else{
   				$this->session->set_flashdata('error', 'Chọn ít nhất 1 bản ghi để xóa!');
			}
		}

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
				$data['mota_cs'] = $this->input->post('mota_cs');
				$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
				$data['gia_cs'] = $this->input->post('gia_cs');
				$data['id_cate'] = $this->input->post('theloai_cs');
				$data['sobh_cs'] = $this->input->post('sobh_cs');
				$data['time_cs'] = $this->input->post('time_cs');

				if ($data['ten_cs'] == NULL) {
					$this->session->set_flashdata('error', 'Không được để trống tên khóa học!');
					redirect(base_url('admin_panel/edit_course/'.$id));
					die();
				}

				$model_update = new M_Admin();
				$model_update->update_course($data);
				$this->session->set_flashdata('error', 'Sửa khóa học thành công!');
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
			$this->session->set_flashdata('error', 'Xóa khóa học thành công!');
			redirect(base_url('admin_panel/qlkh'));
		}
	}
	public function add_course()
	{
		$model = new M_Admin();
		$view = new V_Admin();
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
			$data['created_date'] = date("Y-m-d");
			if ($data['ten_cs'] == NULL || $data['info_cs'] == NULL || $data['mota_cs'] == NULL || $data['giaotrinh_cs'] == NULL || $data['gia_cs'] == NULL || $data['id_cate'] == NULL || $data['sobh_cs'] == NULL || $data['time_cs'] == NULL) {
				$this->session->set_flashdata('error', '<b>Lỗi dữ liệu! </b>Không được để trống tất cả thông tin khóa học!');
				redirect(base_url('admin_panel/add_course'));
				die();
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
				$model->add_course($data);
				$newest_id = $model->get_id_newest_course($data);
				for ($i=1; $i <= $data['sobh_cs']; $i++) { 
					$model->add_episodes_course($newest_id, $i);
				}
				$this->session->set_flashdata('error', '<b>Thành công!</b> Thêm khóa học thành công. Vui lòng thêm bài học <a href="'.base_url('admin_panel/episodes_course/').$newest_id.'">tại đây</a>!');
				redirect(base_url('admin_panel/qlkh'));
			}
		}
		$page = 'add_course';
		$view->add_course($page);
	}
	public function episodes_course($id_cs = '')
	{
		$model = new M_Admin();
		$view = new V_Admin();
		$sobh_cs = $model->so_bai_hoc($id_cs);
		if ($this->input->post('update_episodes_course')) {
			$ep_number = $this->input->post('ep_number');
			$ep_title = $this->input->post('ep_title');
			// Check xem là có file hay không?
			if ($_FILES['video_name']['name'] != NULL) {
				$config['upload_path']          = '././res/uploads/';
				$config['allowed_types']        = 'mp4|ogg|ogv|avi|mov|flv';
				$config['max_size']             = 102400;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('video_name'))
				{
					$this->session->set_flashdata('error', '<b>Thất bại!</b><br>'.$this->upload->display_errors());
				}
				else
				{
					$upload_data = array('upload_data' => $this->upload->data());
					foreach ($upload_data as $key => $value) {
						$video_name = $value['file_name'];
					}
					$model->edit_episodes_course_with_video($ep_number, $ep_title, $id_cs, $video_name);
					$this->session->set_flashdata('error', '<b>Thành công!</b> Đã upload video và sửa thông tin bài học của khóa học!');
				}
			}
			else{
				// Không có video
				$model->edit_episodes_course_without_video($ep_number, $ep_title, $id_cs);
				$this->session->set_flashdata('error', '<b>Thành công!</b> Đã sửa thông tin bài học của khóa học!');
			}
		}
		
		$result = $model->load_episodes_course($id_cs);
		$page = 'episodes_course';
		$view->episodes_course($result, $page, $sobh_cs);
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
	public function blqh()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->blqh();
		$page = 'blqh';
		$view->blqh($result, $page);
	}
	public function delete_cmt($id = '')
	{
		$model = new M_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qlbl'));
		}
		else{
			$model->delete_cmt($id);
			$this->session->set_flashdata('error', 'Xóa bình luận thành công!');
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
	public function payment()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->load_payment();
		$page = 'payment';
		$view->payment($result, $page);
	}
	public function payment_accept($id_payreq = '')
	{
		// Chưa kiểm tra dữ liệu đã được thanh toán hay chưa
		$model = new M_Admin();
		$model->payment_accept($id_payreq);
		$this->session->set_flashdata('error', '<b>Thành công! </b>Đã thanh toán thành công..!');
		redirect(base_url('admin_panel/payment'));
	}
	public function qlmgg()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		$result = $model->qlmgg();
		$page = 'qlmgg';
		$view->qlmgg($result, $page);
	}
	public function themmgg()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		if ($this->input->post('add_coupon') == 'submit') {
			$add_data['code_cp'] = $this->input->post('code_cp');
			$add_data['percent_discount'] = $this->input->post('percent_discount');
			$add_data['expiration_date'] = $this->input->post('expiration_date');
			if ($add_data['code_cp'] == NULL || $add_data['percent_discount'] == NULL || $add_data['expiration_date'] == NULL) {
				$this->session->set_flashdata('error', '<b>Lỗi dữ liệu! </b>Không được để trống bất cứ thông tin nào!');
				redirect(base_url('admin_panel/themmgg'));
				die();
			}
			else{
				if ($add_data['percent_discount'] < 1 || $add_data['percent_discount'] > 100) {
					$this->session->set_flashdata('error', '<b>Lỗi dữ liệu! </b>Chiết khấu không được nhỏ hơn 1 hoặc lớn hơn 100!');
					redirect(base_url('admin_panel/themmgg'));
					die();
				}
				else{
					$model->add_coupon($add_data);
					$this->session->set_flashdata('error', '<b>Thành công! </b>Mã giảm giá đã được thêm!');
					redirect(base_url('admin_panel/qlmgg'));
				}
			}
		}
		$page = 'themmgg';
		$view->themmgg($page);
	}
	public function delete_coupon($id = '')
	{
		$model = new M_Admin();
		if ($id == null) {
			redirect(base_url('admin_panel/qlmgg'));
		}
		else{
			$model->delete_coupon($id);
			$this->session->set_flashdata('error', 'Xóa mã giảm giá thành công!');
			redirect(base_url('admin_panel/qlmgg'));
		}
	}
	// Export data to Excel Files
	public function export_member() {
		// Delete all file
		$files = glob('res/exports/*'); 
		foreach($files as $file){
			if(is_file($file))
				unlink($file);
		}
		// Create file name
        $fileName = 'thanhvien-'.date('d-m-Y').'.xlsx';  
		// Load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->employeeList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // Set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID User');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Email User');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Name User');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Job User');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Sex User');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'About User');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Permission User');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Code User');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Coin User');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Avatar User');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Created Date');
        // Set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['email_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['name_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['job_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['sex_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['about_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['permission_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['code_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['coin_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['avatar_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['created_date']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save("res/exports/".$fileName);
		// Download file
        header("Content-Type: application/vnd.ms-excel");
        redirect("../res/exports/".$fileName);     
    }
    private function sendMail($email, $subject, $message)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
  			'smtp_user' => 'khanhtit113@gmail.com',
  			'smtp_pass' => 'oqcffpubobvrtnvc',
  			'mailtype' => 'html',
  			'charset' => 'UTF-8',
  			'wordwrap' => TRUE
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
    public function chart()
    {
    	$model = new M_Admin();
    	$count_all = $model->count_all_user();
		$admin = $model->data_chart($per = 3);
		$teacher = $model->data_chart($per = 2);
		$user = $model->data_chart($per = 1);
		$non_user = $model->data_chart($per = 0);
		// Tinh Phan Tram
		$percent['admin'] = round($admin / $count_all * 100,2);
		$percent['teacher'] = round($teacher / $count_all * 100,2);
		$percent['user'] = round($user / $count_all * 100,2);
		$percent['non_user'] = round($non_user / $count_all * 100,2);
		echo json_encode($percent);
    }
}
