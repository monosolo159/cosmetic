<section class="content">
  <div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2>แก้ไขข้อมูลส่วนตัว</h2>
          </div>
          <div class="body">


            <?php echo form_open('/Member/updateUserBack'); ?>
    <div class="row">
      <div class="form-group">

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="form-line">
            <input type="password" name="member_password" class="form-control" required placeholder="Password">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="form-line">
            <input type="password" name="member_password_confirm" class="form-control" required placeholder="password อีกครั้ง">
          </div>
        </div>

      </div>
    </div>

    <input type="hidden" name="member_id" value="<?php echo $userDetail[0]['member_id'] ?>">
    <button type="submit" class="btn waves-effectc btn-success">ยืนยันการแก้ไข</button>
    <?php echo form_close(); ?>


  </div>
</div>
</div>
</div>
<!-- #END# Exportable Table -->
</div>
</section>
