<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="card">
    <div class="header">
      <h2>คำสั่งซื้อ [<?php echo $order[0]['order_id'] ?>]</h2>
    </div>
    <div class="body">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <h3>คำสั่งซื้อ #<?php echo $order[0]['order_id']; ?></h3>
          </div>
          <div class="row">
            <h4><?php echo $order[0]['order_status_name']; ?></h4>
          </div>
          <div class="row">
            <?php echo $order[0]['delivery_name']; ?>
          </div>
          <div class="row">
            <?php echo $order[0]['payment_type_name']; ?>
          </div>
        </div>

        <div class="col-md-6" style="text-align: right">
          <div class="row">
             <h4>จัดส่งถึง</h4>
          </div>
          <div class="row">
            <?php echo $order[0]['member_fname']; ?> <?php echo $order[0]['member_lname']; ?>
          </div>
          <div class="row">
            <?php echo $order[0]['member_address']; ?>
          </div>
          <div class="row">
            <?php echo $order[0]['province_name']; ?> <?php echo $order[0]['member_zipcode']; ?>
          </div>
          <div class="row">

          </div>
        </div>
      </div>
      <div class="row">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr>
              <td >รหิสสินค้า</td>
              <td >ชื่อสินค้า</td>
              <td >ราคา</td>
              <td >จำนวน</td>
              <td >ราคารวม</td>

            </tr>
            <?php
            $sumlist = 0;
            $Total = 0;
            $SumTotal = 0;
            ?>

            <?php foreach ($order_list as $row): ?>
              <tr>
                <td ><?php echo $row['product_id']; ?></td>
                <td ><?php echo $row['product_name']; ?></td>
                <td ><?php echo $row['order_list_price']; ?></td>
                <td ><?php echo $row['order_list_value']; ?></td>
                <?php
                  $sumlist = $row['order_list_price']*$row['order_list_value'];
                  $Total += $sumlist;
                ?>
                <td ><?php echo number_format($sumlist,2); ?></td>

              </tr>
            <?php endforeach; ?>

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>รวม</td>
              <td><?php echo number_format($Total,2);?></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td colspan="2"><?php echo $order[0]['delivery_name'] ?></td>
                <td>
                  <?php
                    echo $order[0]['delivery_amount'];
                    $SumTotal += $Total+($order[0]['delivery_amount']*1);
                  ?>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>รวมสุทธิ</td>
                <td><?php echo number_format($SumTotal,2);?></td>
              </tr>
            </table>
          </div>
      </div>




      </div>
    </div>
  </div>
  <!-- #END# Task Info -->
