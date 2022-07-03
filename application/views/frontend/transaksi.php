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
                                <li class="nav-item"><a href="<?= site_url('transaksi') ?>" class="nav-link">Transaksi</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Riwayat Transaksi</a></li>
                                <li class="nav-item"><a href="<?= site_url('user/toko') ?>" class="nav-link">Toko</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Ubah Profil</a></li>
                                <li class="nav-item"><a href="<?= site_url('login_user/logout') ?>" class="nav-link">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h4>All Posts</h4>
                            </div>

                            <div class="float-right">
                                <a class="nav-link badge badge-danger" href="#">View More ></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($transaksi as $key) : ?>
                                        <tr>
                                            <td><?= $key->idOrder ?></td>
                                            <td><?= $this->session->userdata('username') ?></td>
                                            <td></td>
                                            <td>
                                                <?php if ($key->statusOrder == 'Belum Bayar') : ?>
                                                    <span class='badge badge-warning'>Belum Dibayar</span>
                                                <?php else : ?> <span class='badge badge-success'>Dibayar</span> <?php endif ?>
                                            </td>
                                            <td><?= $key->tglOrder ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>