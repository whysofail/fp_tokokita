<div class="main-content">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="data-alert" data-flashdata="<?= $this->session->flashdata('mssg') ?>"></div>
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('frontend/save_daftar') ?>" class="needs-validation" novalidate="">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" required autofocus>
                                        <div class="invalid-feedback">
                                            Nama harap diisi !
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                            Email harap diisi !
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" required>
                                    <div class="invalid-feedback">
                                        Username harap diisi !
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                        <div class="invalid-feedback">
                                            Password harap diisi !
                                        </div>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password-konfirmasi" type="password" class="form-control" name="password-confirm" required>
                                        <div id="message"></div>
                                        <div class="invalid-feedback">
                                            Konfirmasikan Password Anda !
                                        </div>
                                    </div>
                                </div>

                                <div class="form-divider">
                                    Your Home
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input id="alamat" type="text" class="form-control" name="alamat">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Kota</label>
                                        <select name="kota" class="form-control selectric">
                                            <?php foreach ($kota as $key) : ?>
                                                <option value="<?= $key->idKota; ?>"> <?= $key->namaKota; ?> </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="no_telepon">No Telepon</label>
                                        <input id="no_telepon" type="text" class="form-control" name="no_telepon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-confirmation">
                                        Daftar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>