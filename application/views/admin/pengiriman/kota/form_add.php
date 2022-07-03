<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('kota');?>">Kota</a></div>
              <div class="breadcrumb-item">Form Tambah Kota</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?= site_url('kota/save');?>">
                <div class="card">
                  <?= ($this->session->flashdata('alert')); ?>
                  <div class="card-header">
                    <h4>Form Tambah Kota</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kota</label>
                      <div class="col-sm9">
                        <input type="text" class="form-control" id="inputEmail3" name="namaKota" placeholder="Nama Kota">
                      </div>
                    </div>  
                  </div>
                  <div class="card-footer">
                    <a href="<?php echo base_url('kota/index'); ?>" class="btn btn-primary ">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
               </form>
             </div>
            </div>
          </div>
        </section>
      </div>