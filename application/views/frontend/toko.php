<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="./frontend" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= site_url('user/buat_toko') ?>" class="btn btn-primary"> Silahkan membuat toko </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>Nama Toko</th>
                                <th>Logo</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($toko as $item) : ?>
                                <tr>
                                    <td><?= $item->namaToko ?></td>
                                    <td><img src="<?= base_url() ?>assets/img/<?= $item->logo ?>" height="70px" width="70px"></td>
                                    <td><?= $item->deskripsi ?></td>
                                    <td>
                                        <?php if ($item->statusAktif == 'Y') : ?>
                                            <span class='badge badge-success'>Aktif</span>
                                        <?php else : ?> <span class='badge badge-danger'>Tidak Aktif</span> <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($item->statusAktif == 'Y') : ?>
                                            <a class="btn btn-primary" href="<?= site_url('detail_toko/detailToko/' . $item->idToko); ?>"> Detail </a>
                                        <?php else : ?> <a class="btn btn-primary disabled" href="#"> Detail </a> <?php endif ?>
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