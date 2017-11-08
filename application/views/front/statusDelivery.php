<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
        <div class="header">
            <h2>รายการจัดส่ง</h2>
        </div>
        <div class="body">
            <div class="row">

              <div class="form-group">
                <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <td>คำสั่งซื้อ</td>
                      <td>วันที่</td>
                      <td>หมายเลขจัดส่ง</td>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($deliveryStatus as $row): ?>

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
<!-- #END# Task Info -->
