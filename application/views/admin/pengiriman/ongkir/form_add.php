<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('Ongkir');?>">Ongkos Kirim</a></div>
              <div class="breadcrumb-item">Form Tambah Ongkos Kirim</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?= site_url('ongkir/save');?>">
                <div class="card">
                  <?= ($this->session->flashdata('alert')); ?>
                  <div class="card-header">
                    <h4>Form Tambah Ongkos Kirim</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kurir</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="kurir">
                          <!-- <option selected>Pilih Nama Kurir</option> -->
                          <?php foreach($kurir as $item){?>
                          <option value="<?= $item->idKurir;?>"><?= $item->namaKurir;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota Asal</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control selectric" name="kotas">
                            <!-- <option selected>Pilih Kota Asal</option> -->
                            <?php foreach($kota as $item){?>
                            <option value="<?= $item->idKota;?>"><?= $item->namaKota;?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>      
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota Tujuan</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control selectric" name="kotuj">
                            <!-- <option selected>Pilih Kota Tujuan</option> -->
                            <?php foreach($kota as $item){?>
                            <option value="<?= $item->idKota;?>"><?= $item->namaKota;?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" class="form-control" id="inputEmail3" name="biaya" placeholder="Biaya">
                        </div>
                    </div>       
                  </div>
                  <div class="card-footer">
                    <a href="<?php echo base_url('ongkir/index'); ?>" class="btn btn-primary ">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
               </form>
             </div>
            </div>
          </div>
        </section>
      </div>