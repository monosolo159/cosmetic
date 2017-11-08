  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              รายการจัดส่ง
                          </h2>
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a left class="btn btn-success waves-effect pull-right" href="<?php echo site_url('Delivery/addDeliveryStatusForm'); ?>">เพิ่มรายการจัดส่ง</a>
                              </li>
                          </ul>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>รหัสรายการจัดส่ง</th>
                              <th>คำสั่งซื้อ</th>
                              <!-- <th>สมาชิก</th> -->
                              <th>วันที่จัดส่ง</th>
                              <th>หมายเลขจัดส่ง</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($deliveryStatus as $row): ?>
              									<tr>
              	                  <td><?php echo $row['delivery_status_id']; ?></td>
                                  <!-- <td><?php echo $row['member_fname'].' '.$row['member_lname']; ?></td> -->
                                  <td><a href="<?php echo site_url('Order/orderDetail/'.$row['order_id']); ?>">#<?php echo $row['order_id'] ?></a></td>
                                  <td><?php echo $row['delivery_status_date']; ?></td>
                                  <td><?php echo $row['delivery_status_detail']; ?></td>
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
