<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/'); ?>imgs/icon.png">
	<title>Trang Hiển Thị Thông Tin Khoá Học - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/display.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main><br><br>
		<div class="container">
			<div class="row">
				<?php 
					foreach ($result as $key => $value) {
				 ?>
				<form action="" method="POST" role="form">
					<h1><?php echo $value["ten_cs"]; ?></h1>
					<p><?php echo $value["info_cs"]; ?></p>
					<div class="trai col-md-8">
						<div class="thumbnail">
							<img src="res/uploads/<?php echo $value['thumb_cs']; ?>" alt="">
						</div>
						<div class="author">
							<div class="avatar-author">
								<img src="res/imgs/men.png" alt="">
							</div>
							<div class="info-author">
								<p>Giảng Viên</p>
								<h3><?php echo $value["name_user"]; ?></h3>
								<a href="" target="_blank" class="btn btn-success">Contact</a><br><br>
							</div>
						</div><br>
						<div class="content">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#mota">Mô tả khoá học</a></li>
								<li><a data-toggle="tab" href="#giaotrinh">Giáo trình</a></li>
								<li><a data-toggle="tab" href="#danhgia">Đánh giá</a></li>
								<li><a data-toggle="tab" href="#binhluan">Bình luận</a></li>
							</ul>

							<div class="tab-content">
								<div id="mota" class="tab-pane fade in active">
									<?php echo $value["mota_cs"]; ?>
								</div>
								<div id="giaotrinh" class="tab-pane fade">
									<?php echo $value["giaotrinh_cs"] ?>
								</div>
								<div id="danhgia" class="tab-pane fade">
									<h3>Đánh giá</h3>
									<p>Đang phát triển tính năng này!</p>
								</div>
								<div id="binhluan" class="tab-pane fade">
									<h3>Bình luận</h3>
									<p>Đang phát triển tính năng này!</p>
								</div>
							</div>
						</div>
					</div>
					<div class="phai col-md-4"><br>
						<h3>Giá: <?php echo number_format($value["gia_cs"]); ?>đ</h3><br>
						<table class="table table-hover">
							<thead>
								<tr>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Thể loại: </td>
									<td>
										<?php 
										switch ($value['id_cate']) {
											case 'cntt':
											echo "Công nghệ thông tin";
											break;
											case 'tk':
											echo "Thiết kế";
											break;
											case 'ndc':
											echo "Nuôi dạy con";
											break;
											case 'ptbt':
											echo "Phát triển bản thân";
											break;
											case 'kdkn':
											echo "Kinh doanh & khởi nghiệp";
											break;
											case 'nn':
											echo "Ngoại ngữ";
											break;
											case 'mkt':
											echo "Marketing";
											break;
											case 'thvp':
											echo "Tin học văn phòng";
											break;

											default:
											echo "Khác";
											break;
										}
										?>
									</td>
								</tr>
								<tr>
									<td>Cấp độ: </td>
									<td>All</td>
								</tr>
								<tr>
									<td>Số bài học: </td>
									<td><?php echo $value["sobh_cs"]; ?></td>
								</tr>
								<tr>
									<td>Thời lượng videos: </td>
									<td><?php echo $value["time_cs"]; ?></td>
								</tr>
							</tbody>
						</table>
						<?php
							if ($hasown == 1) {
								echo '<a href="'.base_url('learn/course/').$value["id_cs"].'"><button type="button" class="btn btn-danger">Học Ngay</button></a>';
							}
							else{
								echo '<button type="submit" name="add_to" value="cart" class="btn btn-danger">Thêm vào Giỏ Hàng</button>';
							}
						 ?>
						<?php echo $status; ?>
					</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<!-- Script -->
	<script src="<?php echo base_url('res/'); ?>js/webjs.js"></script>
	<script src="<?php echo base_url('res/'); ?>bs/js/jquery.js"></script>
	<script src="<?php echo base_url('res/'); ?>bs/js/bootstrap.min.js"></script>
</body>
</html>
