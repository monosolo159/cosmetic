<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														แก้ไขภาพสินค้า
												</h2>
										</div>
										<div class="body">
										<style>
											.crop {
												width: 360px;
												height: 290px;
												/*overflow: hidden;*/
											}

											.crop img {
												width: auto;
												height: 200px;
											}
										</style>
											<div class="row">
													<?php foreach ($ProductImageSelect as $row): ?>
														<div class="col-xs-6 col-md-3 crop">
																<a href="javascript:void(0);" class="thumbnail">
																		<img src="<?php echo base_url('assets/image/product/'.$row['product_image_name']); ?>" class="img-responsive">
																</a>
																<div class="pull-left">
																	<?php echo form_open_multipart('/product/productImageOrderEdit'); ?>
																	<div class="pull-left">
																		<input type="number" class="form-control" name="product_image_order" maxlength="11" value="<?php echo $row['product_image_order'] ?>" placeholder="" required>
																		<input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>">
																		<input type="hidden" name="product_image_id" value="<?php echo $row['product_image_id'] ?>">
																	</div>
																	<div class="pull-right">
																		<button type="submit" class="btn waves-effectc btn-default">บันทึก</button>
																	</div>
																	<?php echo form_close(); ?>
																</div>
																<div class="pull-right">
																	<a class="btn btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('product/productImageDeleteId/'.$row['product_image_id'].'/'.$row['product_id']); ?>';}">ลบ</a>
																</div>
														</div>
													<?php endforeach; ?>
											</div>

											<?php echo form_open_multipart('/product/productImageAdd',array('id'=>'form_advanced_validation')); ?>

												<div class="form-group form-float">
													<label class="form-label">ภาพ (ควรเป็นขนาด 500*300 หรือ 1000*600 พิกเซล)</label>
														<div class="form-line">
																<input type="file" class="form-control" name="imgfiles[]" multiple>
														</div>
												</div>
												<input type="hidden" name="product_id" value="<?php echo $product_id ?>">
												<button type="submit" class="btn waves-effectc btn-success">เพิ่มภาพ</button>
												<div class="pull-right">
													<a class="btn btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('product/productImageDeleteAll/'.$product_id); ?>';}">ลบภาพทั้งหมด</a>
												</div>
											<?php echo form_close(); ?>
										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
