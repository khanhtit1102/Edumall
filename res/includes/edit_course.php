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
		
		$select = '<select name="theloai_cs" class="form-control" required="required">
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

<?php 
	foreach ($result as $key => $value) {
 ?>
<ul class="error" style="color: red;">
	<?php 
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
	}
	 ?>
</ul>
<form action="" method="POST" role="form">
	<legend>Chỉnh sửa thông tin cho khóa học</legend>
	<div class="form-group">
		<label for="">Tên Khoá học</label>
		<input type="text" class="form-control" name="ten_cs" placeholder="Tên Khoá học" value="<?php echo $value["ten_cs"]; ?>">
	</div>
	<div class="form-group">
		<label for="">Thông tin thêm</label>
		<input type="text" class="form-control" name="info_cs" placeholder="Thông tin thêm" value="<?php echo $value["info_cs"]; ?>">
	</div>
	<div class="form-group">
		<label for="">Giảng viên</label>
		<input type="text" class="form-control" name="name_user" placeholder="Giảng viên" value="<?php echo $value["name_user"]; ?>" disabled="">
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
		<input type="number" class="form-control" name="gia_cs" placeholder="Giá" value="<?php echo $value["gia_cs"]; ?>">
	</div>
	<div class="form-group">
		<label for="">Thể loại</label>
		<?php echo make_loai_dropdown($value["id_cate"]); ?>
	</div>
	<div class="form-group">
		<label for="">Số bài</label>
		<input type="number" class="form-control" name="sobh_cs" placeholder="Số bài" value="<?php echo $value["sobh_cs"]; ?>">
	</div>
	<div class="form-group">
		<label for="">Thời lượng</label>
		<input type="text" class="form-control" name="time_cs" placeholder="Thời lượng" value="<?php echo $value["time_cs"]; ?>">
	</div>
	<!-- <div class="form-group">
		<label for="">Ảnh</label>
		<input type="file" name="thumb_cs">
	</div> -->
	<button type="submit" name="update_course" value="submit" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
</form>
<?php } ?>
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'mota_cs' );
	CKEDITOR.replace( 'giaotrinh_cs' );
</script>