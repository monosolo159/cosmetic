<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														เพิ่มจำนวนสินค้าคงคลัง
												</h2>
										</div>
										<div class="body">
											<?php echo form_open_multipart('/product/productImportValue',array('id'=>'form_advanced_validation')); ?>
												<label class="form-label">ชื่อสินค้า</label>
												<div class="form-group form-float">
														<div class="form-line">
																<input type="text" class="form-control" name="product_name" value="<?php echo $ProductSelect[0]['product_name'] ?>" disabled>
														</div>
												</div>
												<label class="form-label">รายละเอียด</label>
												<div class="form-group form-float">
														<div class="form-line">
															<?php echo $ProductSelect[0]['product_detail'] ?>
														</div>
												</div>
												<label class="form-label">หมวดหมู่</label>
												<div class="form-group form-float">
														<div class="form-line">
																<input type="text" class="form-control" name="category_name" value="<?php echo $ProductSelect[0]['category_name'] ?>" disabled>
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">ประเภท</label>

														<div class="form-line">
																<input type="text" class="form-control" name="category_name" value="<?php echo $ProductSelect[0]['product_type_name'] ?>" disabled>
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">จำนวน</label>
														<div class="form-line">
																<input type="number" class="form-control" name="product_stock_value" maxlength="11" placeholder="" required>
														</div>
												</div>
												<input type="hidden" name="product_id" value="<?php echo $ProductSelect[0]['product_id'] ?>">
												<button type="submit" class="btn waves-effectc btn-success">บันทึก</button>
											<?php echo form_close(); ?>

										</div>
								</div>
						</div>
				</div>
				<!-- #END# Exportable Table -->
		</div>
</section>
