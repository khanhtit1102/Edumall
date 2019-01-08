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
											<a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><img src="res/uploads/<?php echo $value['thumb_cs']; ?>" alt="" width="100%"></a>
										</div>
										<div class="course-content col-md-7">
											<a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><h4 class="title"><?php echo $value['ten_cs']; ?></h4></a>
											<p class="author">Giảng viên: <b><?php echo $value['name_user']; ?></b></p>
											<h4 class="price"><?php echo number_format($value['gia_cs']); ?>đ</h4>
										</div>
										<div class="course-action col-md-1">
											<a href="cart?delete=<?php echo $value['id_cs']; ?>" class="btn btn-default" onclick="return confirm('Bạn thực sự muốn hủy khóa học này?');"><i class="fa fa-times"></i></a>
										</div>
									</div>
								</td>
							</tr>
							<?php }
							// Tính giá tiền và số tiền được giảm
								$discount = $price*$coupon_discount['percent_discount']/100;
								$price = $price - $discount;
							?>
						</table>
					</div>
				</div>
				<div class="phai col-md-4">
					<h3>Hóa đơn của bạn</h3>
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
							<?php if($discount>0){ ?>
							<tr>
								<th>Giảm giá: </th>
								<th>-<?php echo number_format($discount); ?>đ</th>
							</tr>
							<?php } ?>
							<tr>
								<th>Số tiền còn lại: </th>
								<th><?php echo number_format($_SESSION['tien_thua'] = $_SESSION['coin_user'] - $price); ?>đ</th>
							</tr>
						</thead>
					</table>
					<?php 
						if ($price >= 0 && $count != 0) {
						
					 ?>
					 <tr>
					 	<td colspan="2">
					 		<?php if (isset($_SESSION['coupon_noti'])) {
					 			echo '<div class="alert alert-success" role="alert">'.$_SESSION['coupon_noti'].'</div>';
					 		} ?>
					 		<div class="row">
					 			<form action="" method="GET">
					 				<div class="col-md-8">
					 					<input type="text" name="coupon" class="form-control" value="<?php echo $coupon_discount['code_cp']; ?>" placeholder="Bạn có mã giảm giá?">
					 				</div>
					 				<div class="col-md-4">
					 					<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
					 					<a href="cart/remove_coupon"><button type="button" class="btn btn-default"><i class="fa fa-times" style="color: red;"></i></button></a>
					 				</div>
					 			</form>
					 		</div>
					 	</td>
					 </tr><br>
					<form action="<?php echo base_url('cart') ?>" method="POST">
						<?php 
						if ($coupon_discount['code_cp']!='') {
							$code_cp = $coupon_discount['code_cp'];
							echo '<input type="hidden" name="code_cp" class="form-control" value="'.$code_cp.'">';
						}
						?>
						<button type="submit" name="action" value="buy" class="btn btn-success">Mua Khoá Học</button>
						<br><br>
						<button type="submit" name="action" value="cancel" class="btn btn-danger">Huỷ Hoá Đơn</button>
					</form>
					<?php } ?>
					<input type="text" hidden="">
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