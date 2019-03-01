<ul class="error" style="color: red;">
	<?php 
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
	}
	 ?>
</ul>
<form action="" method="POST" role="form">
	<legend>Chỉnh sửa bài học của khóa học</legend>
	<div class="row" align="center">
		<div class="col-md-2"><b>Thứ tự bài học</b></div>
		<div class="col-md-6"><b>Tên bài học</b></div>
		<div class="col-md-4"><b>Mã nhúng</b></div>
	</div>
	<?php $i=0; foreach ($result as $key => $value) { $i++; ?>
	<div class="row" align="center">
		<div class="col-md-2">
			<input type="text" class="form-control" name="ep_number[]" readonly="" value="<?php echo $value['ep_number'] ?>">
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control" name="ep_title[]" value="<?php echo $value['ep_title'] ?>">
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="embed_code[]" value="<?php echo $value['embed_code'] ?>">
		</div>
	</div>
	<br>
	<?php } ?>
	<?php 
	if (($sobh_cs-$i)>0) {
		$thieu = $sobh_cs-$i;
		for ($j=0; $j < $thieu; $j++) { 
	?>
	<div class="row" align="center">
		<div class="col-md-2">
			<input type="text" class="form-control" name="ep_number[]" readonly="" value="<?php echo $i+$j+1; ?>">
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control" name="ep_title[]" >
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="embed_code[]" >
		</div>
	</div>
	<br>
	<?php }} ?>
	<button type="submit" name="update_episodes_course" value="submit" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
</form>
