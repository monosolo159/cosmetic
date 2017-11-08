<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														แก้ไขประเภท
												</h2>
										</div>
										<div class="body">
											<?php echo form_open('/product/typeEdit'); ?>
												<div class="form-group form-float">
													<label class="form-label">ประเภท</label>
														<div class="form-line">
																<input type="text" class="form-control" name="product_type_name"  maxlength="200" value="<?php echo $typeSelect[0]['product_type_name'] ?>" required>
														</div>
												</div>
												<input type="hidden" name="product_type_id" value="<?php echo $typeSelect[0]['product_type_id'] ?>">
												<button type="submit" class="btn waves-effectc btn-success">บันทึก</button>
											<?php echo form_close(); ?>

										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
