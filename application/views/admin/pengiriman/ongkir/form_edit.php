<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('ongkir');?>">Ongkos Kirim</a></div>
              <div class="breadcrumb-item">Form Edit Ongkos Kirim</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?= site_url('ongkir/edit');?>">
                <input type="hidden" name="id" value="<?= $ongkir->idBiayaKirim ;?>">
                <div class="card">
                  <?= ($this->session->flashdata('alert')); ?>
                  <div class="card-header">
                    <h4>Form Edit Ongkos Kirim</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kurir</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="kurir">
                          <!-- <option selected><?= $biaya->$kotaasal;?></option> -->
                          <?php foreach($kurir as $item){?>
                          <option value="<?= $item->idKurir;?>" <?= $ongkir->idKurir == $item->idKurir ? "selected" : null ?>> <?= $item->namaKurir;?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota Asal</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control selectric" name="kotas">
                            <?php foreach($kota as $item){?>
                            <option value="<?= $item->idKota;?>" <?= $ongkir->idKotaAsal == $item->idKota ? "selected" : null ?>><?= $item->namaKota;?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>      
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota Tujuan</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control selectric" name="kotuj">
                            <?php foreach($kota as $item){?>
                            <option value="<?= $item->idKota;?>" <?= $ongkir->idKotaTujuan == $item->idKota ? "selected" : null ?>><?= $item->namaKota;?></option>
                            <?php }?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" id="inputEmail3" name="biaya" placeholder="Biaya" value="<?= $ongkir->biaya;?>">
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