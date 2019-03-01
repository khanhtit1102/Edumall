
<form action="" method="POST" role="form">
	<legend>Thêm mới mã giảm giá</legend>
	<?php if (isset($_SESSION['error'])) {
		echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>';
	} ?>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="">Mã giảm giá: </label>
				<input type="text" class="form-control" id="" name="code_cp">
			</div>
			<div class="form-group">
				<label for="">Ngày hết hạn: </label>
				<input type="date" class="form-control" id="" name="expiration_date" min="<?php echo date('Y-m-d'); ?>">
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label for="">Chiết khấu: </label>
				<input type="number" class="form-control" id="" name="percent_discount">
			</div>
		</div>
	</div>
	<button type="submit" name="add_coupon" value="submit" class="btn btn-primary" name="btn-submit">Xác nhận</button>
</form>