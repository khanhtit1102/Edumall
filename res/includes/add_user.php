<form action="" method="POST" role="form">
	<legend>Thêm mới thành viên</legend>
	<div class="form-group">
		<label for="">Họ và Tên: </label>
		<input type="text" class="form-control" id="" name="name_user">
	</div>
	<div class="form-group">
		<label for="">Giới tính: </label>
		<input type="radio" name="sex_user" value="1" checked="">Nam
		<input type="radio" name="sex_user" value="0" >Nữ
	</div>
	<div class="form-group">
		<label for="">Thư điện tử: </label>
		<input type="email" class="form-control" id="" name="email_user">
	</div>
	<div class="form-group">
		<label for="">Mật khẩu: </label>
		<input type="password" class="form-control" id="" name="pass_user">
	</div>
	<div class="form-group">
		<label for="">Công việc: </label>
		<input type="text" class="form-control" id="" name="job_user">
	</div>
	<div class="form-group">
		<label for="">Giới thiệu: </label>
		<textarea name="about_user" class="form-control" rows="3"></textarea>
	</div>
	<div class="form-group">
		<label for="">Tài khoản: </label>
		<input type="number" class="form-control" name="coin_user">
	</div>
	<div class="form-group">
		<label for="">Quyền: </label>
		<select name="permission_user" class="form-control">
			<option value="0" selected="">Non-Active</option>
			<option value="1" >Member</option>
			<option value="2" >Teacher</option>
			<option value="3" >Admin</option>
		</select>
	</div>
	<div class="form-group">
		<label for="">Ảnh đại diện: </label>
		<input type="file" class="form-control" name="avatar_user" accept="image/*">
	</div>
	<button type="submit" name="add_user" value="submit" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
</form>