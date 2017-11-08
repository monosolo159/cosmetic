  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              ข้อความ
                          </h2>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>วันที่</th>
                              <th>หัวข้อ</th>
                              <th>ชื่อผู้ส่ง</th>
                              <th>อีเมล</th>
                              <!-- <th>contact_detail</th> -->
                              <th>เบอร์โทร</th>
                              <th>เพิ่มเติม</th>

                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($contactList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['contact_date']; ?></td>
                                  <td><?php echo $row['contact_subject']; ?></td>
                                  <td><?php echo $row['contact_fullname']; ?></td>
                                  <td><?php echo $row['contact_email']; ?></td>
                                  <!-- <td><?php echo $row['contact_detail']; ?></td> -->
                                  <td><?php echo $row['contact_tel']; ?></td>
                                  <td>
                                    <a class="btn btn-xs waves-effect btn-info" href="<?php echo site_url('Contact/contactDetail/'.$row['contact_id']); ?>"><i class="material-icons">search</i></a>
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
