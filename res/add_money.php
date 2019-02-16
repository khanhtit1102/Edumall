<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/'); ?>imgs/icon.png">
	<title>Trang nạp tiền chính thức</title>
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/account.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main class="container" style="background-color: #f8f8f8;">
		<br>
		<div class="row">
			<h1>Trang nạp tiền chính thức của hệ thống <b>Edumall</b></h1>
			<hr>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<ul class="nav nav-tabs" role="tablist" id="myTab">
					<li class="active"><a href="#card" role="tab" data-toggle="tab">Thẻ điện thoại</a></li>
					<li><a href="#paypal" role="tab" data-toggle="tab">Paypal</a></li>
				</ul>

				<div class="tab-content col-md-12">
					<div class="tab-pane active" id="card">
						<center><b><h4>BẢNG QUY ĐỔI TIỀN QUA THẺ ĐIỆN THOẠI</h4></b></center>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>Giá</th>
									<th>Quy đổi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>10,000 VND</td>
									<td>10,000 Coin</td>
								</tr>
								<tr>
									<td>20,000 VND</td>
									<td>20,000 Coin</td>
								</tr>
								<tr>
									<td>50,000 VND</td>
									<td>50,000 Coin</td>
								</tr>
								<tr>
									<td>100,000 VND</td>
									<td>100,000 Coin</td>
								</tr>
								<tr>
									<td>200,000 VND</td>
									<td>200,000 Coin</td>
								</tr>
								<tr>
									<td>500,000 VND</td>
									<td>500,000 Coin</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="paypal">
						<center><b><h4>BẢNG QUY ĐỔI TIỀN QUA CỔNG PAYPAL</h4></b></center>
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>Giá</th>
									<th>Quy đổi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1.00 $</td>
									<td>25,000 Coin</td>
								</tr>
								<tr>
									<td>5.00 $</td>
									<td>125,000 Coin</td>
								</tr>
								<tr>
									<td>10.00 $</td>
									<td>250,000 Coin</td>
								</tr>
								<tr>
									<td>20.00 $</td>
									<td>500,000 Coin</td>
								</tr>
								<tr>
									<td>40.00 $</td>
									<td>1,000,000 Coin</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="panel-group" id="card-panel">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#card-panel" href="#cardpanel">
									Thanh toán bằng thẻ điện thoại
								</a>
							</h4>
						</div>
						<div id="cardpanel" class="panel-collapse collapse">
							<div class="panel-body">
								<form action="" method="POST" role="form">
									<legend>- Chọn mệnh giá và nhập mã thẻ nạp</legend>

									<div class="form-group" style="width: 30%">
										<label for="">Chọn mệnh giá thẻ:</label>
										<select name="menh_gia" id="menh_gia" class="form-control" required="required">
											<option value="10000">10,000 VND</option>
											<option value="20000">20,000 VND</option>
											<option value="50000">50,000 VND</option>
											<option value="100000">100,000 VND</option>
											<option value="200000">200,000 VND</option>
											<option value="500000">500,000 VND</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Mã thẻ nạp:</label>
										<input type="text" name="ma_nap" id="ma_nap" class="form-control" required="required" autocomplete="off">
									</div>
									<button type="submit" name="nap_the" value="submit" class="btn btn-danger" style="width: 100%">Xác nhận</button>
								</form>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#paypalpanel">
									Thanh toán bằng cổng PayPal
								</a>
							</h4>
						</div>
						<div id="paypalpanel" class="panel-collapse collapse">
							<div class="panel-body">
								<legend>- Chọn mệnh giá và nhấp vào nút dưới đây</legend>
								<div class="form-group" style="width: 30%">
									<label for="">Chọn mệnh giá:</label>
									<select id="dolar" name="menh_gia" class="form-control" onchange="usd(this.value)">
										<option value="" disabled="" selected="">Chọn mệnh giá</option>
										<option value="1">1.00 $</option>
										<option value="5">5.00 $</option>
										<option value="10">10.00 $</option>
										<option value="20">20.00 $</option>
										<option value="40">40.00 $</option>
									</select>
								</div>
								<div id="paypal-button-container"></div>
								<div id="paypal-button"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
		function usd(val) {
			$('#paypal-button').empty();
			paypal.Button.render({
			env: '<?php echo PAYPAL_ENV; ?>',
			client: {
				<?php if(PRO_PAYPAL) { ?>
					production: '<?php echo PAYPAL_CLIENTID; ?>'
				<?php } else { ?>
					sandbox: '<?php echo PAYPAL_CLIENTID; ?>'
				<?php } ?>
			},
			payment: function (data, actions) {
				return actions.payment.create({
					transactions: [{
						amount: {
							total: val,
							currency: '<?php echo CURRENCY; ?>'
						}
					}]
				});
			},
			onAuthorize: function (data, actions) {
				return actions.payment.execute()
				.then(function () {
					window.location = "";
				});
			}
		}, '#paypal-button');
		}
	</script>
	<script src="<?php echo base_url('res/'); ?>bs/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url('res/'); ?>bs/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>