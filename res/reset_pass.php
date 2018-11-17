<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/'); ?>imgs/icon.png">
	<title>Trang nạp tiền chính thức</title>
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/account.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main class="container" style="background-color: #f8f8f8;">
		<br>
		<div class="row" align="center">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
				<h1>Thay đổi mật khẩu</h1>
				<hr>
				<form action="" method="POST" role="form">
					<div class="form-group">
						<input type="password" name="newpass" class="form-control" minlength="6" required="" placeholder="Nhập mật khẩu mới">
					</div>
					<button type="submit" class="btn btn-danger" style="width: 100%">Thay đổi</button>
				</form>
			</div>
		</div>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<script src="<?php echo base_url('res/'); ?>bs/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url('res/'); ?>bs/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>