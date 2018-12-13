<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>res/imgs/icon.png">
	<title>Trang Hiển Thị Các Khoá Học - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/courses.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row"><br><br>
				<h1>Khoá học của chúng tôi</h1>
				<hr>
				<h3><?php if ($keyword != '') { echo 'Bạn đang tìm kiếm với từ khóa - '.$keyword.' -'; }?></h3>
				<div class="form locsp">
					<form action="<?php echo base_url('courses'); ?>" method="POST" role="form">
						<div class="form-group">
							<label for="">Lọc Sản Phẩm:</label>
							<div class="form-group">
								<div class="col-sm-2">
									<select name="name" class="form-control">
										<option value="" selected="">Theo tên</option>
										<option value="ten_cs asc">A => Z</option>
										<option value="ten_cs desc">Z => A</option>
									</select>
								</div>
								<div class="col-sm-2">
									<select name="price" class="form-control">
										<option value="" selected="">Theo giá</option>
										<option value="gia_cs asc">Thấp => Cao</option>
										<option value="gia_cs desc">Cao => Thấp</option>
									</select>
								</div>
								<div class="col-md-1">
									<button type="submit" class="btn btn-default" name="filter" value="filter" title="Vui lòng chỉ chọn một loại lọc">Lọc<i class="glyphicon glyphicon-search"></i></button>
								</div>
								<div class="col-md-1">
									<a href="<?php echo base_url('courses/cancel_search'); ?>"><button type="button" class="btn btn-default">Huỷ Lọc<i class="glyphicon glyphicon-remove-sign"></i></button></a>
								</div>
								<div class="col-md-6">
									<span class="badge pull-right">Chúng tôi có <?php echo $countrow; ?> Khoá Học</span>
								</div>
							</div>
						</div>
					</form><br><br><br>
				</div>
				<div class="course col-md-9">
					<table>
							<tr>
								<?php 
								$i = 0;
								foreach($query_poster->result() as $row){ 
									if($i == 3){
										echo "</tr>";
										$i = 0;
									}
								?>
								<td class="col-md-4">
									<div class="thumbnail">
										<a href="<?php echo base_url('display?id=').$row->id_cs; ?>">
											<img src="<?php echo base_url(); ?>res/uploads/<?php echo $row->thumb_cs; ?>" alt="">
										</a>
										<div class="caption">
											<a href="<?php echo base_url('display?id=').$row->id_cs; ?>"><h3><?php echo $row->ten_cs; ?></h3></a>
											<p class="author">
												<?php echo $row->name_user; ?>
											</p>
											<p>
												<span class="gia"><?php echo number_format($row->gia_cs); ?>đ</span>
											</p>
										</div>
									</div>
								</td>
								<?php $i++; } ?>
							</tr>
					</table>
					<hr>
					<div class="numpage" align="center">
						<ul class="pagination" style="box-shadow: -5px 5px 13px #27556d;">
							<?php echo $paginator; ?>
						</ul> 
					</div>
				</div>
				<div class="theloai col-md-3">
					<h4>Theo Thể Loại</h4>
					
					<ul class="nav nav-pills nav-stacked">
						<?php 
						foreach ($category as $key => $value) {
						?>
						<li>
							<a href="<?php echo base_url('courses/category/').$value['key']; ?>">
								<span class="badge pull-right"><?php echo $value['count']; ?></span>
								<?php echo $value['name']; ?>
							</a>
						</li>
						<?php } ?>
					</ul><br>
					<h4>Theo Chính Sách</h4>
					<ul class="nav nav-pills nav-stacked">
						<li>
							<a href="courses.php?policy=mien-phi">
								<span class="badge pull-right"><?php echo $fee['free']; ?></span>
								Miễn Phí
							</a>
						</li>
						<li>
							<a href="courses.php?policy=tra-phi">
								<span class="badge pull-right"><?php echo $fee['fee']; ?></span>
								Trả Phí
							</a>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<footer>
			<?php include "includes/footer.php" ?>

		</footer>
		<!-- Script -->
		<script src="<?php echo base_url(); ?>res/js/webjs.js"></script>
		<script src="<?php echo base_url(); ?>res/bs/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>res/bs/js/bootstrap.min.js"></script>
	</body>
	</html>