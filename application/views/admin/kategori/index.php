      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Kategori</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('kategori');?>">Kategori</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Kategori</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <!-- <dvi class="flash-data" data-flashdata="<?= ($this->session->flashdata('alert')); ?>"></dvi> -->
                  <?= ($this->session->flashdata('alert')); ?>
                  <div class="card-header">
                    <a href="<?= site_url('kategori/add');?>" class="btn btn-primary">Tambah Kategori</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No.</th>
                          <th>Nama Kategori</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($kategori as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namakat; ?></td>
                          <td><a href="<?= site_url('kategori/getid/'.$item->idkat);?>" class=" btn btn-warning">Edit</a>
                          <a href="<?= site_url('kategori/delete_hapus/'.$item->idkat);?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data kategori yang anda pilih ini?')">Hapus</a></td>
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
