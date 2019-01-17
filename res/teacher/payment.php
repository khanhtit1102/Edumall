<br>
<div class="row">
	<div class="col-md-6">
		<form action="" method="POST" role="form">
			<legend>Gửi yêu cầu thanh toán</legend>
			<?php if (isset($_SESSION['error'])) {
				echo '<div class="alert alert-success" role="alert">'.$_SESSION['error'].'</div>';
			} ?>
			<div class="form-group">
				<label for="">Ngân hàng: </label>
				<select name="method_payreq" class="form-control">
					<option value="AgriBank">AgriBank</option>
					<option value="BIDV">BIDV</option>
					<option value="DongABank">DongABank</option>
					<option value="EximBank">EximBank</option>
					<option value="HDBank">HDBank</option>
					<option value="MBBank">MBBank</option>
					<option value="SacomBank">SacomBank</option>
					<option value="TechcomBank">TechcomBank</option>
					<option value="TPBank">TPBank</option>
					<option value="VietcomBank">VietcomBank</option>
					<option value="ViettinBank">ViettinBank</option>
					<option value="VPBank">VPBank</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tên chủ thẻ: </label>
				<input type="text" class="form-control" id="" name="name_holder">
			</div>
			<div class="form-group">
				<label for="">Số tài khoản: </label>
				<input type="text" class="form-control" id="" name="number_cart">
			</div>
			<div class="form-group">
				<label for="">Số tiền rút: </label>
				<input type="number" class="form-control" id="" name="amount_payreq">
			</div>
			<div class="form-group">
				<label for="">Tin nhắn: </label>
				<textarea name="message_payreq" class="form-control" rows="3"></textarea>
			</div>
			<button type="submit" name="payment_request" value="submit" class="btn btn-primary" name="btn-submit">Gửi yêu cầu</button>
		</form>
	</div>
	<div class="col-md-6">
		<legend>Tra cứu lịch sử thanh toán</legend>
		<button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Lịch sử thanh toán</button>
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myLargeModalLabel">Lịch sử thanh toán</h4>
					</div>
					<div class="modal-body">
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
									</tr>
								<?php } ?>
							</tbody>
							<tr>
								<th>ID</th>
								<th>Ngân hàng</th>
								<th>Tên chủ thẻ</th>
								<th>STK</th>
								<th>Số tiền</th>
								<th>Gửi yêu cầu</th>
								<th>Đã thanh toán</th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
