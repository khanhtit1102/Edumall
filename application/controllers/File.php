<?php
class File extends CI_Controller{
	public function __construct(){
		parent::__construct();
		#Tải thư viện  và helper của Form trên CodeIgniter
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session'));
	}
	
	public function index(){
		$this->load->view('file-template');
	}
	
	public function upload(){
		$a_Data = array();
		$b_Check = false;
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_FILES["file"]["name"]){
				# Tạo thư mục 
				$album_dir  =  'uploads/images/';
				if(!is_dir($album_dir)){
					create_dir($album_dir);
				}
				#upload.
				$config['upload_path']	 =  $album_dir;
				$config['allowed_types'] =  'jpg|png|jpeg|gif';
				$config['max_size'] =  5120;
					
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$image =  $this->upload->do_upload("file");
				$image_data  = 	$this->upload->data();
				if($image) {
					#upload execute.
					$info['source'] =	$config['upload_path'].$image_data['file_name'];
					$b_Check = true;
					$this->session->set_userdata('album', $image_data);
					redirect(base_url('file/show'));
				} else {
					$b_Check = false;
				}
			}
		}
		$a_Data['b_CheckUpload'] = $b_Check;
		$this->load->view('file-template', $a_Data);
	}
	
	public function checkImages(){
		$a_Data = array();
		$a_Album = $this->session->userdata('album');
		if( is_array($a_Album) ){
			$a_Data['album'] = $this->session->userdata('album');
		}
		$this->load->view('show-template', $a_Data);
	}	
}