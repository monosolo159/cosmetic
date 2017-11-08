  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>เพิ่มสมาชิก
                          <?php
                            if($this->uri->segment(3)=="success"){
                              echo "<p class='col-green font-bold'>สมัครสมาชิกสำเร็จ โปรดเข้าสู่ระบบ</p>";
                            }else if($this->uri->segment(3)=="fail"){
                              echo "<p class='col-red font-bold'>สมัครสมาชิกไม่สำเร็จ</p>";
                            }
                          ?>
                    </h2>
                    </div>
                    <div class="body">
                      <?php echo form_open('/Member/checkUserBack'); ?>
                      <div class="row">

                          <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <?php if (empty($checkUser[0]['member_id'])): ?>
                                      <?php if (empty($new_member['member_username'])): ?>
                                        <input type="text" name="member_username" class="form-control" required placeholder="Username">
                                      <?php else: ?>
                                        <input type="text" name="member_username" class="form-control" required readonly="readonly" placeholder="<?php echo $new_member['member_username'] ?>">
                                      <?php endif; ?>
                                    <?php else: ?>
                                      <input type="text" name="member_username" class="form-control" required placeholder="Username">
                                    <?php endif; ?>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <button type="submit" class="btn waves-effectc btn-success">ตรวจสอบ</button>
                                  </div>
                                </div>
                          </div>

                      </div>

                      <?php echo form_close(); ?>

                      <?php echo form_open('/Member/memberAdd'); ?>
                      <div class="row">
                        <div class="form-group">

                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="password" name="member_password" class="form-control" required placeholder="Password">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="password" name="member_password_confirm" class="form-control" required placeholder="password อีกครั้ง">
                                </div>
                              </div>

                        </div>
                      </div>

                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_fname" class="form-control" maxlength="100" required placeholder="ชื่อ">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_lname" class="form-control" maxlength="100" required placeholder="นามสกุล">
                                  </div>
                                </div>

                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <textarea name="member_address" cols="30" rows="5" class="form-control no-resize" maxlength="500" placeholder="ที่อยู่" required></textarea>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_birth_date" class="datepicker form-control" maxlength="10" required placeholder="วันเดือนปีเกิด 2017/05/30">
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
                                        <option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_zipcode" class="form-control" maxlength="5" required placeholder="รหัสไปรษณีย์">
                                  </div>
                                </div>

                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_phone" class="form-control" required placeholder="เบอร์โทร">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" name="member_email" class="form-control" required placeholder="อีเมล">
                                  </div>
                                </div>

                          </div>
                        </div>


                        <?php if (empty($checkUser[0]['member_id'])): ?>
                          <?php if (empty($new_member['member_username'])): ?>
                            <button type="submit" class="btn waves-effectc btn-success" disabled="disabled">เพิ่ม</button>
                          <?php else: ?>
                            <input type="hidden" name="member_username" value="<?php echo $new_member['member_username'] ?>">
                            <button type="submit" class="btn waves-effectc btn-success">เพิ่ม</button>
                          <?php endif; ?>
                        <?php else: ?>
                          <button type="submit" class="btn waves-effectc btn-success" disabled="disabled">เพิ่ม</button>
                        <?php endif; ?>


                      <?php echo form_close(); ?>
                    </div>
                </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>
