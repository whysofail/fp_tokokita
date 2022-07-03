<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Keranjang Belanja</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Keranjang Belanja</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">qty</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 1;
                                $total = 0;
                                foreach ($keranjang as $item) : ?>
                                    <tr>
                                        <th scope="row"><?= $n++ ?></th>
                                        <td><?= $item->namaProduk ?></td>
                                        <td>
                                            <img src="<?= base_url() ?>assets/product_img/<?= $item->foto ?>" height="100px" width="100px">
                                        </td>
                                        <td><?= $item->hargaSatuan ?></td>
                                        <td><?= $item->jumlah ?></td>
                                        <td><?= $item->subtotal ?></td>
                                        <td><a class="btn btn-danger del-btn" href="<?= site_url('keranjang/delete/' . $item->idDetailOrder); ?>"> Hapus </a></td>
                                    </tr>
                                <?php
                                    $total += $item->subtotal;
                                endforeach ?>
                            </tbody>
                        </table>
                        <h2><?= 'Total Rp ' . $total ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>