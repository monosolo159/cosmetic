<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
  <div class="card">
    <div class="header">
      <h2>สินค้า</h2>
      <ul class="header-dropdown m-r--5">
        <li class="dropdown">
          <div class="row">
            <?php echo form_open('/Home/search'); ?>
            <div class="col-md-8">
              <input type="text" class="form-control pull-right" name="product_name" maxlength="500" placeholder="ชื่อสินค้า">
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-success waves-effect pull-left">ค้นหา</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </li>
      </ul>
    </div>
    <div class="body">
      <div class="row">

        <?php if (!empty($typeList)) { ?>
          <?php foreach ($typeList as $trow): ?>
            <?php if ($this->uri->segment(2)=='selectCategory'): ?>
              <?php $checkNull = $this->db->where('product_type_id',$trow['product_type_id'])->where('category_id',$this->uri->segment(3))->get('product')->result_array(); ?>

            <?php elseif($this->uri->segment(2)=='product'): ?>
              <?php $checkNull = $this->db->where('product_type_id',$trow['product_type_id'])->get('product')->result_array(); ?>

            <?php endif; ?>

              <?php if (count($checkNull)>0): ?>
                <div class="card">
                  <div class="header bg-light-green">
                    <h2>
                      <?php echo $trow['product_type_name'] ?>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                      <li class="dropdown">
                        <a href="<?php echo site_url('Home/productTypeList/'.$trow['product_type_id']); ?>" class="btn btn-success waves-effect pull-left">
                          ดูทั้งหมด
                        </a>
                      </li>
                    </ul>

                  </div>
                  <div class="body">

                    <div class="row">
                      <?php if (!empty($ProductList)) { ?>
                        <?php $count4 = 0;  ?>
                        <?php foreach ($ProductList as $row): ?>

                          <?php if ($trow['product_type_id'] == $row['product_type_id']): ?>
                            <?php if ($count4<4): ?>
                              <div class="col-sm-6 col-md-3" >
                                <a href="<?php echo site_url('Home/productDetail/'.$row['product_id']); ?>">
                                  <div class="thumbnail" style="text-align:center;height:370px">
                                    <?php $c=0; ?>


                                    <?php foreach ($gallery as $item): ?>
                                      <?php if ($row['product_id']==$item['product_id']): ?>
                                        <img src="<?php echo base_url('assets/image/product/'.$item['product_image_name']) ?>">
                                        <?php $c=1; break; endif; ?>
                                      <?php endforeach; ?>

                                      <?php if ($c==0): ?>
                                        <img src="<?php echo base_url('assets/image/product/500x300.png') ?>">
                                      <?php endif; ?>

                                      <div class="caption">
                                        <h3><p class="ellipsis" style="white-space: nowrap; overflow: hidden;text-overflow:ellipsis;"><?php echo $row['product_name']; ?></p></h3>
                                        <p style="text-align:left">
                                          <?php
                                          $string = strip_tags($row['product_detail']);
                                          if (strlen($string) > 300) {
                                            $stringCut = substr($string, 0, 300);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....';
                                          }
                                          echo $string;
                                          ?>
                                        </p>
                                        <p>จำนวน : <?php echo number_format($row['stock']) ?></p>
                                        <p>ราคา : <?php echo number_format( $row['product_price'] , 2 ); ?></p>
                                      </div>

                                    </div>
                                  </a>
                                </div>

                                <?php $count4++; ?>

                              <?php endif; ?>

                            <?php endif; ?>

                          <?php endforeach; ?>


                        <?php }else{ ?>
                          <center><h2>ไม่พบสินค้า</h2></center>
                        <?php } ?>
                      </div>

                    </div>
                  </div>
              <?php endif; ?>
            <?php endforeach; ?>

          <?php }else{ ?>
            <center><h2>ไม่พบสินค้า</h2></center>
          <?php } ?>


          <!-- <?php if (!empty($ProductList)) { ?>
          <?php foreach ($ProductList as $row): ?>
          <div class="col-sm-6 col-md-3" >
          <a href="<?php echo site_url('Home/productDetail/'.$row['product_id']); ?>">
          <div class="thumbnail" style="text-align:center;height:370px">
          <?php $c=0; ?>


          <?php foreach ($gallery as $item): ?>
          <?php if ($row['product_id']==$item['product_id']): ?>
          <img src="<?php echo base_url('assets/image/product/'.$item['product_image_name']) ?>">
          <?php $c=1; break; endif; ?>
        <?php endforeach; ?>

        <?php if ($c==0): ?>
        <img src="<?php echo base_url('assets/image/product/500x300.png') ?>">
      <?php endif; ?>

      <div class="caption">
      <h3><p class="ellipsis" style="white-space: nowrap; overflow: hidden;text-overflow:ellipsis;"><?php echo $row['product_name']; ?></p></h3>
      <p style="text-align:left">
      <?php
      $string = strip_tags($row['product_detail']);
      if (strlen($string) > 300) {
      $stringCut = substr($string, 0, 300);
      $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....';
    }
    echo $string;
    ?>
  </p>
  <p>จำนวน : <?php echo number_format($row['stock']) ?></p>
  <p>ราคา : <?php echo number_format( $row['product_price'] , 2 ); ?></p>
</div>

</div>
</a>
</div>
<?php endforeach; ?>


<?php }else{ ?>
<center><h2>ไม่พบสินค้า</h2></center>
<?php } ?> -->
</div>
<div class="row" style="text-align:center;">
  <?php echo $links; ?>
</div>
</div>
</div>
</div>
