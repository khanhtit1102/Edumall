<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/') ?>imgs/icon.png">
	<title>Trang Quản Lý Của Giáo viên - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/morris.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/admin-index.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/dataTables.bootstrap.min.css">
</head>
<body>
	<main>
		<section class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<?php include 'res/teacher/sidebar.php' ?>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<?php include 'res/teacher/'.$page.'.php' ?>
			</div>
		</section>
	</main>
	<!-- Script -->
	<script type="text/javascript" src="<?php echo base_url('res/') ?>bs/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>bs/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/webjs.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/raphael-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/morris.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/js/chart-').$page.'.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/jscustom.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/dataTables.bootstrap.min.js"></script>
</body>
</html>