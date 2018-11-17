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
		<div class="row">
			<h1>Trang nạp tiền chính thức của hệ thống <b>Edumall</b></h1>
			<hr>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h4>Bảng quy đổi tiền trong hệ thống</h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Giá</th>
							<th>Quy đổi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10,000 VND</td>
							<td>10,000 Coin</td>
						</tr>
						<tr>
							<td>20,000 VND</td>
							<td>20,000 Coin</td>
						</tr>
						<tr>
							<td>50,000 VND</td>
							<td>50,000 Coin</td>
						</tr>
						<tr>
							<td>100,000 VND</td>
							<td>100,000 Coin</td>
						</tr>
						<tr>
							<td>200,000 VND</td>
							<td>200,000 Coin</td>
						</tr>
						<tr>
							<td>500,000 VND</td>
							<td>500,000 Coin</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<form action="" method="POST" role="form">
					<legend>- Điền đầy đủ thông tin</legend>
				
					<div class="form-group" style="width: 30%">
						<label for="">Chọn mệnh giá thẻ:</label>
						<select name="menh_gia" id="menh_gia" class="form-control" required="required">
							<option value="10000">10,000 VND</option>
							<option value="20000">20,000 VND</option>
							<option value="50000">50,000 VND</option>
							<option value="100000">100,000 VND</option>
							<option value="200000">200,000 VND</option>
							<option value="500000">500,000 VND</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Mã thẻ nạp:</label>
						<input type="text" name="ma_nap" id="ma_nap" class="form-control" required="required" autocomplete="off">
					</div>
					<button type="submit" name="nap_the" value="submit" class="btn btn-danger" style="width: 100%">Xác nhận</button>
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