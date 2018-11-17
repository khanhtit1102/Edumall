<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/'); ?>imgs/icon.png">
	<title>Giỏ hàng - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/cart.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<br>
				<?php if (isset($_SESSION['error'])) {
					echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
				} ?>
				<h2>Giỏ hàng: <?php echo $count; ?> khoá học</h2><hr><hr>
				<div class="trai col-md-8">
					<div class="list-item">
						<table>
							<?php 
							$price = 0;
									foreach ($result as $key => $value) {
										$price += $value['gia_cs'];
								 ?>
							<tr>
								<td>
									<div class="course-list">
										<div class="course-image col-md-4">
											<a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><img src="res/imgs/<?php echo $value['thumb_cs']; ?>" alt="" width="100%"></a>
										</div>
										<div class="course-content col-md-7">
											<a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><h4 class="title"><?php echo $value['ten_cs']; ?></h4></a>
											<p class="author">Giảng viên: <b><?php echo $value['id_user']; ?></b></p>
											<h4 class="price"><?php echo number_format($value['gia_cs']); ?>đ</h4>
										</div>
										<div class="course-action col-md-1">
											<a href="cart?delete=<?php echo $value['id_cs']; ?>" class="btn btn-default" onclick="return confirm('Bạn thực sự muốn hủy khóa học này?');"><i class="fa fa-times"></i></a>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<div class="phai col-md-4">
					<h3>Hoá đơn của bạn</h3>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tiền của bạn: </th>
								<th><?php echo number_format($_SESSION['coin_user']); ?>đ</th>
							</tr>
							<tr>
								<th>Tổng tiền: </th>
								<th><?php echo number_format($price); ?>đ</th>
							</tr>
							<tr>
								<th>Số tiền còn lại: </th>
								<th><?php echo number_format($_SESSION['tien_thua'] = $_SESSION['coin_user'] - $price); ?>đ</th>
							</tr>
						</thead>
					</table>
					<?php 
						if ($price != 0) {
						
					 ?>
					<a href="cart?action=buy" class="btn btn-success">Mua Khoá Học</a><br><br>
					<a href="cart?action=cancel" class="btn btn-danger">Huỷ Hoá Đơn</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<!-- Script -->
	<script src="js/webjs.js"></script>
	<script src="bs/js/jquery.js"></script>
	<script src="bs/js/bootstrap.min.js"></script>
</body>
</html>