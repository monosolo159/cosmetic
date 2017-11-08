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
                              <th>เลขที่ชำระเงิน</th>
                              <th>เลขที่ใบสั่งซื้อ</th>
                              <th>จำนวนเงินที่ต้องชำระ</th>
                              <th>จำนวนเงินที่ชำระ</th>
                              <th>วันที่</th>
                              <th>สลิป</th>
                              <th>จัดการ</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($PaymentList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['payment_id']; ?></td>
                                  <td><?php echo $row['order_id']; ?></td>
                                  <td><?php echo $row['order_list_price_all']; ?></td>
                                  <td><?php echo $row['payment_amount']; ?></td>
                                  <td><?php echo $row['payment_date']; ?></td>
                                  <td>
                                    <button class="btn btn-success waves-effect" onclick="viewSlip(<?php echo $row['payment_id']; ?>)"><i class="material-icons">search</i></button>

                                    <script>
                                      function viewSlip(pid) {
                                          window.open('<?php echo site_url('Payment/viewSlip/') ?>'+pid,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no');
                                      }
                                    </script>
                                  </td>
                                  <td>
                                    <?php if ($row['order_id']!=""): ?>
                                      <?php if ($row['payment_status']=="0"): ?>
                                        <a left class="btn btn-xs btn-danger waves-effect" href="<?php echo site_url('payment/paymentConfirmOrder/'.$row['order_id'].'/'.$row['payment_id']); ?>">ยืนยันการชำระเงิน</a>
                                      <?php else: ?>
                                        <a left class="btn btn-xs btn-success waves-effect" disabled >ชำระเงินแล้ว</a>
                                      <?php endif; ?>
                                    <?php else: ?>
                                      <a left class="btn btn-xs btn-warning waves-effect" disabled >ไม่พบเลขที่ใบสั่งซื้อ</a>
                                    <?php endif; ?>

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
