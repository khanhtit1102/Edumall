<h1>Quản lý khóa học</h1>
<hr>
<table id="example" class="table table-hover table-bordered" style="width:100%">
	<thead>
		<tr>
			<th>Tên khóa học</th>
			<th>Giảng viên</th>
			<th>Giá tiền</th>
			<th>Chuyên mục</th>
			<th>Ngày tạo</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($result as $key => $value) {
	?>
		<tr>
			<td><?php echo $value['ten_cs']; ?></td>
			<td><?php echo $value['name_user']; ?></td>
			<td><?php echo $value['gia_cs']; ?>đ</td>
			<td>
				<?php 
					switch ($value['id_cate']) {
						case 'cntt':
							echo "Công nghệ thông tin";
							break;
						case 'tk':
							echo "Thiết kế";
							break;
						case 'ndc':
							echo "Nuôi dạy con";
							break;
						case 'ptbt':
							echo "Phát triển bản thân";
							break;
						case 'kdkn':
							echo "Kinh doanh & khởi nghiệp";
							break;
						case 'nn':
							echo "Ngoại ngữ";
							break;
						case 'mkt':
							echo "Marketing";
							break;
						case 'thvp':
							echo "Tin học văn phòng";
							break;
						
						default:
							echo "Khác";
							break;
					}
				 ?>
			</td>
			<td><?php echo $value['created_date']; ?></td>
			<td style="display: flex;">
				<a class="btn btn-success" href="<?php echo base_url('display?id=').$value['id_cs'] ?>" target="_blank" title="Xem khóa học"><i class="fa fa-list-alt"></i></a>
				
				<a class="btn btn-primary" href="edit_course/<?php echo $value['id_cs']; ?>" title="Sửa khóa học"><i class="fa fa-edit"></i></a>
				
				<a class="btn btn-danger" href="delete_course/<?php echo $value['id_cs']; ?>" title="Xóa khóa học" onclick="return confirm('Bạn thực sự muốn xóa khóa học này?')"><i class="fa fa-times"></i></a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Tên khóa học</th>
			<th>Giảng viên</th>
			<th>Giá tiền</th>
			<th>Chuyên mục</th>
			<th>Ngày tạo</th>
			<th></th>
		</tr>
	</tfoot>
</table>