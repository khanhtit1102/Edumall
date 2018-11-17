<h1>Quản lý thành viên</h1>
<hr>
<table id="example" class="table table-hover table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>Số đơn hàng</th>
			<th>Khách hàng</th>
			<th>Khóa học đã mua</th>
			<th>Giá tiền</th>
			<th>Ngày mua</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($result as $key => $value) {
	?>
		<tr>
			<td><?php echo $value['id_own']; ?></td>
			<td><?php echo $value['name_user']; ?></td>
			<td><a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><?php echo $value['ten_cs']; ?></a></td>
			<td><?php echo $value['gia_cs']; ?></td>
			<td><?php echo $value['date_own']; ?></td>
			<td>
				<a class="btn btn-primary" href=""><i class="fa fa-edit"></i></a>
				<a class="btn btn-danger" href="" onclick="return confirm('Bạn thực sự muốn xóa đơn hàng này?')"><i class="fa fa-times"></i></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Số đơn hàng</th>
			<th>Khách hàng</th>
			<th>Khóa học đã mua</th>
			<th>Giá tiền</th>
			<th>Ngày mua</th>
			<th></th>
		</tr>
	</tfoot>
</table>
