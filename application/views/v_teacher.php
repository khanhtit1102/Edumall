<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_Teacher
{
	public function index($dashboard_count, $teacher_chat, $page)
	{
		include "res/teacher/index.php";
	}
	public function edit_course($result)
	{
		include "res/teacher/edit-course.php";
	}
	public function qlkh($result)
	{
		include "res/teacher/ql-kh.php";
	}
}