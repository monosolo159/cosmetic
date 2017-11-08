<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
        <div class="header">
            <h2>เพิ่มที่อยู่</h2>
        </div>
        <div class="body">
            <div class="row">

              <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <?php echo form_open_multipart('/Member/updateAddress',array('id'=>'form_advanced_validation')); ?>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="member_fname" class="form-control" required placeholder="ชื่อ" value="<?php echo $address[0]['member_fname'] ?>">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="member_lname" class="form-control" required placeholder="สกุล" value="<?php echo $address[0]['member_lname'] ?>">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <textarea name="member_address" cols="30" rows="5" class="form-control no-resize" maxlength="5000" placeholder="ที่อยู่" required><?php echo $address[0]['member_address'] ?></textarea>
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
    																<select class="form-control show-tick" name="province_id" required>
                                      <option disabled value="">--จังหวัด--</option>
    																	<?php foreach ($Province as $row): ?>
    																		<?php if ($row['province_id']===$address[0]['province_id']): ?>
    																			<option value="<?php echo $row['province_id'] ?>" selected="selected"><?php echo $row['province_name'] ?></option>
    																		<?php else: ?>
    																			<option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>
    																		<?php endif; ?>
    																	<?php endforeach; ?>

    																</select>
    																<!-- <label class="form-label">ราคา</label> -->
    														</div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="member_zipcode" class="form-control" maxlength="5" required placeholder="รหัสไปรษณีย์" value="<?php echo $address[0]['member_zipcode'] ?>">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row" style="text-align:center;">
                        <input type="hidden" name="mad_id" value="<?php echo $address[0]['mad_id'] ?>">
                        <button type="submit" class="btn waves-effectc btn-success">แก้ไข</button>
                      </div>

                      <?php echo form_close(); ?>
                    </div>



              </div>

            </div>
        </div>
</div>
<!-- #END# Task Info -->
