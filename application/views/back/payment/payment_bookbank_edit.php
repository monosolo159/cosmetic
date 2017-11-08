<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														แก้ไขรายการบัญชีธนาคาร
												</h2>
										</div>
										<div class="body">
											<?php echo form_open_multipart('/payment/bookbankEdit',array('id'=>'form_advanced_validation')); ?>
												<label class="form-label">ชื่อบัญชีธนาคาร</label>
												<div class="form-group form-float">
														<div class="form-line">
																<input type="text" class="form-control" name="bank_name" maxlength="200" placeholder="" required value="<?php echo $BookbankSelect[0]['bank_name'] ?>">
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">สาขา</label>
														<div class="form-line">
																<input type="text" class="form-control" name="bank_subbank" maxlength="200" placeholder="" required value="<?php echo $BookbankSelect[0]['bank_subbank'] ?>">
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">ประเภท</label>
														<div class="form-line">
																<input type="text" class="form-control" name="bank_type" maxlength="200" placeholder="" required value="<?php echo $BookbankSelect[0]['bank_type'] ?>">
														</div>
												</div>
												<div class="form-group">
													<label class="form-label">เลขที่บัญชี</label>
														<div class="form-line">
																<input type="text" class="form-control" name="bank_book" maxlength="200" placeholder="" required value="<?php echo $BookbankSelect[0]['bank_book'] ?>">
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">ภาพโลโก้</label>
														<div class="form-line">
																<input type="file" class="form-control" name="imgfiles">
														</div>
												</div>
												<input type="hidden" name="bank_id" value="<?php echo $BookbankSelect[0]['bank_id'] ?>">
												<button type="submit" class="btn waves-effectc btn-success">บันทึก</button>
											<?php echo form_close(); ?>

										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
