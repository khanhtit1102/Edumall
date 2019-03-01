<h1>Quản lý mã giảm giá</h1>
<hr>
<?php if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
} ?>
<form action="" method="POST" role="form" onsubmit="return delete_confirm()">
<table id="example" class="table table-hover table-bordered" style="width:100%">
	
	<thead>
		<tr>
			<th><input type="checkbox" id="select_all" value=""/></th>
			<th>ID</th>
			<th>Mã Coupon</th>
			<th>Chiết khấu</th>
			<th>Tình trạng</th>
			<th>Ngày hết hạn</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php $i = 0;
		foreach ($result as $key => $value) { $i++;
	?>
		<tr>
			<td>
				<input type="checkbox" name="id[]" class="checkbox" value="<?php echo $value['id_cp']; ?>">
			</td>
			<td><?php echo $i; ?></td>
			<td><?php echo $value['code_cp']; ?></td>
			<td><?php echo $value['percent_discount']; ?> %</td>
			<td>
				<?php 
				if (strtotime($value["expiration_date"]) < strtotime(date('Y-m-d'))){
					echo '<i style="color: white;background-color: red;padding: 2px 10px;border-radius: 5px;">Hết hạn</i>';
				}
				else{
					echo '<i style="color: white;background-color: blue;padding: 2px 10px;border-radius: 5px;">Có hiệu lực</i>';
				}
				?>
			</td>
			<td><?php echo $value['expiration_date']; ?></td>
			<td>
				<a class="btn btn-primary" href="edit_coupon/<?php echo $value['id_cp']; ?>"><i class="fa fa-edit"></i></a>
				<a class="btn btn-danger" href="delete_coupon/<?php echo $value['id_cp']; ?>" onclick="return confirm('Bạn thực sự muốn xóa mã giảm giá này?')"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th><button type="submit" name="delete" value="submit" class="btn btn-danger" id="multi-del">XÓA</button></th>
			<th>ID</th>
			<th>Mã Coupon</th>
			<th>Chiết khấu</th>
			<th>Tình trạng</th>
			<th>Ngày hết hạn</th>
			<th></th>
		</tr>
	</tfoot>
</table>
</form>
