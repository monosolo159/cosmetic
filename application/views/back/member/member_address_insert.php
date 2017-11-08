  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>เพิ่มที่อยู่</h2>
                    </div>
                    <div class="body">
                        <div class="row">

                          <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <?php echo form_open_multipart('/Member/addAddressBack',array('id'=>'form_advanced_validation')); ?>
                                  <div class="row">
                                    <div class="form-group">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                              <input type="text" name="member_fname" class="form-control" required placeholder="ชื่อ">
                                            </div>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                              <input type="text" name="member_lname" class="form-control" required placeholder="สกุล">
                                            </div>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                              <textarea name="member_address" cols="30" rows="5" class="form-control no-resize" maxlength="5000" placeholder="ที่อยู่" required></textarea>
                                            </div>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group">
                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="province_id" required>
                                                  <option selected="selected" disabled value="">--จังหวัด--</option>
                                                  <?php foreach ($Province as $row): ?>
                                                    <option value="<?php echo $row['province_id'] ?>"><?php echo $row['province_name'] ?></option>
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
                                              <input type="text" name="member_zipcode" class="form-control" maxlength="5" required placeholder="รหัสไปรษณีย์">
                                            </div>
                                          </div>
                                    </div>
                                  </div>
                                  <div class="row" style="text-align:center;">
                                    <input type="hidden" name="member_id" value="<?php echo $this->uri->segment(3); ?>">
                                    <button type="submit" class="btn waves-effectc btn-success">ส่ง</button>
                                  </div>

                                  <?php echo form_close(); ?>
                                </div>



                          </div>

                        </div>
                    </div>
            </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>
