<h1>Quản lý tiền tệ</h1>
<hr>
<table id="example" class="table table-hover table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Khách hàng</th>
			<th>Tên khóa học</th>
			<th>Tiền thu</th>
			<th>Ngày được mua</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$i = 0;
		$sum = 0;
		foreach ($result as $key => $value) { 
			$i++;
			$sum += $value['gia_cs']-$value['gia_cs']*40/100;
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $value['name_user']; ?></td>
			<td><a href="<?php echo base_url('display?id=').$value['id_cs']; ?>"><?php echo $value['ten_cs']; ?></a></td>
			<td><?php echo number_format($value['gia_cs']-$value['gia_cs']*40/100).' đ'; ?></td>
			<td><?php echo $value['date_own']; ?></td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>Khách hàng</th>
			<th>Tên khóa học</th>
			<th>Tổng tiền thu: <?php echo number_format($sum).' đ'; ?></th>
			<th>Ngày được mua</th>
		</tr>
	</tfoot>
</table>
