<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="card">
    <div class="header">
      <h2>ตะกร้า

      </h2>
    </div>
    <div class="body">
      <div class="row">
	
        <?php
        if(isset($_SESSION["strProductID"])){
          if(isset($_SESSION["intLine"]))
          {
            ?>
	
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <td >รหัสสินค้า</td>
                  <td >ชื่อสินค้า</td>
                  <td >ราคา</td>
                  <td >จำนวน</td>
                  <td >ราคารวม</td>
                  <td >ลบ</td>
                </tr>
                <?php
                $Total = 0;
                $SumTotal = 0;
		$i = 0;
                for($i;$i<=(int)$_SESSION["intLine"];$i++)
                {
		if(isset($_SESSION["strProductID"][$i])){
				
			
                  if($_SESSION["strProductID"][$i] != "")
                  {
                    $strSQL = $this->db->where('product_id',$_SESSION["strProductID"][$i])->get('product')->result_array();
                    $ProductSelect = $this->Productmodel->productSelect($_SESSION["strProductID"][$i]);


                    $Total = $_SESSION["strQty"][$i] * $strSQL[0]["product_price"];
                    $SumTotal = $SumTotal + $Total;

                    ?>
                    <tr>
                      <td><?php echo $_SESSION["strProductID"][$i];?></td>
                      <td><?php echo $strSQL[0]["product_name"];?></td>
                      <td><?php echo $strSQL[0]["product_price"];?></td>
                      <td>
                        <div class="row">
                          <?php echo form_open_multipart('/Home/updateqty',array('id'=>'form_advanced_validation')); ?>
                          <div class="col-md-5">
                            <input type="number" class="form-control" name="qty" required min="1" max="<?php echo number_format($ProductSelect[0]['stock']); ?>" value="<?php echo $_SESSION["strQty"][$i];?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            <input type="hidden" name="updateQtyId" value="<?php echo $i ?>">
                          </div>
                          <div class="col-md-2">
                            <button type="submit" class="btn btn-primary waves-effect">อัพเดท</button>
                          </div>
                          <?php echo form_close(); ?>
                        </div>
                      </td>
                      <td><?php echo number_format($Total,2);?></td>
                      <td><a href="<?php echo site_url('Home/delprodecucart/'.$i);?>" class="btn waves-effectc btn-danger">ลบ</a></td>
                    </tr>
                    <?php
                  }
                }
}
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>รวม</td>
                  <td><?php echo number_format($SumTotal,2);?></td>
                  <td>บาท</td>
                </tr>
              </table>
            </div>
            <div style="float:right">
              <br><br><a href="<?php echo site_url('Home/product'); ?>" class="btn waves-effectc btn-success">เลือกสินค้าอื่นๆ</a>
              <?php
              if($SumTotal > 0 && isset($_SESSION['MEMBER_ID']))
              {
                ?>
                <a href="<?php echo site_url('Home/checkout'); ?>" class="btn waves-effectc btn-success" >ยืนยันการสั่งซื้อ</a>
                <?php
              }else{
                ?>
                <a left class="btn waves-effectc btn-success" data-toggle="modal" data-target="#loginModal">ยืนยันการสั่งซื้อ</a>
              <?php } ?>
            </div>


            <?php
          }
          ?>

          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <!-- #END# Task Info -->
