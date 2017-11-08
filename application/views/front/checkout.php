<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="card">
      <div class="header">
          <h2>ยืนยันการสั่งซื้อ</h2>

      </div>
      <script type="text/javascript">
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function myFunction() {
            var df = document.getElementsByName('delivery_id');
            var pname = document.getElementsByName('deliname');
            var pamount = document.getElementsByName('deliamount');
            var totalproductprice = document.getElementsByName('totalproductprice');
            var sumall="";
            var xxxx = totalproductprice[0].textContent;

            for(var i=0;i<df.length;i++){
              if(df[i].checked == true){
                var t = xxxx.split(",");  //ถ้าเจอวรรคแตกเก็บลง array t
                for(var x=0; x<t.length ; x++){
                	// document.write(t[i]+"<br/>");
                  sumall += t[x]+"";
                }
                console.log(pname[i].textContent);
                console.log(sumall);
                document.getElementById("deli").innerHTML = pamount[i].textContent;
                document.getElementById("delinameout").innerHTML = pname[i].textContent;
                document.getElementById("total").innerHTML = numberWithCommas(sumall*1 + pamount[i].textContent*1)+".00";
              }
            }
        }
      </script>
      <div class="body">
          <?php echo form_open('/Order/confirmOrder',array('id'=>'form_advanced_validation')); ?>

          <h3>ที่อยู่ในการจัดส่ง</h3>

            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <td></td>
                    <td>ชื่อ</td>
                    <td>นามสกุล</td>
                    <td>ที่อยู่</td>
                    <td>จังหวัด</td>
                    <td>รหัสไปรษณีย์</td>

                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($addressList as $row): ?>

                    <tr>
                      <td><input name="mad_id" type="radio" id="m<?php echo $row['mad_id'] ?>" value="<?php echo $row['mad_id'] ?>" class="with-gap radio-col-green" required/>
                      <label for="m<?php echo $row['mad_id'] ?>"></label></td>
                      <td><p name="member_fname"><?php echo $row['member_fname']; ?></p></td>
                      <td><p name="member_lname"><?php echo $row['member_lname']; ?></p></td>
                      <td><p name="member_address"><?php echo $row['member_address']; ?></p></td>
                      <td><p name="province_name"><?php echo $row['province_name']; ?></p></td>
                      <td><p name="member_zipcode"><?php echo $row['member_zipcode']; ?></p></td>

                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>

              <div style="float:right">
                <a href="<?php echo site_url('Home/addAddressForm'); ?>" type="btuuon" class="btn waves-effectc btn-success">เพิ่มที่อยู่ในการจัดส่ง</a>

              </div>
            </div>

              <h3>รูปแบบการชำระเงิน</h3>
                <?php
                if(isset($_SESSION["strProductID"])){
                  if(isset($_SESSION["intLine"]))
                  {
                    ?>
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <td></td>
                            <td>ธนาคาร</td>
                            <td>สาชา</td>
                            <td>ประเภท</td>
                            <td>เลขที่บัญชี</td>
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
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>

                      <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                          <tbody>
                            <?php foreach ($PaymentTypeList as $row): ?>

                              <tr>
                                <td><input name="payment_type_id" type="radio" id="p<?php echo $row['payment_type_id'] ?>" value="<?php echo $row['payment_type_id'] ?>" class="with-gap radio-col-green" required/>
                                <label for="p<?php echo $row['payment_type_id'] ?>"></label></td>
                                <td><?php echo $row['payment_type_name']; ?></td>
                              </tr>
                            <?php endforeach; ?>

                          </tbody>
                        </table>
                      </div>

                  <?php } ?>
                <?php } ?>

              <h3>รูปแบบการจัดส่ง</h3>

                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                    <tbody>
                      <?php foreach ($deliveryTypeList as $row): ?>

                        <tr>
                          <td><input name="delivery_id" type="radio" id="d<?php echo $row['delivery_id'] ?>" value="<?php echo $row['delivery_id'] ?>" class="with-gap radio-col-green" required onchange="myFunction()"/>
                          <label for="d<?php echo $row['delivery_id'] ?>"></label></td>
                          <td><p name="deliname"><?php echo $row['delivery_name']; ?></p></td>
                          <td><p name="deliamount"><?php echo $row['delivery_amount']; ?></p></td>

                        </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>


              <h3>สรุปการสั่งซื้อ</h3>

                <?php
                if(isset($_SESSION["strProductID"])){
                  if(isset($_SESSION["intLine"]))
                  {
                    ?>

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
                        $Total = 0;
                        $SumTotal = 0;

                        for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                        {
                          if(isset($_SESSION["strProductID"][$i])){
                            if($_SESSION["strProductID"][$i] != "")
                            {
                              $strSQL = $this->db->where('product_id',$_SESSION["strProductID"][$i])->get('product')->result_array();

                              $Total = $_SESSION["strQty"][$i] * $strSQL[0]["product_price"];
                              $SumTotal = $SumTotal + $Total;

                              ?>
                              <tr>
                                <td><?php echo $_SESSION["strProductID"][$i];?></td>
                                <td><?php echo $strSQL[0]["product_name"];?></td>
                                <td><?php echo $strSQL[0]["product_price"];?></td>
                                <td><?php echo $_SESSION["strQty"][$i];?></td>
                                <td><?php echo number_format($Total,2);?></td>
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
                          <td><p name="totalproductprice" id="totalproductprice"><?php echo number_format($SumTotal,2);?></p></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td colspan="2"><p name="delinameout" id="delinameout"></td>
                          <td>
                            <p name="deli" id="deli"></p>
                          </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>รวมสุทธิ</td>
                          <td><p name="total" id="total"></p></td>
                        </tr>
                      </table>
                      <div style="float:right">
                        <button type="submit" class="btn waves-effectc btn-success">ยืนยันการสั่งซื้อ</button>

                      </div>
                    </div>
                    <?php
                  }
                  ?>

                  <?php
                }
                ?>

          <?php echo form_close(); ?>

      </div>
  </div>
</div>
  <!-- #END# Task Info -->
