/<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <!-- <div class="image">
                <img src="../../assets/template/images/user.png" width="48" height="48" alt="User" />
            </div> -->
            <div class="info-container">
                <div class="name"><?php echo $_SESSION['ADMIN_FNAME'].' '.$_SESSION['ADMIN_LNAME']; ?></div>
                <div class="email"></div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <!-- <li>
                    <a href="../../index.html">
                        <i class="material-icons">dashboard</i>
                        <span>ภาพรวม</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo site_url('Order/orderList'); ?>">
                        <i class="material-icons">view_list</i>
                        <span>จัดการการสั่งซื้อ</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>คลังสินค้า</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo site_url('Product/productList'); ?>" class="menu-toggle">
                                <span>สินค้า</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Product/typeList'); ?>" class="menu-toggle">
                                <span>ประเภท</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Product/categoryList'); ?>" class="menu-toggle">
                                <span>หมวดหมู่</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">monetization_on</i>
                        <span>จัดการการชำระเงิน</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo site_url('Payment/paymentList'); ?>" class="menu-toggle">
                                <span>รายการชำระค่าสินค้า</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Payment/paymentTypeList'); ?>" class="menu-toggle">
                                <span>รูปแบบการชำระค่าสินค้า</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Payment/bookBankList'); ?>" class="menu-toggle">
                                <span>บัญชีธนาคาร</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">directions_car</i>
                        <span>จัดการการจัดส่ง</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo site_url('Delivery/deliveryStatus'); ?>" class="menu-toggle">
                                <span>รายการจัดส่ง</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('Delivery/deliveryTypeList'); ?>" class="menu-toggle">
                                <span>รูปแบบการจัดส่ง</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('Member/memberList'); ?>">
                        <i class="material-icons">account_box</i>
                        <span>จัดการสมาชิก</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('Contact/contactList'); ?>">
                        <i class="material-icons">message</i>
                        <span>ข้อความ</span>
                    </a>
                </li>
                <li>
                  <a href="<?php echo site_url('Report/all'); ?>">
                      <i class="material-icons">insert_chart</i>
                      <span>รายงาน</span>
                  </a>
                </li>
            </ul>
        </div>
    </aside>
</section>
