      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Feedback Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('feedback');?>">Member</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Masukan Member</h2>
            <div class="row">
              <div class="col-12 col-md-9 col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-sm">
                        <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>Nama Konsumen</th>
                          <th>Email</th>
                          <th>Telepon</th>
                          <th>Kritik dan Saran</th>
                        </tr>
                        <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($member as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->Username; ?></td>
                          <td><?= $item->namaKonsumen; ?></td>
                          <td><?= $item->email; ?></td>
                          <td><?= $item->tlpn; ?></td>
                          <td><?= $item->Feedback; ?></td>
                        </tr><?php }
                        }else{?>
                          <tr>
                            <td colspan="6" align="center"><h4>Data Kosong</h4></td>
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>    
            </div>            
          </div>
        </section>
      </div>
