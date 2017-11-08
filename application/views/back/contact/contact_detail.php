  <section class="content">
      <div class="container-fluid">
          <!-- Exportable Table -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                      <div class="header">
                          <h2>
                              ข้อความ
                          </h2>
                      </div>
                      <div class="body">
                        <p>วันที่ : <?php echo $contactSelect[0]['contact_date']; ?></p>
                        <p>หัวข้อ : <?php echo $contactSelect[0]['contact_subject']; ?></p>
                        <p>ผู้ส่ง : <?php echo $contactSelect[0]['contact_fullname']; ?></p>
                        <p>อีเมล : <?php echo $contactSelect[0]['contact_email']; ?></p>
                        <p>เบอร์โทร : <?php echo $contactSelect[0]['contact_tel']; ?></p>
                        <p>ข้อความ : <?php echo $contactSelect[0]['contact_detail']; ?></p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- #END# Exportable Table -->
      </div>
  </section>
