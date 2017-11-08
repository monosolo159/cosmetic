<section class="content">
		<div class="container-fluid">
				<!-- Exportable Table -->
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="card">
										<div class="header">
												<h2>
														แก้ไขรายการสินค้า
												</h2>
										</div>
										<div class="body">
											<?php echo form_open_multipart('/product/productEdit',array('id'=>'form_advanced_validation')); ?>
												<label class="form-label">ชื่อสินค้า</label>
												<div class="form-group form-float">
														<div class="form-line">
																<input type="text" class="form-control" name="product_name" maxlength="500" placeholder="" required value="<?php echo $ProductSelect[0]['product_name'] ?>">
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">รายละเอียด</label>
														<div class="form-line">
																<textarea name="product_detail" cols="30" rows="5" id="ckeditor" class="form-control no-resize" maxlength="5000" placeholder="" required><?php echo $ProductSelect[0]['product_detail'] ?></textarea>
														</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">ราคา</label>
														<div class="form-line">
																<input type="number" class="form-control" name="product_price" maxlength="12" placeholder="" required value="<?php echo $ProductSelect[0]['product_price'] ?>">
														</div>
												</div>
												<div class="form-group">
													<label class="form-label">หมวดหมู่</label>
														<div class="form-line">
																<select class="form-control show-tick" name="category_id" required>
																	<option disabled value="">--เลือกหมวดหมู่--</option>
																	<?php foreach ($CategoryList as $row): ?>
																		<?php if ($row['category_id']===$ProductSelect[0]['category_id']): ?>
																			<option value="<?php echo $row['category_id'] ?>" selected="selected"><?php echo $row['category_name'] ?></option>
																		<?php else: ?>
																			<option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
																		<?php endif; ?>
																	<?php endforeach; ?>
																</select>
														</div>
												</div>
												<div class="form-group">
													<label class="form-label">ประเภท</label>
														<div class="form-line">
																<select class="form-control show-tick" name="product_type_id" required>
																	<option disabled value="">--เลือกหมวดหมู่--</option>
																	<?php foreach ($typeList as $row): ?>
																		<?php if ($row['product_type_id']===$ProductSelect[0]['product_type_id']): ?>
																			<option value="<?php echo $row['product_type_id'] ?>" selected="selected"><?php echo $row['product_type_name'] ?></option>
																		<?php else: ?>
																			<option value="<?php echo $row['product_type_id'] ?>"><?php echo $row['product_type_name'] ?></option>
																		<?php endif; ?>
																	<?php endforeach; ?>
																</select>
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
