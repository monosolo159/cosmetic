<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														แก้ไขหมวดหมู่
												</h2>
										</div>
										<div class="body">
											<?php echo form_open('/product/categoryEdit'); ?>
												<!-- text input -->
												<div class="form-group form-float">
													<label class="form-label">หมวดหมู่</label>
														<div class="form-line">
																<input type="text" class="form-control" name="category_name" maxlength="200" required value="<?php echo $CategorySelect[0]['category_name'] ?>">
																<!-- <label class="form-label">หมวดหมู่</label> -->
														</div>
												</div>
												<!-- textarea -->
												<div class="form-group form-float">
													<label class="form-label">รายละเอียด</label>
														<div class="form-line">
																<textarea name="category_detail" cols="30" rows="5" class="form-control no-resize" maxlength="5000" required><?php echo $CategorySelect[0]['category_detail'] ?></textarea>
																<!-- <label class="form-label">รายละเอียด</label> -->
														</div>
												</div>
												<input type="hidden" name="category_id" value="<?php echo $CategorySelect[0]['category_id'] ?>">
												<button type="submit" class="btn waves-effectc btn-success">บันทึก</button>
											<?php echo form_close(); ?>

										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
