<section class="content">
	<div class="container-fluid">
		<!-- Exportable Table -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							เพิ่มรายการสินค้า
						</h2>
					</div>
					<div class="body">



						<?php echo form_open_multipart('/product/productAdd',array('id'=>'form_advanced_validation','name'=>'form_advanced_validation')); ?>
						<label class="form-label">ชื่อสินค้า</label>
						<div class="form-group form-float">
							<div class="form-line">
								<input type="text" class="form-control" name="product_name" maxlength="500" placeholder="" required>
							</div>
						</div>
						<div class="form-group form-float">
							<label class="form-label">รายละเอียด</label>
							<div class="form-line">
								<textarea name="product_detail" cols="30" rows="5" id="ckeditor" class="form-control no-resize" maxlength="5000" placeholder="" required></textarea>
							</div>
						</div>
						<div class="form-group form-float">
							<label class="form-label">ราคา</label>
							<div class="form-line">
								<input type="number" class="form-control" name="product_price" maxlength="12" placeholder="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label">หมวดหมู่</label>
							<div class="form-line">
								<select class="form-control show-tick" name="category_id" required>
									<option selected="selected" disabled value="">--เลือกหมวดหมู่--</option>
									<?php foreach ($CategoryList as $row): ?>
										<option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
							<div class="form-group">
								<label class="form-label">ประเภท</label>
								<div class="form-line">
									<select class="form-control show-tick" name="product_type_id" required>
										<option selected="selected" disabled value="">--เลือกหมวดหมู่--</option>
										<?php foreach ($typeList as $row): ?>
											<option value="<?php echo $row['product_type_id'] ?>"><?php echo $row['product_type_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group form-float">
								<label class="form-label">ภาพ (ควรเป็นขนาด 500*300 หรือ 1000*600 พิกเซล)</label>
								<div class="form-line">
									<input type="file" class="form-control" name="imgfiles[]" multiple required>
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
