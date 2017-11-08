<!-- Task Info -->
<?php if (!isset($_SESSION['MEMBER_ID'])) {
			redirect('Home');
		}?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
        <!-- <div class="header">
            <h2>ข้อมูลส่วนตัว</h2>
        </div> -->
        <div class="body">
          <ul class="nav nav-tabs tab-nav-right" role="tablist">
              <li role="presentation" <?php if($this->uri->segment(3)=="member" || ($this->uri->segment(3)!="address" && $this->uri->segment(3)!="order")){echo "class='active'";} ?>><a href="#profile" data-toggle="tab">ข้อมูลส่วนตัว</a></li>
              <li role="presentation" <?php if($this->uri->segment(3)=="address"){echo "class='active'";} ?>><a href="#address" data-toggle="tab">ที่อยู่ในการจัดส่ง</a></li>
              <li role="presentation" <?php if($this->uri->segment(3)=="order"){echo "class='active'";} ?>><a href="#order" data-toggle="tab">คำสั่งซื้อ</a></li>
							<li role="presentation" <?php if($this->uri->segment(3)=="delivery"){echo "class='active'";} ?>><a href="#delivery" data-toggle="tab">รายการจัดส่ง</a></li>

          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in <?php if($this->uri->segment(3)=="member" || ($this->uri->segment(3)!="address" && $this->uri->segment(3)!="order")){echo "active";} ?>" id="profile">
                  ชื่อ - นามสกุล : <?php echo $userDetail[0]['member_fname'].' '.$userDetail[0]['member_lname'] ?><br>
                  วันเดือนปีเกิด : <?php echo $userDetail[0]['member_birth_date'] ?><br>
                  ที่อยู่ : <?php echo $userDetail[0]['member_address'] ?><br>
                  จังหวัดู่ : <?php echo $userDetail[0]['province_name'] ?><br>
                  รหัสไปรษณีย์ : <?php echo $userDetail[0]['member_zipcode'] ?><br>
                  เบอร์โทร : <?php echo $userDetail[0]['member_phone'] ?><br>
                  อีเมล : <?php echo $userDetail[0]['member_email'] ?>

                  <?php echo form_open('/Member/selectUser'); ?>
                                <input type="hidden" name="member_username" value="<?php echo $userDetail[0]['member_id'] ?>">
                                <button type="submit" class="btn waves-effectc btn-success">แก้ไข</button>
                  <?php echo form_close(); ?>
              </div>
              <div role="tabpanel" class="tab-pane fade in <?php if($this->uri->segment(3)=="address"){echo "active";} ?>" id="address">

								<a href="<?php echo site_url('Home/addAddressForm'); ?>" class="btn waves-effectc btn-success">เพิ่มที่อยู่</a>
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
													<td><a class="btn btn-xs waves-effect btn-warning" href="<?php echo site_url('Home/updateAddressForm/'.$row['mad_id']); ?>">แก้ไข</a> <a class="btn btn-xs btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('member/deleteAddress/'.$row['mad_id']); ?>';}">ลบ</a>
</td>

		                    </tr>
		                  <?php endforeach; ?>

		                </tbody>
		              </table>

              </div>
              <div role="tabpanel" class="tab-pane fade in <?php if($this->uri->segment(3)=="order"){echo "active";} ?>" id="order">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<td>คำสั่งซื้อ</td>
											<td>วันที่</td>
											<td>สถานะ</td>
											<td>รายละเอียด</td>
										</tr>
									</thead>

									<tbody>
										<?php foreach ($order as $row): ?>

											<tr>
												<td><?php echo $row['order_id']; ?></td>
												<td><?php echo $row['order_date']; ?></td>
												<td><?php echo $row['order_status_name']; ?></td>
												<td><a class="btn btn-xs waves-effect btn-info" href="<?php echo site_url('Home/orderMember/'.$row['order_id']); ?>"><i class="material-icons">search</i></a></td>
											</tr>
										<?php endforeach; ?>

									</tbody>
								</table>
              </div>

							<div role="tabpanel" class="tab-pane fade in <?php if($this->uri->segment(3)=="delivery"){echo "active";} ?>" id="delivery">

								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<td>คำสั่งซื้อ</td>
											<td>วันที่</td>
											<td>หมายเลขจัดส่ง</td>
										</tr>
									</thead>

									<tbody>
										<?php foreach ($deliveryMember as $row): ?>

											<tr>
												<td><?php echo $row['order_id']; ?></td>
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
</div>
<!-- #END# Task Info -->
