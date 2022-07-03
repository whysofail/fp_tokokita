<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Settings</h1>
        </div>

        <div class="section-body">
            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menu Member</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Transaksi</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Riwayat Transaksi</a></li>
                                <li class="nav-item"><a href="<?= site_url('user/toko') ?>" class="nav-link">Toko</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Ubah Profil</a></li>
                                <li class="nav-item"><a href="<?= site_url('login_user/logout') ?>" class="nav-link">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form id="setting-form" action="<?= site_url('user/save_toko') ?>" method="POST" enctype="multipart/form-data">
                        <div class=" card" id="settings-card">
                            <div class="card-header">
                                <h4>General Settings</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama Toko</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="nama_toko" class="form-control" id="site-title" required>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Deskripsi</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control" name="deskripsi" id="site-description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Logo Toko</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="site-logo">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
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