<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														แก้ไขราคารูปแบบการจัดส่ง
												</h2>
										</div>
										<div class="body">
											<?php echo form_open('/delivery/deliveryTypeEdit'); ?>
												<!-- text input -->
												<div class="form-group form-float">
													<label class="form-label">รูปแบบ</label>
														<div class="form-line">
																<input type="text" class="form-control" name="delivery_name" maxlength="200" disabled value="<?php echo $DeliverySelect[0]['delivery_name'] ?>">
																<!-- <label class="form-label">หมวดหมู่</label> -->
														</div>
												</div>
												<!-- textarea -->
												<div class="form-group form-float">
													<label class="form-label">ราคา</label>
														<div class="form-line">
																<input type="number" class="form-control" name="delivery_amount" maxlength="11" value="<?php echo $DeliverySelect[0]['delivery_amount'] ?>">
														</div>
												</div>
												<input type="hidden" name="delivery_id" value="<?php echo $DeliverySelect[0]['delivery_id'] ?>">
												<button type="submit" class="btn waves-effectc btn-success">บันทึก</button>
											<?php echo form_close(); ?>

										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
