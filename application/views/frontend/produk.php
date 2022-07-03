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
                                <li class="nav-item"><a href="<?= site_url('user/toko') ?>" class="nav-link">Kembali Ke Toko</a></li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= site_url('detail_toko/produk_baru/' . $detail_toko->idToko) ?>" class="btn btn-primary"> Silahkan Tambah Produk Baru </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Berat</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($produk as $item) : ?>
                                <tr>
                                    <td><?= $item->namaProduk ?></td>
                                    <td><img src="<?= base_url() ?>assets/img/<?= $item->foto ?>" height="70px" width="70px"></td>
                                    <td><?= "Rp. " . number_format($item->harga, 0, ".", "."); ?></td>
                                    <td><?= $item->stok ?></td>
                                    <td><?= $item->berat . "Kg" ?></td>
                                    <td>
                                        <a href="<?php echo site_url('detail_toko/getid/' . $item->idProduk); ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?php echo site_url('detail_toko/delete/' . $item->idProduk); ?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda Yakin Akan Menghapus Kategori Ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>