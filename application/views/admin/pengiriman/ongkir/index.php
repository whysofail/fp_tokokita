      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Ongkos Kirim</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('ongkir');?>">Ongkos Kirim </a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <?= ($this->session->flashdata('alert')); ?>
          <div class="section-body">
            <h2 class="section-title">Data Ongkos Kirim</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <a href="<?= site_url('ongkir/add');?>" class="btn btn-primary">Tambah Ongkos Kirim</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No.</th>
                          <th>Nama Kurir</th>
                          <th>Kota Asal</th>
                          <th>Kota Tujuan</th>
                          <th>Ongkos Kirim</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        if ($crosscheckdata > 0){
                        $no=1; 
                        foreach($ongkir as $item){ ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $item->namaKurir; ?></td>
                          <td><?= $item->kotaasal; ?></td>
                          <td><?= $item->kotatujuan; ?></td>
                          <td><?= "Rp. ".number_format($item->biaya, 0, ".","."); ?></td>
                          <td><a href="<?= site_url('ongkir/getid/'.$item->idBiayaKirim);?>" class=" btn btn-warning">Edit</a>
                          <a href="<?= site_url('ongkir/delete_hapus/'.$item->idBiayaKirim);?>" class="btn btn-danger remove" onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ongkir ini?')">Hapus</a></td>
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
      <script>
        document.querySelector(".remove").addEventListener('click', function(e){
          e.preventDefault();
          cont href = $(this).attr('href');
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              
            }
          })
        })
      </script>
