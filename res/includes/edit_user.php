<?php 
	foreach ($result as $key => $value) {
		$per = $value['permission_user'];
		$select_0 = '';$select_1 = '';$select_2 = '';$select_3 = '';
		if ($per == 0) {
			$select_0 = 'selected';
		}
		if ($per == 1) {
			$select_1 = 'selected';
		}
		if ($per == 2) {
			$select_2 = 'selected';
		}
		if ($per == 3) {
			$select_3 = 'selected';
		}
		$select = '
		<select name="permission_user" class="form-control">
			<option value="0" '.$select_0.'>Non-Active</option>
			<option value="1" '.$select_1.'>Member</option>
			<option value="2" '.$select_2.'>Teacher</option>
			<option value="3" '.$select_3.'>Admin</option>
		</select>';
		$sex = $value['sex_user'];
		$check1 = ''; $check0 = '';
		if ($sex == 1) {
			$check1 = 'checked';
		}
		else{
			$check0 = 'checked';
		}
		$radio = '
		<input type="radio" name="sex_user" value="1" '.$check1.'>Nam
		<input type="radio" name="sex_user" value="0" '.$check0.'>Nữ
		';

 ?>
<form action="" method="POST" role="form">
	<legend>Chỉnh sửa thông tin thành viên</legend>
	<div class="form-group">
		<label for="">Họ và Tên: </label>
		<input type="text" class="form-control" id="" name="name_user"  value="<?php echo $value['name_user']; ?>">
	</div>
	<div class="form-group">
		<label for="">Giới tính: </label>
		<?php echo $radio; ?>
	</div>
	<div class="form-group">
		<label for="">Thư điện tử: </label>
		<input type="email" class="form-control" id="" name="email_user"  value="<?php echo $value['email_user']; ?>">
	</div>
	<div class="form-group">
		<label for="">Công việc: </label>
		<input type="text" class="form-control" id="" name="job_user"  value="<?php echo $value['job_user']; ?>">
	</div>
	<div class="form-group">
		<label for="">Giới thiệu: </label>
		<textarea name="about_user" class="form-control" rows="3"><?php echo $value['about_user']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="">Tài khoản: </label>
		<input type="number" class="form-control" name="coin_user" value="<?php echo $value['coin_user']; ?>">
	</div>
	<div class="form-group">
		<label for="">Quyền: </label>
		<?php echo $select; ?>
	</div>
	<div class="form-group">
		<label for="">Ảnh đại diện: </label>
		<input type="file" class="form-control" name="avatar_user" accept="image/*">
	</div>
	<button type="submit" name="update_user" value="submit" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
</form>
<?php } ?>