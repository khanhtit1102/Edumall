<?php if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
} ?>
<form action="" method="POST" role="form">
	<legend>Gửi Email dành cho Quản trị viên</legend>
	<div class="form-group">
		<label for="">Email người nhận: </label>
		<input type="email" class="form-control" name="email" required="required" value="<?php echo $data['email'] ?>">
	</div>
	<div class="form-group">
		<label for="">Tiêu đề: </label>
		<input type="text" class="form-control" name="subject" required="required" value="<?php echo $data['subject'] ?>">
	</div>
	<div class="form-group">
		<label for="">Nội dung: </label>
		<textarea name="message" id="message" class="form-control" rows="3" required="required"><?php echo $data['message'] ?></textarea>
	</div>
	<button type="submit" name="send_mail" value="submit" class="btn btn-primary" name="btn-submit">Xác nhận gửi</button>
</form>
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'message' );
</script>