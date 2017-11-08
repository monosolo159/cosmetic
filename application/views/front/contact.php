<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
        <div class="header">
            <h2>ติดต่อร้านค้า
              <?php if($this->uri->segment(3)){
              echo "<p class='col-red font-bold'>ข้อมูลของท่าน ถูกบันทึกแล้ว</p>";
            }  ?>
          </h2>
        </div>
        <div class="body">
            <div class="row">

              <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <?php echo form_open_multipart('/Contact/addContact',array('id'=>'form_advanced_validation')); ?>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="contact_fullname" class="form-control" required placeholder="ชื่อ-สกุล">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="contact_email" class="form-control" required placeholder="อีเมล">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="contact_tel" class="form-control" required placeholder="เบอร์โทร">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <input type="text" name="contact_subject" class="form-control" required placeholder="เรื่อง">
                                </div>
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-line">
                                  <textarea name="contact_detail" cols="30" rows="5" class="form-control no-resize" maxlength="5000" placeholder="ข้อความ" required></textarea>
                                </div>
                              </div>
                        </div>
                      </div>

                      <div class="row" style="text-align:center;">
                        <button type="submit" class="btn waves-effectc btn-success">ส่ง</button>
                      </div>

                      <?php echo form_close(); ?>
                    </div>



                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="row">
                        <div class="col-md-4" style="text-align:right">
                          ร้านค้า :
                        </div>
                        <div class="col-md-8">
                          ร้านโสมมะนาว
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4" style="text-align:right">
                          ที่อยู่ :
                        </div>
                        <div class="col-md-8">
                          29 หมู่ 3 ต.วังยาง อ.พรรณานิคม จังหวัดสกลนคร 47130
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4" style="text-align:right">
                          เบอร์โทร :
                        </div>
                        <div class="col-md-8">
                          093-3374795
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4" style="text-align:right">
                          อีเมล :
                        </div>
                        <div class="col-md-8">
                          siriyakorm.sr@57.snru.ac.th
                        </div>
                      </div>
                    </div>

              </div>

            </div>
        </div>
</div>
<!-- #END# Task Info -->
