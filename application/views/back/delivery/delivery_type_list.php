  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              รูปแบบการจัดส่ง
                          </h2>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>ชื่อรูปแบบการจัดส่ง</th>
                              <th>ราคา</th>
                              <th>สถานะ</th>
                              <th>จัดการ</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($DeliveryTypeList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['delivery_name']; ?></td>
                                  <td><?php echo $row['delivery_amount']; ?></td>
              										<td>
                                    <?php if($row['delivery_enable']==0){ ?>
                                      <a left class="btn btn-xs btn-danger waves-effect" href="<?php echo site_url('delivery/enableDeliveryType/'.$row['delivery_id'].'/'.$row['delivery_enable']); ?>">ปิดการใช้งาน</a>
                                    <?php }else if($row['delivery_enable']==1){ ?>
                                      <a left class="btn btn-xs btn-success waves-effect" href="<?php echo site_url('delivery/enableDeliveryType/'.$row['delivery_id'].'/'.$row['delivery_enable']); ?>">เปิดการใช้งาน</a>
                                    <?php } ?>
                                  </td>
                                  <td><a left class="btn btn-xs btn-warning waves-effect" href="<?php echo site_url('delivery/deliveryTypeEditForm/'.$row['delivery_id']); ?>">แก้ไขราคา</a></td>

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
