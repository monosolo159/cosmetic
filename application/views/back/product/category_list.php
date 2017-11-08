<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix js-sweetalert">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														หมวดหมู่
												</h2>
												<ul class="header-dropdown m-r--5">
														<li class="dropdown">
																<a left class="btn btn-success waves-effect pull-right" href="<?php echo site_url('product/categoryAddForm'); ?>">เพิ่ม</a>
														</li>
												</ul>
										</div>
										<div class="body">
												<table class="table table-bordered table-striped table-hover dataTable js-basic-example">
													<thead>
													<tr>
														<th>#</th>
														<th>หมวดหมู่</th>
														<th>รายละเอียด</th>
														<th>จัดการ</th>
													</tr>
													</thead>
														<tbody>
															<?php $index = 1; ?>
															<?php foreach ($CategoryList as $row): ?>
																<tr>
																	<td><?php echo $index; ?></td>
																	<td><?php echo $row['category_name']; ?></td>
																	<td><?php echo $row['category_detail']; ?></td>
																	<td>
																			<a class="btn btn-xs waves-effect btn-warning" href="<?php echo site_url('product/categoryEditForm/'.$row['category_id']); ?>">แก้ไข</a> <a class="btn btn-xs btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('product/categoryDelete/'.$row['category_id']); ?>';}">ลบ</a>
																	</td>
																</tr>
															<?php $index++; endforeach; ?>
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
