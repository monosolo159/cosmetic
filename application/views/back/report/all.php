  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              รายงานการขาย
                              <?php if (isset($input)): ?>
                                ตั้งแต่วันที่ <?php echo $input['date_start'] ?> ถึงวันที่ <?php echo $input['date_end'] ?>
                              <?php endif; ?>

                          </h2>

                      </div>
                      <div class="body">
                        <?php echo form_open('/Report/viewall'); ?>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                      ตั้งแต่วันที่
                                        <!-- <input type="text" name="date_start" class="datepicker form-control" placeholder="2017/01/30"> -->
                                        <input type="text" name="date_start" class="datepicker form-control" maxlength="10" required placeholder="2017/05/30">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                      ถึงวันที่
                                        <!-- <input type="text" name="date_end" class="datepicker form-control" placeholder="2017/03/31"> -->
                                        <input type="text" name="date_end" class="datepicker form-control" maxlength="10" required placeholder="2017/05/30">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <button type="submit" class="btn waves-effectc btn-success" large>ดูรายงาน</button>
                                </div>
                            </div>

                        </div>
                        <?php echo form_close(); ?>


                      </div>
                  </div>

                  <?php if (isset($input)): ?>

                    <div class="card">
                        <div class="header">
                            <h2>
                              สินค้าขายดี
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button class="btn btn-success waves-effect pull-right" onclick="myPrint()">พิมพ์</button>
                                    <script>
                                      function myPrint() {
                                          window.open('<?php echo site_url('Report/printReport/'.($input['date_start']).'/'.$input['date_end']) ?>','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no');
                                      }
                                    </script>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                          <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                              <th>รหัส</th>
                              <th>ชื่อสินค้า</th>
                              <th>หมวดหมู่สินค้า</th>
                              <th>จำนวน</th>
                              <th>ราคา</th>
                            </tr>
                            </thead>
                              <tbody>
                                <?php $allprice=0; ?>
              								<?php foreach ($productOrderList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['product_id']; ?></td>
              	                  <td><?php echo $row['product_name']; ?></td>
              										<td><?php echo $row['category_name']; ?></td>
              	                  <td><?php echo number_format($row['stock']) ?></td>
                                  <?php $allprice=$allprice+($row['price']*$row['stock']); ?>
              	                  <td><?php echo number_format( $row['price']*$row['stock'] , 2 ); ?></td>

              	                </tr>
              								<?php endforeach; ?>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>รวม</td>
                                <td><?php echo number_format( $allprice , 2 ); ?></td>

                              </tr>
                              </tbody>
                          </table>
                        </div>
                    </div>
                  <?php endif; ?>




              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>
