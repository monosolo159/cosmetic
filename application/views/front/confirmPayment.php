<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
        <div class="header">
            <h2>แจ้งการชำระเงิน
              <?php if($this->uri->segment(3)){
                echo "<p class='col-red font-bold'>การแจ้งชำระเงินของท่าน ถูกบันทึกแล้ว</p>";
              }  ?>
            </h2>
        </div>
        <div class="body">
            <div class="row">

              <div class="form-group">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                      <?php echo form_open_multipart('/Payment/confirmPayment',array('id'=>'form_advanced_validation')); ?>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                บัญชีที่โอน
                                <!-- <div class="demo-radio-button"> -->
                                  <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <td></td>
                                        <td></td>
                                        <td>ธนาคาร</td>
                                        <td>สาชา</td>
                                        <td>ประเภท</td>
                                        <td>เลขที่บัญชี</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($BookbankTypeList as $row): ?>
                                        <tr>
                                          <td><input name="bank_id" type="radio" id="<?php echo $row['bank_id'] ?>" value="<?php echo $row['bank_id'] ?>" class="with-gap radio-col-green" />
                                          <label for="<?php echo $row['bank_id'] ?>"></label></td>
                                          <td><img width="30" src="<?php echo base_url('/assets/image/bookbank/'.$row['bank_image']); ?>"></td>
                      	                  <td><?php echo $row['bank_name']; ?></td>
                      										<td><?php echo $row['bank_subbank']; ?></td>
                                          <td><?php echo $row['bank_type']; ?></td>
                                          <td><?php echo $row['bank_book']; ?></td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                <!-- </div> -->
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- <div class="form-line"> -->
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <select class="form-control show-tick" name="year" required>
                                    <option selected="selected" disabled value="">ปี</option>
                                    <?php for($iy=(date("Y")-10);$iy<=date("Y");$iy++){ ?>
                                      <option value="<?php echo $iy ?>"><?php echo $iy ?></option>
                                    <?php } ?>
                                  </select>
                                </div>


                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <?php $month=array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'); ?>
                                    <select class="form-control show-tick" name="month" required>
    																	<option selected="selected" disabled value="">เดือน</option>
                                      <?php $index = 1; ?>
                                      <?php foreach ($month as $m): ?>
                                        <option value="<?php echo $index ?>"><?php echo $m ?></option>
                                        <?php $index++; ?>
                                      <?php endforeach; ?>
    																</select>
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    																<select class="form-control show-tick" name="day" required>
    																	<option selected="selected" disabled value="">วันที่</option>
    																	<?php for($id=1;$id<=31;$id++){ ?>
    																		<option value="<?php echo $id ?>"><?php echo $id ?></option>
    																	<?php } ?>
    																</select>
                                  </div>
    														<!-- </div> -->
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <select class="form-control show-tick" name="timeh" required>
                                    <option selected="selected" disabled value="">เวลา(ชั่วโมง)</option>
                                    <?php for($ih=1;$ih<=24;$ih++){ ?>
                                      <option value="<?php echo $ih ?>"><?php echo $ih ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <select class="form-control show-tick" name="timem" required>
                                    <option selected="selected" disabled value="">เวลา(นาที)</option>
                                    <?php for($im=1;$im<=60;$im++){ ?>
                                      <option value="<?php echo $im ?>"><?php echo $im ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                  <div class="form-line">
                                    <input type="number" name="payment_amount" class="form-control" required placeholder="จำนวนเงิน">
                                  </div>
                                  </div>
                              </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <div class="form-line">
                                  <input type="text" name="order_id" class="form-control" required placeholder="รหัสใบสั่งซื้อ">
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <div class="form-line">
                                  <input type="file" class="form-control" name="imgfiles" multiple required >
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>

                      <div class="row" style="text-align:center;">
                        <button type="submit" class="btn waves-effectc btn-success">แจ้งชำระเงิน</button>
                      </div>

                      <?php echo form_close(); ?>
                    </div>

              </div>

            </div>
        </div>
</div>
<!-- #END# Task Info -->
