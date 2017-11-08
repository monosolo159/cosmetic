<!-- Task Info -->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
        <div class="header">
            <h2><?php echo $ProductSelect[0]['product_name'] ?></h2>
        </div>
        <div class="body">
          <div class="row">
          <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <!-- <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> -->
                  <?php $i = 0; ?>
                  <?php if(count($gallery)>0){ ?>
                    <?php foreach ($gallery as $row): ?>
                      <?php if($i == 0){ ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="active"></li>
                      <?php }else{ ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>"></li>
                      <?php } ?>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  <?php }else if(count($gallery)<1){ ?>
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <?php } ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <?php $j=0 ?>
                  <?php if(count($gallery)>0){ ?>
                    <?php foreach ($gallery as $item): ?>
                      <?php if($j==0){ ?>
                        <div class="item active">
                            <img style="width:100%" src="<?php echo base_url('assets/image/product/'.$item['product_image_name']); ?>" />
                        </div>
                      <?php }else{ ?>
                        <div class="item">
                            <img style="width:100%" src="<?php echo base_url('assets/image/product/'.$item['product_image_name']); ?>" />
                        </div>
                      <?php } ?>
                      <?php $j++; ?>
                    <?php endforeach; ?>
                  <?php }else if(count($gallery)<1){ ?>
                    <div class="item active">
                        <img style="width:100%" src="<?php echo base_url('assets/image/product/500x300.png') ?>" />
                    </div>
                  <?php } ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">ก่อนหน้า</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">ถัดไป</span>
                </a>
            </div>
          </div>
          <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <div class="row">
              <div class="col-md-4" style="text-align:right">
                หมวดหมู่ :
              </div>
              <div class="col-md-8">
                <?php echo $ProductSelect[0]['category_name'] ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4" style="text-align:right">
                ประเภท :
              </div>
              <div class="col-md-8">
                <?php echo $ProductSelect[0]['product_type_name'] ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4" style="text-align:right">
                ราคา :
              </div>
              <div class="col-md-8">
                <?php echo $ProductSelect[0]['product_price'] ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4" style="text-align:right">
                จำนวน :
              </div>
              <div class="col-md-8">
                <?php echo number_format($ProductSelect[0]['stock']) ?>
              </div>
            </div>



<?php echo form_open_multipart('/Home/orderAdd',array('id'=>'form_advanced_validation')); ?>
            <div class="row">
              <div class="col-md-4" style="text-align:right">
                จำนวน :
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="form-line">
                    <input type="number" class="form-control" name="qty" required min="1" max="<?php echo number_format($ProductSelect[0]['stock']); ?>" value="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4" style="text-align:right">
                <!-- สั่งซื้อ -->
              </div>
              <div class="col-md-8">
                <p>
                  <?php if ($ProductSelect[0]['stock']>0): ?>
                    <input type="hidden" name="product_id" value="<?php echo $ProductSelect[0]['product_id'] ?>">
                    <button type="submit" class="btn btn-primary waves-effect"><i class="material-icons">add_shopping_cart</i></button>
                  <?php else: ?>
                    <a class="btn btn-primary waves-effect" role="button" disabled><i class="material-icons">add_shopping_cart</i></a>
                  <?php endif; ?>
                </p>
                <?php if($this->uri->segment(4)=='error'){
                  echo "<p class='col-red font-bold'>ไม่สามารถเพิ่มสินค้าในตะกร้าได้ เนื่องจากจำนวนสินค้ามากกว่าในระบบ</p>";
                }  ?>
              </div>
            </div>

<?php echo form_close(); ?>


          </div>
        </div>

        <div class="row">
            <div class="col-md-12">
              <?php echo $ProductSelect[0]['product_detail'] ?>
            </div>

        </div>
      </div>
    </div>


</div>
<!-- #END# Task Info -->
