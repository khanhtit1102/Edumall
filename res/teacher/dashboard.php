<h1>Dashboard - Teacher Panel</h1>
<hr>
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-book fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $dashboard_count['course']; ?></div>
						<div>Khóa học cuả bạn!</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url('teacher_panel/qlkh') ?>">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $dashboard_count['comment']; ?></div>
						<div>Bình luận của học viên!</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url('teacher_panel/qlbl') ?>">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $dashboard_count['own']; ?></div>
						<div>Đơn hàng của bạn!</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url('teacher_panel/qldh') ?>">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo number_format($dashboard_count['money']); ?></div>
						<div>Số tiền đã thu được!</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url('teacher_panel/qltv') ?>">
				<div class="panel-footer">
					<span class="pull-left">Xem chi tiết</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<div class="panel panel-default" id="#Area-Chart">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
				<div class="pull-right">
					<div class="btn-group">
						<a href=""><button type="button" class="btn btn-default btn-xs">Refresh</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="morris-area-chart"></div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i> Teacher Chats
				<div class="pull-right">
					<div class="btn-group">
						<a href=""><button type="button" class="btn btn-default btn-xs">Refresh</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<ul class="chat">
					<?php 
					$i = 0;
					foreach ($teacher_chat as $key => $value) {
						$i++;
						if ($i % 2 == 0) {
							echo '<li class="right clearfix">';
							echo '<span class="chat-img pull-right">';
							echo '<img src="'.base_url("res/uploads/").$value["avatar_user"].'" alt="User Avatar" class="img-circle" width="50px">';
							echo '</span>';
							echo '<div class="chat-body clearfix">';
							echo '<div class="header">';
							echo '<small class=" text-muted"><i class="fa fa-clock-o fa-fw"></i> '.$value["date_chat"].'</small>';
							echo '<strong class="pull-right primary-font">'.$value["name_user"].'</strong>';
							echo '</div>';
							echo '<p>'.$value["content_chat"].'</p>';
							echo '</div>';
							echo '</li>';

						}
						else{
							echo '<li class="left clearfix">';
							echo '<span class="chat-img pull-left">';
							echo '<img src="'.base_url("res/uploads/").$value["avatar_user"].'" alt="User Avatar" class="img-circle" width="50px">';
							echo '</span>';
							echo '<div class="chat-body clearfix">';
							echo '<div class="header">';
							echo '<strong class="primary-font">'.$value["name_user"].'</strong>';
							echo '<small class="pull-right text-muted"><i class="fa fa-clock-o fa-fw"></i> '.$value["date_chat"].'</small>';
							echo '</div>';
							echo '<p>'.$value["content_chat"].'</p>';
							echo '</div>';
							echo '</li>';
						}
					}
					?>
				</ul>
			</div>
			<div class="panel-footer">
				<form action="" method="POST" role="form">
					<div class="input-group">
						<input type="text" class="form-control input-sm" name="content_chat" placeholder="Type your message here...">
						<span class="input-group-btn">
							<button class="btn btn-warning btn-sm" type="submit" name="teacher_chat" value="submit">
								Send
							</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i> Today News
				<div class="pull-right">
					<div class="btn-group">
						<a href=""><button type="button" class="btn btn-default btn-xs">Refresh</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<i class="fa fa-comment fa-fw"></i> New Course
						<span class="pull-right small"><em>4 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> New Member
						<span class="pull-right small"><em>12 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-envelope fa-fw"></i> New Order
						<span class="pull-right small"><em>27 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-tasks fa-fw"></i> New Comment
						<span class="pull-right small"><em>43 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-upload fa-fw"></i> Email Sent
						<span class="pull-right small"><em>11:32 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-money fa-fw"></i> Payment Received
						<span class="pull-right small"><em>Yesterday</em>
						</span>
					</a>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
				<div class="pull-right">
					<div class="btn-group">
						<a href=""><button type="button" class="btn btn-default btn-xs">Refresh</button></a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="morris-donut-chart"></div>
			</div>
		</div>
	</div>
</div>
