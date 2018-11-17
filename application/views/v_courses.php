<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_Courses
{
	public function index($countrow, $query_poster, $paginator, $category, $fee, $keyword, $filter)
	{
		include 'res/courses.php';
	}
}