  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>แก้ไขข้อมูลส่วนตัว</h2>
                    </div>
                    <div class="body">


                      <?php echo form_open('/Member/updateUser'); ?>
                      <div class="row">
                        <div class="form-group">

                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="member_birth_date" class="form-control" maxlength="100" required placeholder="วันเดือนปีเกิด" value="<?php echo $userDetail[0]['member_birth_date'] ?>">
                                </div>
                              </div>

                        </div>
                      </div>


                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_fname" class="form-control" maxlength="100" required placeholder="ชื่อ" value="<?php echo $userDetail[0]['member_fname'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_lname" class="form-control" maxlength="100" required placeholder="นามสกุล" value="<?php echo $userDetail[0]['member_lname'] ?>">
                                  </div>
                                </div>

                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <textarea name="member_address" cols="30" rows="5" class="form-control no-resize" maxlength="500" placeholder="ที่อยู่" required><?php echo $userDetail[0]['member_address'] ?></textarea>
                                  </div>
                                </div>

                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <select name="province_id" class="form-control show-tick" required>
                                      <option value="">-- จังหวัด --</option>
                                      <?php foreach ($ProvinceList as $row): ?>
                                        <?php if ($userDetail[0]['province_id']==$row['province_id']): ?>
                                          <option value="<?php echo $row['province_id'] ?>" selected="selected"><?php echo $row['province_name'] ?></option>
                                        <?php else: ?>
                                          <option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_zipcode" class="form-control" maxlength="5" required placeholder="รหัสไปรษณีย์" value="<?php echo $userDetail[0]['member_zipcode'] ?>">
                                  </div>
                                </div>

                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_phone" class="form-control" required placeholder="เบอร์โทร" value="<?php echo $userDetail[0]['member_phone'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_email" class="form-control" required placeholder="อีเมล" value="<?php echo $userDetail[0]['member_email'] ?>">
                                  </div>
                                </div>

                          </div>
                        </div>


                                    <input type="hidden" name="member_id" value="<?php echo $userDetail[0]['member_id'] ?>">
                                    <button type="submit" class="btn waves-effectc btn-success">ยืนยันการแก้ไข</button>
                      <?php echo form_close(); ?>


                    </div>
                </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>
