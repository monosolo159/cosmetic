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
                              <th>ชื่อรูปแบบการชำระเงิน</th>
                              <th>สถานะ</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($PaymentTypeList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['payment_type_name']; ?></td>
              										<td>
                                    <?php if($row['payment_type_enable']==0){ ?>
                                      <a left class="btn btn-xs btn-danger waves-effect" href="<?php echo site_url('payment/enablePaymentType/'.$row['payment_type_id'].'/'.$row['payment_type_enable']); ?>">ปิดการใช้งาน</a>
                                    <?php }else if($row['payment_type_enable']==1){ ?>
                                      <a left class="btn btn-xs btn-success waves-effect" href="<?php echo site_url('payment/enablePaymentType/'.$row['payment_type_id'].'/'.$row['payment_type_enable']); ?>">เปิดการใช้งาน</a>
                                    <?php } ?>
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
