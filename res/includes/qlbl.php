<h1>Quản lý bình luận</h1>
<hr>
<?php if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
} ?>
<table id="example" class="table table-hover table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên khóa học</th>
			<th>Người bình luận</th>
			<th>Email liên hệ</th>
			<th>Nội dung</th>
			<th>Thời gian</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($result as $key => $value) {
	?>
		<tr>
			<td><?php echo $value['id_cmt']; ?></td>
			<td><a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><?php echo $value['ten_cs']; ?></a></td>
			<td><?php echo $value['ten_cmt']; ?></td>
			<td><a href="<?php echo base_url('admin_panel/send_mail?email=').$value['email_cmt']; ?>"><?php echo $value['email_cmt']; ?></a></td>
			<td><?php echo $value['nd_cmt']; ?></td>
			<td><?php echo $value['ngay_cmt']; ?></td>
			<td style="display: flex;">
				<a class="btn btn-primary" href="<?php echo base_url('learn/course/').$value['id_cs']; ?>"><i class="fa fa-list-alt"></i></a>
				
				<a class="btn btn-warning" href="send_mail?email=<?php echo $value['email_user']; ?>&subject=reply_request_student&course=<?php echo $value['id_cs']; ?>" title="Gửi email yêu cầu trả lời học viên"><i class="fa fa-paper-plane"></i></a>
				
				<a class="btn btn-danger" href="delete_cmt/<?php echo $value['id_cmt']; ?>" onclick="return confirm('Bạn thực sự muốn xóa bình luận này?')"><i class="fa fa-times"></i></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>Tên khóa học</th>
			<th>Người bình luận</th>
			<th>Email liên hệ</th>
			<th>Nội dung</th>
			<th>Thời gian</th>
			<th></th>
		</tr>
	</tfoot>
</table>
