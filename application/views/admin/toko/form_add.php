<div class="main-content">
    <section class="section">
    <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('adminpanel/dashboard');?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?= site_url('toko');?>">Toko</a></div>
              <div class="breadcrumb-item">Form Tambah Toko</div>
            </div>
          </div>

        <div class="section-body">
            <div id="output-status"></div>
            <div class="row">
                
                <div class="col-md-9">
                    <form id="setting-form" action="<?= site_url('toko/save') ?>" method="POST" enctype="multipart/form-data">
                        <div class=" card" id="settings-card">
                            <div class="card-header">
                                <h4>Form Tambah Toko</h4>
                                <?= ($this->session->flashdata('alert')); ?>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Toko</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama" class="form-control" id="site-title">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control" name="desc" id="site-description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Member</label>
                                    <div class="col-sm-6 col-md-9">
                                    <select class="form-control selectric" name="member">
                                        <!-- <option selected>Pilih Kota Asal</option> -->
                                        <?php foreach($member as $item){?>
                                        <option value="<?= $item->idKonsumen;?>"><?= $item->namaKonsumen;?></option>
                                        <?php }?>
                                    </select>
                                    </div>
                                </div>      
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Logo</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label"></label>
                                        </div>
                                        <div class="form-text text-muted">Ukuran maksimum file adalah 1MB</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>