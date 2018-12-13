<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/'); ?>imgs/icon.png">
	<title>Học trực tuyến - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/learn.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<?php foreach ($course as $key => $value) {
				?>
				<h2><?php echo $value['ten_cs'] ?></h2>
					<p><?php echo $value['info_cs'] ?></p>
				<div class="col-md-8">
					<span class="thumbnail">
						<iframe width="740" height="398" src="https://www.youtube.com/embed/videoseries?rel=0&autoplay=1&list=<?php echo $value['playlist_key'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</span>
					<div class="info-author">
						<p>Giảng Viên: <b><?php echo $value['name_user'] ?></b></p>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-4">
					<div class="comment">
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title">Bình luận</h3>
								</div>
								<div class="panel-body">
									<div class="overflow">
									<?php foreach ($comment as $key => $value) {
									?>
										<div class="hiencmt">
											<p class="infocmt">[<?php echo $value['ten_cmt'] ?> | <?php echo $value['email_cmt'] ?>]</p>
											<p class="ndcmt">Nội dung: <?php echo $value['nd_cmt'] ?></p>
										</div>
									<?php } ?>
									</div>
									<br><br>
									<form action="" method="POST" role="form">
										<input type="hidden" name="txtname" value="<?php echo $_SESSION['name_user'] ?>">
										<input type="hidden" name="txtemail" value="<?php echo $_SESSION['email_user'] ?>">
										<textarea name="txtnd" class="form-control" placeholder="Nội dung (Không quá 200 ký tự)" rows="3" maxlength="200"></textarea>
										<br>
										<button type="submit" class="btn btn-default" name="comment" value="submit">Bình luận</button>
									</form>
								</div>
							</div>
						</div>
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