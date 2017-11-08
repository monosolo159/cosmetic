<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														เพิ่มรายการจัดส่ง
												</h2>
										</div>
										<div class="body">
											<?php echo form_open('/Delivery/addDeliveryStatus',array('id'=>'form_advanced_validation')); ?>
												<label class="form-label">คำสั่งซื้อ</label>
												<div class="form-group form-float">
														<!-- <div class="form-line">
																<input type="text" class="form-control" name="order_id" maxlength="11" placeholder="" required>
														</div> -->
														<div class="form-line">
																<select class="form-control show-tick" name="order_id" required>
																	<option selected="selected" disabled value="">--เลือกคำสั่งซื้อ--</option>
																	<?php foreach ($order as $row): ?>
																		<option value="<?php echo $row['order_id'] ?>">#<?php echo $row['order_id'] ?></option>
																	<?php endforeach; ?>
																</select>
																<!-- <label class="form-label">ราคา</label> -->
														</div>
												</div>


												<div class="form-group form-float">
													<label class="form-label">วันที่จัดส่ง</label>
														<div class="form-line">
																<input type="text" class="form-control date" name="delivery_status_date" maxlength="100" placeholder="2016/07/30" required>
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">หมายเลขจัดส่ง</label>
														<div class="form-line">
																<input type="text" class="form-control" name="delivery_status_detail" maxlength="100" placeholder="" required>
														</div>
												</div>
												<button type="submit" class="btn waves-effectc btn-success">บันทึก</button>
											<?php echo form_close(); ?>

										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
