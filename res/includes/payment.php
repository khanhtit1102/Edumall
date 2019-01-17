<h1>Thanh toán cho Giáo viên</h1>
<hr>
<?php if (isset($_SESSION['error'])) {
	echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
} ?>
<table id="example" class="table table-hover table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>ID</th>
			<th>Ngân hàng</th>
			<th>Tên chủ thẻ</th>
			<th>STK</th>
			<th>Số tiền</th>
			<th>Gửi yêu cầu</th>
			<th>Đã thanh toán</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0; 
		foreach ($result as $key => $value) { 
			$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value['method_payreq']; ?></td>
				<td><?php echo $value['name_holder']; ?></td>
				<td><?php echo $value['number_cart']; ?></td>
				<td><?php echo $value['amount_payreq']; ?></td>
				<td><?php echo $value['date_payreq']; ?></td>
				<td><?php echo $value['date_payment']; ?></td>
				<?php 
				if ($value['state_payreq'] == 0) {
				?>
				<td><a class="btn btn-primary" href="payment_accept/<?php echo $value['id_payreq']; ?>"><i class="fa fa-check"></i></a></td>
				<?php } else{ echo '<td></td>'; }?>
			</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>Ngân hàng</th>
			<th>Tên chủ thẻ</th>
			<th>STK</th>
			<th>Số tiền</th>
			<th>Gửi yêu cầu</th>
			<th>Đã thanh toán</th>
			<th></th>
		</tr>
	</tfoot>
</table>
<!-- <script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script> -->