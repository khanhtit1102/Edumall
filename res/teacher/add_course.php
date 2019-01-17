<?php if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
} ?>
<form action="" method="POST" role="form" enctype="multipart/form-data">
	<legend>Thêm mới khóa học</legend>
	<div class="form-group">
		<label for="">Tên Khoá học</label>
		<input type="text" class="form-control" name="ten_cs" placeholder="Tên Khoá học">
	</div>
	<div class="form-group">
		<label for="">Thông tin thêm</label>
		<input type="text" class="form-control" name="info_cs" placeholder="Thông tin thêm">
	</div>
	<div class="form-group">
		<label for="">Mô tả</label>
		<textarea name="mota_cs" id="mota_cs" class="form-control" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="">Giáo Trình</label>
		<textarea name="giaotrinh_cs" id="giaotrinh_cs" class="form-control" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label for="">Giá</label>
		<input type="number" class="form-control" name="gia_cs" placeholder="Giá">
	</div>
	<div class="form-group">
		<label for="">Thể loại</label>
		<select name="theloai_cs" class="form-control" required="required">
			<option value="cntt">Công nghệ thông tin</option>
			<option value="tk">Thiết kế</option>
			<option value="ndc">Nuôi dạy con</option>
			<option value="ptbt">Phát triển bản thân</option>
			<option value="kdkn">Kinh doanh & khởi nghiệp</option>
			<option value="nn">Ngoại ngữ</option>
			<option value="mkt">Marketing</option>
			<option value="thvp">Tin học văn phòng</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Số bài</label>
		<input type="number" class="form-control" name="sobh_cs" placeholder="Số bài">
	</div>
	<div class="form-group">
		<label for="">Thời lượng</label>
		<input type="text" class="form-control" name="time_cs" placeholder="Thời lượng">
	</div>
	<div class="form-group">
		<label for="">Link khóa học</label>
		<input type="text" class="form-control" name="playlist_key" placeholder="Link khóa học">
	</div>
	<div class="form-group">
		<label for="">Ảnh</label>
		<input type="file" class="form-control" name="thumb_cs" accept=".jpg, .png, .jpeg">
	</div>
	<button type="submit" name="add_course" value="submit" class="btn btn-primary" name="btn-submit">Thêm mới khóa học</button>
</form>
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'mota_cs' );
	CKEDITOR.replace( 'giaotrinh_cs' );
</script>