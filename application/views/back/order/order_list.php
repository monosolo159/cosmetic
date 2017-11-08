  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              การชำระเงิน
                          </h2>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>เลขที่คำสั่งซื้อ</th>
                              <th>วันที่ทำรายการ</th>
                              <th>สถานะ</th>
                              <th>รายละเอียด</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($order as $row): ?>
              									<tr>
              	                  <td><?php echo $row['order_id']; ?></td>
                                  <td><?php echo $row['order_date']; ?></td>
                                  <td>

                                    <?php if ($row['order_status_id']=="1"): ?>
                                      <?php echo form_open('/Order/updateOrder'); ?>

                                      <select name="order_status_id" class="form-control show-tick" required>
                                        <option value="" disabled>-- สถานะ --</option>
                                        <?php foreach ($orderStatus as $key): ?>
                                          <?php if ($key['order_status_id']=="1"||$key['order_status_id']=="4"): ?>
                                            <?php if ($row['order_status_id']==$key['order_status_id']): ?>
                                              <option value="<?php echo $key['order_status_id'] ?>" selected="selected"><?php echo $key['order_status_name'] ?></option>
                                            <?php else: ?>
                                              <option value="<?php echo $key['order_status_id'] ?>"><?php echo $key['order_status_name'] ?></option>
                                            <?php endif; ?>
                                          <?php endif; ?>


                                        <?php endforeach; ?>
                                      </select>

                                      <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                      <input type="submit" class="btn waves-effectc btn-success" value="บันทึก">
                                      <?php echo form_close(); ?>
                                    <?php else: ?>
                                      <?php echo $row['order_status_name']; ?>
                                    <?php endif; ?>



                                  </td>
                                  <td>
                                    <a class="btn btn-xs waves-effect btn-info" href="<?php echo site_url('Order/orderDetail/'.$row['order_id']); ?>"><i class="material-icons">search</i></a>
                                  </td>
              	                </tr>
              								<?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>
