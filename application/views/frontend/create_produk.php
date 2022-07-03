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
                                <li class="nav-item"><a href="<?= site_url('detail_toko/produk/' . $detail_toko->idToko) ?>" class="nav-link">Produk</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Pesanan</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Laporan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <form method="POST" action="<?= site_url('detail_toko/save_product') ?>" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Produk Baru</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="idToko" value="<?= $detail_toko->idToko ?>">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control selectric">
                                        <?php foreach ($kategori as $key) : ?>
                                            <option value="<?= $key->idkat; ?>"> <?= $key->namakat; ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="namaProduk" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Foto Produk</label>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="site-logo">
                                        <label class="custom-file-label">Choose File</label>
                                    </div>
                                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Stok Produk</label>
                                    <input type="text" name="stok" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Berat Produk</label>
                                    <input type="text" name="berat" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="site-description" class="form-control-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsiProduk" id="site-description"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>