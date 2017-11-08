  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              บัญชีธนาคาร
                          </h2>
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a left class="btn btn-success waves-effect pull-right" href="<?php echo site_url('payment/bookbankAddForm'); ?>">เพิ่มบัญชีธนาคาร</a>
                              </li>
                          </ul>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>บัญชีธนาคาร</th>
                              <th>สาขา</th>
                              <th>ประเภท</th>
                              <th>เลขบัญชี</th>
                              <th>จัดการ</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($BookbankTypeList as $row): ?>
              									<tr>
              	                  <td><img width="30" src="<?php echo base_url('/assets/image/bookbank/'.$row['bank_image']); ?>"></td>
              	                  <td><?php echo $row['bank_name']; ?></td>
              										<td><?php echo $row['bank_subbank']; ?></td>
                                  <td><?php echo $row['bank_type']; ?></td>
                                  <td><?php echo $row['bank_book']; ?></td>
                                  <td>
                                      <a left class="btn btn-xs btn-success waves-effect" href="<?php echo site_url('payment/bookbankFormEdit/'.$row['bank_id']); ?>">แก้ไข</a>
                                      <a class="btn btn-xs btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('payment/bookbankFormDelete/'.$row['bank_id']); ?>';}">ลบ</a>
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
