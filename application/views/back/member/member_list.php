  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              จัดการสมาชิก
                          </h2>
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a left class="btn btn-success waves-effect pull-right" href="<?php echo site_url('Member/memberAddForm'); ?>">เพิ่มสมาชิก</a>
                              </li>
                          </ul>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>รหัสสมาชิก</th>
                              <th>ชื่อ - สกุล</th>
                              <th>วันเดือนปีเกิด</th>
                              <th>ที่อยู่</th>
                              <th>เบอร์โทร</th>
                              <th>อีเมล</th>
                              <th>จัดการ</th>

                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($memberList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['member_id']; ?></td>
                                  <td><?php echo $row['member_fname'].' '.$row['member_lname']; ?></td>
                                  <td><?php echo $row['member_birth_date']; ?></td>
                                  <td><?php echo $row['member_address'].' จังหวัด'.$row['province_name'].' '.$row['member_zipcode']; ?></td>
                                  <td><?php echo $row['member_phone']; ?></td>
                                  <td><?php echo $row['member_email']; ?></td>

                                  <td>
                                    <!-- <a class="btn btn-xs waves-effect btn-info" href="<?php echo site_url('Member/memberrDetail/'.$row['member_id']); ?>"><i class="material-icons">search</i></a> -->
                                    <a class="btn btn-xs waves-effect btn-warning" href="<?php echo site_url('Member/memberEdit/'.$row['member_id']); ?>"><i class="material-icons">edit</i></a>
                                    <a class="btn btn-xs waves-effect btn-warning" href="<?php echo site_url('Member/memberEditPass/'.$row['member_id']); ?>"><i class="material-icons">enhanced_encryption</i></a>
                                    <a class="btn btn-xs waves-effect btn-warning" href="<?php echo site_url('Member/memberEditAddressList/'.$row['member_id']); ?>"><i class="material-icons">directions_car</i></a>


                                    <a class="btn btn-xs btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('Member/memberDelete/'.$row['member_id']); ?>';}"><i class="material-icons">delete</i></a>
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
