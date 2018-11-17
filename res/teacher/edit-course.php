<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/') ?>imgs/icon.png">
	<title>Trang chỉnh sửa thông tin Khoá học - Edumall - Admin</title>
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/admin-edituser.css">
	<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>
<body>
	<?php
		function make_loai_dropdown($loai){
			$select_1 = '';$select_2 = '';$select_3 = '';$select_4 = '';$select_5 = '';$select_6 = '';$select_7 = '';$select_8 = '';
			if($loai == 'cntt'){
				$select_1 = 'selected';
			}
			if($loai == 'tk'){
				$select_2 = 'selected';
			}
			if($loai == 'ndc'){
				$select_3 = 'selected';
			}
			if($loai == 'ptbt'){
				$select_4 = 'selected';
			}
			if($loai == 'kdkn'){
				$select_5 = 'selected';
			}
			if($loai == 'nn'){
				$select_6 = 'selected';
			}
			if($loai == 'mkt'){
				$select_7 = 'selected';
			}
			if($loai == 'thvp'){
				$select_8 = 'selected';
			}
			
			$select = '<select name="theloai_cs" id="" class="form-control" required="required">
				<option value="cntt" '.$select_1.'>Công nghệ thông tin</option>
				<option value="tk" '.$select_2.'>Thiết kế</option>
				<option value="ndc" '.$select_3.'>Nuôi dạy con</option>
				<option value="ptbt" '.$select_4.'>Phát triển bản thân</option>
				<option value="kdkn" '.$select_5.'>Kinh doanh & khởi nghiệp</option>
				<option value="nn" '.$select_6.'>Ngoại ngữ</option>
				<option value="mkt" '.$select_7.'>Marketing</option>
				<option value="thvp" '.$select_8.'>Tin học văn phòng</option>
			</select>';
			return $select;
		}
	 ?>
	<header>
		<?php include "res/includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<h2>Trang Chỉnh Sửa Thông Tin Khoá Học Của Giáo Viên</h2><hr>
				<div class="col-md-10">
					<?php 
						foreach ($result as $key => $value) {
					 ?>
					<form action="" method="POST" role="form">
						<legend>Yêu cầu nhập đầy đủ thông tin cho sản phầm</legend>
						<div class="form-group">
							<label for="">Tên Khoá học</label>
							<input type="text" class="form-control" name="ten_cs" id="" placeholder="Tên Khoá học" value="<?php echo $value["ten_cs"]; ?>">
						</div>
						<div class="form-group">
							<label for="">Thông tin thêm</label>
							<input type="text" class="form-control" name="info_cs" id="" placeholder="Thông tin thêm" value="<?php echo $value["info_cs"]; ?>">
						</div>
						<div class="form-group">
							<label for="">Mô tả</label>
							<textarea name="mota_cs" id="mota_cs" class="form-control" rows="10"><?php echo $value["mota_cs"]; ?></textarea>
						</div>
						<div class="form-group">
							<label for="">Giáo Trình</label>
							<textarea name="giaotrinh_cs" id="giaotrinh_cs" class="form-control" rows="10"><?php echo $value["giaotrinh_cs"]; ?></textarea>
						</div>
						<div class="form-group">
							<label for="">Giá</label>
							<input type="number" class="form-control" name="gia_cs" id="" placeholder="Giá" value="<?php echo $value["gia_cs"]; ?>">
						</div>
						<div class="form-group">
							<label for="">Thể loại</label>
							<?php echo make_loai_dropdown($value["id_cate"]); ?>
						</div>
						<div class="form-group">
							<label for="">Số bài</label>
							<input type="number" class="form-control" name="sobh_cs" id="" placeholder="Số bài" value="<?php echo $value["sobh_cs"]; ?>">
						</div>
						<div class="form-group">
							<label for="">Thời lượng</label>
							<input type="text" class="form-control" name="time_cs" id="" placeholder="Thời lượng" value="<?php echo $value["time_cs"]; ?>">
						</div>
						<div class="form-group">
							<label for="">Link khóa học</label>
							<input type="text" class="form-control" name="playlist" id="" placeholder="Link khóa học" value="<?php echo $value["playlist_key"]; ?>">
						</div>
						<!-- <div class="form-group">
							<label for="">Ảnh</label>
							<input type="file" name="thumb_cs">
						</div> -->
						<button type="submit" name="update" value="course" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
					</form>
					<?php } ?>
				</div>
				<div class="col-md-2">
					<?php include "res/includes/more-tool-teacher.php" ?>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include "res/includes/footer.php" ?>
	</footer>
	<script>
		CKEDITOR.replace( 'mota_cs' );
		CKEDITOR.replace( 'giaotrinh_cs' );
	</script>
	<script src="<?php echo base_url('res/') ?>js/webjs.js"></script>
	<script src="<?php echo base_url('res/') ?>bs/js/jquery.js"></script>
	<script src="<?php echo base_url('res/') ?>bs/js/bootstrap.min.js"></script>
</body>
</html>