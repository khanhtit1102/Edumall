<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="../res/imgs/icon.png">
	<title>Đăng Ký Tài Khoản - Edumall</title>
	<link rel="stylesheet" href="../res/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="../res/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../res/css/webstyle.css">
	<link rel="stylesheet" href="../res/css/register.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="all col-md-offset-3 col-md-6">
					<div class="with-email">
						<form action="register" method="POST" role="form">
							<legend>Bạn chưa có tài khoản?<br>Đăng ký đi còn gì nữa!</legend>
							<div class="form-group" align="center">
								<label for="">Đăng Ký Bằng <b>Email</b></label>
								<ul class="error" style="color: red;"><?php echo validation_errors('- '); if (isset($_SESSION['error'])) {
									echo '- '.$_SESSION['error'];
								} ?></ul>
								<input type="text" class="form-control" name="username" id="username" placeholder="Họ và tên" autocomplete="off">
								<input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
								<input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu">
								<select name="type_account" class="form-control" id="type_account" onchange="change_option()">
									<option value="0" selected="">Học viên</option>
									<option value="2">Giảng viên</option>
								</select>
								<input type="text" class="form-control hidden" name="job" id="job" placeholder="Công việc hiện tại" autocomplete="off">
							</div>
							<div id="btnsubmit">
								<button type="submit" class="btn btn-danger" name="register" value="register">Đăng Ký</button>
							</div>
						</form>
					</div><br>
					<div class="with-social" align="center">
						<label for="">Đăng ký với tài khoản <b>Mạng Xã Hội</b></label><br>
						<a href="https://fb.com" target="_blank"><button type="button" class="btn btn-info"><i class="fa fa-facebook"></i>Facebook</button></a>
						<a href="https://google.com" target="_blank"><button type="button" class="btn btn-warning"><i class="fa fa-google-plus"></i>Google+</button></a>
					</div><br>
					<div class="login" align="center">
						<p>Đã có tài khoản? <a href="login"><b>Đăng Nhập</b></a></p>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<!-- Script -->
	<script>
		function change_option() {
			var x = document.getElementById("type_account").value;
			var job = document.getElementById('job');
			if (x == '2') {
				job.classList.remove("hidden");
			}
			else {
				job.classList.add("hidden");
			}
		}
	</script>
	<script src="../res/js/test.js"></script>
	<script src="../res/bs/js/jquery.js"></script>
	<script src="../res/bs/js/bootstrap.min.js"></script>
</body>
</html>