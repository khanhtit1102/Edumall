<h1>Quản lý thành viên</h1>
<hr>
<table id="example" class="table table-hover table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>Ảnh đại diện</th>
			<th>Họ và Tên</th>
			<th>Email</th>
			<th>Giới tính</th>
			<th>Tài khoản</th>
			<th>Vai trò</th>
			<th>Ngày tạo</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($result as $key => $value) {
	?>
		<tr>
			<td><center><img src="<?php echo base_url('res/uploads/').$value['avatar_user']; ?>" alt="" width="40px"></center></td>
			<td><?php echo $value['name_user']; ?></td>
			<td><a href="mailto:<?php echo $value['email_user']; ?>"><?php echo $value['email_user']; ?></a></td>
			<td>
				<?php 
					if ($value['sex_user'] == 0) {
						echo "Nữ";
					}
					else{
						echo "Nam";
					}
				?>
			</td>
			<td><?php echo $value['coin_user']; ?>đ</td>
			<td>
				<?php 
				switch ($value["permission_user"]) {
					case '1':
						echo '<i style="color: blue;">Member</i>';
						break;
					case '2':
						echo '<i style="color: green;">Teacher</i>';
						break;
					case '3':
						echo '<i style="color: red;">Admin</i>';
						break;
					default:
						echo 'Non-Active';
						break;
				}
				?>
			</td>
			<td><?php echo $value['created_date']; ?></td>
			<td>
				<a class="btn btn-primary" href="edit_user/<?php echo $value['id_user']; ?>"><i class="fa fa-edit"></i></a>
				<?php if($value['id_user'] != 1 && $value['id_user'] != $_SESSION['id_user']){ ?>
					<a class="btn btn-danger" href="delete_user/<?php echo $value['id_user']; ?>" onclick="return confirm('Bạn thực sự muốn xóa thành viên này?')"><i class="fa fa-times"></i></a>
				<?php } ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Ảnh đại diện</th>
			<th>Họ và Tên</th>
			<th>Email</th>
			<th>Giới tính</th>
			<th>Tài khoản</th>
			<th>Vai trò</th>
			<th>Ngày tạo</th>
			<th></th>
		</tr>
	</tfoot>
</table>
