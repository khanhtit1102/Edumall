	<legend>Chỉnh sửa bài học của khóa học</legend>
	<?php if (isset($_SESSION['error'])) {
		echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
	} ?>
	<div class="row" align="center">
		<div class="col-md-1"><b>STT</b></div>
		<div class="col-md-4"><b>Tên bài học</b></div>
		<div class="col-md-2"><b>Bài học hiện tại</b></div>
		<div class="col-md-3"><b>Video bài học</b></div>
		<div class="col-md-1"><b></b></div>
	</div>
  	<?php $i=0; foreach ($result as $key => $value) { $i++; ?>
<form action="" method="POST" role="form" enctype="multipart/form-data">
	<div class="row" align="center">
		<div class="col-md-1">
			<input type="text" class="form-control" name="ep_number" readonly="" value="<?php echo $value['ep_number'] ?>">
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="ep_title" value="<?php echo $value['ep_title'] ?>" required="">
		</div>
		<div class="col-md-2">
			<?php if ($value['video_name'] != NULL) { ?>
			<a title="Click để xem trước" target="_blank" href="<?php echo base_url('res/uploads/').$value['video_name']; ?>">
				<button type="button" class="btn btn-info">Xem trước tại đây</button>
			</a>
			<?php } else{ ?>
				<button type="button" class="btn btn-info">Chưa có bản xem trước</button>
			<?php } ?>
		</div>
		<div class="col-md-3">
			<input type="file" accept="video/*" class="form-control" name="video_name">
		</div>
		<div class="col-md-1">
			<button type="submit" name="update_episodes_course" value="submit" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
		</div>
	</div>
	<br>
</form>
<?php } ?>
