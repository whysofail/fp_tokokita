      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Kurir</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('kurir');?>">Kurir</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <?= ($this->session->flashdata('alert')); ?>
          <div class="section-body">
            <h2 class="section-title">Data Kurir</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <a href="<?= site_url('kurir/add');?>" class="btn btn-primary">Tambah Kurir</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No.</th>
                          <th>Nama Kurir</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($kurir as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaKurir; ?></td>
                          <td><a href="<?= site_url('kurir/getid/'.$item->idKurir);?>" class=" btn btn-warning">Edit</a>
                          <a href="<?= site_url('kurir/delete_hapus/'.$item->idKurir);?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data kurir ini?')">Hapus</a></td>
                        </tr><?php }?>
                        <?php
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
