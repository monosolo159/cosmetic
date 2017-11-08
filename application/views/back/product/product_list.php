  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              สินค้า
                          </h2>
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a left class="btn btn-success waves-effect pull-right" href="<?php echo site_url('product/productAddForm'); ?>">เพิ่มรายการสินค้า</a>
                              </li>
                          </ul>
                      </div>
                      <div class="body">
                          <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                              <th>รหัส</th>
                              <th>ชื่อสินค้า</th>
                              <th>ประเภท</th>
                              <th>หมวดหมู่สินค้า</th>
                              <th>จำนวน</th>
                              <th>ราคา</th>
                              <th>จัดการ</th>
                            </tr>
                            </thead>
                              <tbody>
              								<?php foreach ($ProductList as $row): ?>
              									<tr>
              	                  <td><?php echo $row['product_id']; ?></td>
              	                  <td><?php echo $row['product_name']; ?></td>
              	                  <td><?php echo $row['product_type_name']; ?></td>
              										<td><?php echo $row['category_name']; ?></td>
              	                  <td><?php echo number_format($row['stock']) ?></td>
              	                  <td><?php echo number_format( $row['product_price'] , 2 ); ?></td>
                                  <td>
                                      <div class="btn-group">
                                          <button type="button" class="btn btn-xs btn-warning waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              แก้ไข <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a href="<?php echo site_url('product/productEditForm/'.$row['product_id']); ?>">ข้อมูล</a></li>
                                              <li><a href="<?php echo site_url('product/productImageEditForm/'.$row['product_id']); ?>">ภาพ</a></li>
                                          </ul>
                                      </div>
                                      <a class="btn btn-xs btn-danger waves-effect" href="JavaScript:if(confirm('ยืนยันการลบ?') == true){window.location='<?php echo site_url('product/productDelete/'.$row['product_id']); ?>';}">ลบ</a>
                                      <a left class="btn btn-xs btn-success waves-effect" href="<?php echo site_url('product/productImportForm/'.$row['product_id']); ?>">นำเข้าสินค้าคงคลัง</a>
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
