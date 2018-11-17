<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));	
		$this->load->library("session");
	}
	public function index()
	{
		$this->load->model('m_home');
		$model = new M_Home();
		$allcate = $model->load_all_cate();
		$slide_new = $model->load_slide_newest();
		$slide_price = $model->load_slide_price();
		$slide_random = $model->load_slide_rand();

		$this->load->view('v_home');
		$view = new V_Home();
		$view->index($allcate,$slide_new,$slide_price,$slide_random);
	}
}