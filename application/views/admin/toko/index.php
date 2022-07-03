      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Toko</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('toko');?>">Toko</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <div class="section-body">
            <?= ($this->session->flashdata('alert')); ?>
            <h2 class="section-title">Data Toko</h2>
            <div class="row">
              <div class="col-12 col-md-9 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <a href="<?= site_url('toko/add');?>" class="btn btn-primary">Tambah Data Toko</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Nama Toko</th>
                          <!-- <th>Nama Member</th> -->
                          <th>Logo</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        if ($cekombak > 0){
                        $no=1; 
                        foreach($toko as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaToko; ?></td>
                          <!-- <td><?= $item->namaKonsumen; ?></td> -->
                          <td align="center"><img src="<?= site_url('assets/img/'.$item->logo); ?>" alt="Toko <?= $item->namaToko;?>" width="50px" height="50px"></td>
                          <td><?= $item->deskripsi; ?></td>
                          <td>
                            <?php if ($item->statusAktif == 'Y') { ;?>
                            <span class='badge badge-success'>Aktif</span> 
                            <?php } else { ;?>
                            <span class='badge badge-danger'>Tidak Aktif</span>
                            <?php } ;?>
                          </td>
                          <td>
                            <?php if ($item->statusAktif == 'N') : ?>
                            <a class="btn btn-success" href="<?= site_url('toko/status_toko/' . $item->idToko); ?>"> Aktifkan </a>
                            <?php else : ?>
                            <a class="btn btn-warning" href="<?= site_url('toko/status_toko/' . $item->idToko); ?>"> NonAktifkan </a>
                          <?php endif ?>
                          </td>
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
