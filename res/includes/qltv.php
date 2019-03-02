<h1>Quản lý thành viên</h1>
<hr>
<?php if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
} ?>
<form action="" method="POST" role="form" onsubmit="return delete_confirm()">
<table id="example" class="table table-hover table-bordered" style="width:100%">
	
	<thead>
		<tr>
			<th><input type="checkbox" id="select_all" value=""/></th>
			<th>Họ và Tên</th>
			<th>Email</th>
			<th>Tài khoản</th>
			<th>Vai trò</th>
			<th>Lần đăng nhập cuối</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($result as $key => $value) {
			$date = floor(abs(strtotime($value['last_login']) - strtotime(date('Y-m-d'))) / (60*60*24));
	?>
		<tr>
			<td>
				<?php if($value['id_user'] != 1 && $value['id_user'] != $_SESSION['id_user']){ ?>
					<input type="checkbox" name="id[]" class="checkbox" value="<?php echo $value['id_user']; ?>">
				<?php } else{ ?>
					<input type="checkbox" name="id[]" class="checkbox" value="<?php echo $value['id_user']; ?>" disabled="">
				<?php } ?>
			</td>
			<td><?php echo $value['name_user']; ?></td>
			<td><a href="mailto:<?php echo $value['email_user']; ?>"><?php echo $value['email_user']; ?></a></td>
			<td><?php echo number_format($value['coin_user']); ?>đ</td>
			<td>
				<?php 
				switch ($value["permission_user"]) {
					case '1':
						echo '<i style="color: white;background-color: blue;padding: 2px 10px;border-radius: 5px;">Member</i>';
						break;
					case '2':
						echo '<i style="color: white;background-color: green;padding: 2px 10px;border-radius: 5px;">Teacher</i>';
						break;
					case '3':
						echo '<i style="color: white;background-color: red;padding: 2px 10px;border-radius: 5px;">Admin</i>';
						break;
					default:
						echo 'Non-Active';
						break;
				}
				?>
			</td>
			<td><?php echo $value['last_login'].' '; if($date == 0){echo '(Hôm nay)';} else{echo '('.$date.' ngày trước)';} ?></td>
			<td>
				<a class="btn btn-default" href="view_user/<?php echo $value['id_user']; ?>"><i class="fa fa-eye"></i></a>
				<a class="btn btn-primary" href="edit_user/<?php echo $value['id_user']; ?>"><i class="fa fa-edit"></i></a>
				<?php if ($date > 5) {
				?>
				<a class="btn btn-warning" href="send_mail?email=<?php echo $value['email_user']; ?>&subject=call-user-back" title="Gửi Email quay lại"><i class="fa fa-paper-plane"></i></a>
				<?php } ?>
				<?php if($value['id_user'] != 1 && $value['id_user'] != $_SESSION['id_user']){ ?>
					<a class="btn btn-danger" href="delete_user/<?php echo $value['id_user']; ?>" onclick="return confirm('Bạn thực sự muốn xóa thành viên này?')"><i class="fa fa-trash-o"></i></a>
				<?php } ?>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th><button type="submit" name="delete" value="submit" class="btn btn-danger" id="multi-del">XÓA</button></th>
			<th>Họ và Tên</th>
			<th>Email</th>
			<th>Tài khoản</th>
			<th>Vai trò</th>
			<th>Lần đăng nhập cuối</th>
			<th></th>
		</tr>
	</tfoot>
</table>
</form>
