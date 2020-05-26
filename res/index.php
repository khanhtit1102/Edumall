<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" type="image/x-icon" href="res/imgs/icon.png">
	<title>Edumall - Học online 24/7</title>
	<link rel="stylesheet" href="res/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="res/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="res/css/webstyle.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<section class="header-page">
			<div class="container-fluid">
				<div class="row container">
					<div class="col-md-4">
						<section class="header-hook">
							<p>Hãy cùng bắt đầu</p>
							<p>khám phá bằng việc giúp chúng tôi</p>
							<h1>HIỂU VỀ BẠN HƠN</h1>
							<hr>
							<p>Bạn quan tâm tới lĩnh vực nào?</p>
						</section>
					</div>
					<div class="col-md-8">
						<section class="header-category">
							<?php 
							foreach ($allcate as $row) {
							?>
							<div class="col-md-3">
								<a href="<?php echo base_url('courses/category/').$row['id_cate'] ?>">
									<div class="category mau<?php echo $row['stt_cate']; ?>">
										<br>
										<i class="<?php echo $row['icon_cate']; ?> fa-3x"></i>
										<p><?php echo $row['name_cate']; ?></p>
									</div>
								</a>
							</div>
							<?php } ?>
						</section>
					</div>
				</div>
			</div>
		</section>
		<section class="topic">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-bell"></i>Mới nhất</a></li>
				<li><a data-toggle="tab" href="#menu1"><i class="glyphicon glyphicon-star"></i>Giá trị nhất</a></li>
				<li><a data-toggle="tab" href="#menu2"><i class="glyphicon glyphicon-record"></i>Có thể bạn sẽ thích</a></li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<div class="slide">
						<ul id="ul1">
							<?php 
							foreach ($slide_new as $row) {
							?>
							<li>
								<a href="<?php echo base_url('display?id=').$row['id_cs']; ?>" class="thumbnail">
									<img src="res/uploads/<?php echo $row['thumb_cs']; ?>" alt="" style="height: 75%;">
									<h5><?php echo $row['ten_cs']; ?></h5>
									<label class="author"><?php echo $row['name_user']; ?></label>
									<label class="price"><?php echo $row['gia_cs']; ?></label>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<div class="slide">
						<ul id="ul2">
							<?php 
							foreach ($slide_price as $row) {
							?>
							<li>
								<a href="<?php echo base_url('display?id=').$row['id_cs']; ?>" class="thumbnail">
									<img src="res/uploads/<?php echo $row['thumb_cs']; ?>" alt="" style="height: 75%;">
									<h5><?php echo $row['ten_cs']; ?></h5>
									<label class="author"><?php echo $row['name_user']; ?></label>
									<label class="price"><?php echo $row['gia_cs']; ?></label>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div id="menu2" class="tab-pane fade">
					<div class="slide">
						<ul id="ul3">
							<?php 
							foreach ($slide_random as $row) {
							?>
							<li>
								<a href="<?php echo base_url('display?id=').$row['id_cs']; ?>" class="thumbnail">
									<img src="res/uploads/<?php echo $row['thumb_cs']; ?>" alt="" style="height: 75%;">
									<h5><?php echo $row['ten_cs']; ?></h5>
									<label class="author"><?php echo $row['name_user']; ?></label>
									<label class="price"><?php echo $row['gia_cs']; ?></label>
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="button-slide">
					<button type="button" class="btn btn-default left" onclick="pre()"><i class="fa fa-arrow-circle-left fa-3x"></i></button>
					<button type="button" class="btn btn-default right" onclick="next()"><i class="fa fa-arrow-circle-right fa-3x"></i></button>
				</div>
			</div>
			<br><br>
		</section>
		<section class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="slide">
							<ul id="ul-banner">
								<li>
									<a href="<?php echo base_url('course'); ?>"><img src="res/imgs/banner-big1.jpg" alt=""></a>
								</li>
								<li>
									<a href="<?php echo base_url('course'); ?>"><img src="res/imgs/banner-big2.jpg" alt=""></a>
								</li>
								<li>
									<a href="<?php echo base_url('course'); ?>"><img src="res/imgs/banner-big3.jpg" alt=""></a>
								</li>
							</ul>
						</div>
						<div class="button-slide">
							<i class="fa fa-dot-circle-o" onclick="banner1()"></i>
							<i class="fa fa-dot-circle-o" onclick="banner2()"></i>
							<i class="fa fa-dot-circle-o" onclick="banner3()"></i>
						</div>
					</div>
					<div class="col-md-4 phai">
						<a href="<?php echo base_url('course/category/ptbt'); ?>"><img src="res/imgs/banner-small1.png" alt=""></a>
						<a href="<?php echo base_url('course/category/nn'); ?>"><img src="res/imgs/banner-small2.png" alt=""></a>
					</div>
				</div>
				<br><br>
				<div class="row TOP">
					<div class="col-md-4">
						<a href="<?php echo base_url('courses/category/thvp'); ?>">
							<div class="img-banner">
								<img src="res/imgs/banner-top1.png" alt="">
							</div>
							<div class="text-banner">
								<h1 style="color: #f25957">TOP</h1>
								<h3>Khoá học tin học văn phòng</h3>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url('courses/category/ptbt'); ?>">
							<div class="img-banner">
								<img src="res/imgs/banner-top2.png" alt="">
							</div>
							<div class="text-banner">
								<h1 style="color: #ffb233">TOP</h1>
								<h3>Khóa học phát triển bản thân</h3>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url('courses/category/mkt'); ?>">
							<div class="img-banner">
								<img src="res/imgs/banner-top3.png" alt="">
							</div>
							<div class="text-banner">
								<h1 style="color: #4fa7eb">TOP</h1>
								<h3>Khóa học Marketing</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<br><br>
		<section class="register-index">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="register-title">
							<h1>Đăng ký tài khoản MIỄN PHÍ ngay bây giờ</h1>
							<h3>để khám phá đầy đủ tính năng của Edumall</h3><br><br><br>
						</div>
						<div class="trai col-md-7"><br>
							<form action="auth/register" method="POST" role="form">
								<legend>ĐĂNG KÝ TÀI KHOẢN</legend>
								<h4>Đăng ký bằng mạng xã hội</h4>
								<br>
								<div class="loginsocial">
									<a href="" class="btn btn-primary" target="#blank"><i class="fa fa-facebook"></i>Facebook</a>
									<a href="" class="btn btn-danger" target="#blank"><i class="fa fa-google-plus"></i>Google+</a>
								</div>
								<br>
								<h4>Hoặc điền thông tin</h4>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="username" id="" placeholder="Họ và tên">
								</div><br>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input type="text" class="form-control" name="email" id="email" placeholder="Email">
								</div><br>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu">
								</div><br>
								<button type="submit" class="btn btn-default submit" name="register" value="register">ĐĂNG KÝ</button>
							</form>
						</div>
						<div class="phai col-md-5">
							<img src="res/imgs/icon.png" alt="LOGO Edumall">
							<div class="login">
								<h3>Bạn đã có tài khoản?</h3>
								<button type="button" class="btn btn-warning" style="width: 180px; height: 50px;"><span class="btn-login-index">ĐĂNG NHẬP</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</section>
		<br><br><br><br>
		<section class="all-course">
			<div class="container">
				<div class="row ">
					<div class="col-md-12" align="center">
						<h1>Chưa tìm ra khoá học bạn muốn?</h1>
						<h2>Đừng lo, còn hàng trăm khoá học tại Edumall.</h2><br><br>
						<a href="<?php echo base_url('courses'); ?>"><button type="button" class="btn btn-danger">TOÀN BỘ KHOÁ HỌC</button></a>
					</div>
				</div>
			</div>
		</section>
		<br><br><br><br>
		<section class="tuyen-dung">
			<div class="">
				<div class="trai col-md-4 col-md-offset-2">
					
				</div>
				<div class="phai col-md-6">
					<h2>Trở thành</h2>
					<h1>GIẢNG VIÊN</h1>
					<h2>Edumall</h2>
					<a href="<?php echo base_url('auth'); ?>" target="_blank"><button type="button" class="btn btn-primary">THAM GIA NGAY</button></a>
				</div>
			</div>
		</section>
	</main>
	<footer>
		<?php include "res/includes/footer.php" ?>
	</footer>
	<script src="res/bs/js/jquery.js" type="text/javascript"></script>
	<script src="res/js/myjs.js" type="text/javascript"></script>
	<script src="res/bs/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>