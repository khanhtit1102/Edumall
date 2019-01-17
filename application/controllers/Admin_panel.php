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
				$data['playlist_key'] = $this->input->post('playlist_key');

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
		$model_update = new M_Admin();
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
			$data['playlist_key'] = $this->input->post('playlist_key');
			$data['created_date'] = date("Y-m-d");
			if ($data['ten_cs'] == NULL || $data['info_cs'] == NULL || $data['mota_cs'] == NULL || $data['giaotrinh_cs'] == NULL || $data['gia_cs'] == NULL || $data['id_cate'] == NULL || $data['sobh_cs'] == NULL || $data['time_cs'] == NULL || $data['playlist_key'] == NULL) {
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
				$model_update->add_course($data);
				$this->session->set_flashdata('error', '<b>Thành công!</b> Thêm khóa học thành công!');
				redirect(base_url('admin_panel/qlkh'));
			}
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
	// Export data to Excel Files
	public function createXLS() {
		// Delete all file
		$files = glob('res/exports/*'); 
		foreach($files as $file){
			if(is_file($file))
				unlink($file);
		}
		// Create file name
        $fileName = 'data-'.date('d-m-Y').'.xlsx';  
		// Load excel library
        $this->load->library('excel');
        $model = new M_Admin();
        $empInfo = $model->employeeList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // Set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ID User');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Email User');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Pass User');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Name User');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Job User');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Sex User');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'About User');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Permission User');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Code User');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Coin User');
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Avatar User');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Created Date');
        // Set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['id_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['email_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['pass_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['name_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['job_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['sex_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['about_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element['permission_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element['code_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element['coin_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element['avatar_user']);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element['created_date']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save("res/exports/".$fileName);
		// Download file
        header("Content-Type: application/vnd.ms-excel");
        redirect("../res/exports/".$fileName);     
    }
}
