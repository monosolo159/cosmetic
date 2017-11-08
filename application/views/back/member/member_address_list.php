  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              จัดการที่อยู่จัดส่งสมาชิก
                          </h2>
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a left class="btn btn-success waves-effect pull-right" href="<?php echo site_url('Member/memberEditAddressInsert/'.$this->uri->segment(3)); ?>">เพิ่มที่อยู่จัดส่งสมาชิก</a>
                              </li>
                          </ul>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover">
                            <thead>
                              <tr>
                                <td>ชื่อ</td>
                                <td>นามสกุล</td>
                                <td>ที่อยู่</td>
                                <td>จังหวัด</td>
                                <td>รหัสไปรษณีย์</td>
                                <td>จัดการ</td>

                              </tr>
                            </thead>

                            <tbody>
                              <?php foreach ($address as $row): ?>

                                <tr>
                                  <td><?php echo $row['member_fname']; ?></td>
                                  <td><?php echo $row['member_lname']; ?></td>
                                  <td><?php echo $row['member_address']; ?></td>
                                  <td><?php echo $row['province_name']; ?></td>
                                  <td><?php echo $row['member_zipcode']; ?></td>
                                  <td>
                                    <!-- <a class="btn btn-xs waves-effect btn-warning" href="<?php echo site_url('Home/updateAddressForm/'.$row['mad_id']); ?>">แก้ไข</a>  -->
                                    <a class="btn btn-xs btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('member/deleteAddressBack/'.$row['mad_id'].'/'.$this->uri->segment(3)); ?>';}">ลบ</a>
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
