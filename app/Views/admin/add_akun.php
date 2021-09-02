<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Add Akun</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>

            <div class="card mb-4">
                <ol class="breadcrumb my-1 mx-1">
                    <li class="breadcrumb-item active small">Form Input</li>
                </ol>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="row my-2 mx-4">
                </div>
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row my-2 mx-2">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php if (session('errors.id_karyawan')) : ?>is-invalid<?php endif ?>" id="id_karyawan" name="id_karyawan" placeholder="ID Karyawan" value="<?= old('id_karyawan'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.id_karyawan'); ?>
                                </div>
                                <label for="id_karyawan">ID Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" id="fullname" name="fullname" placeholder="Fullname" value="<?= old('fullname'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.fullname'); ?>
                                </div>
                                <label for="fullname">Nama Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" placeholder="Email" value="<?= old('email'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.email'); ?>
                                </div>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.username'); ?>
                                </div>
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" placeholder="Password" value="<?= old('password'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.password'); ?>
                                </div>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm" placeholder="pass_confirm" value="<?= old('pass_confirm'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= session('errors.pass_confirm'); ?>
                                </div>
                                <label for="pass_confirm">Konfirmasi Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select form-control <?php if (session('errors.department')) : ?>is-invalid<?php endif ?>" id="department" name="department" aria-label="Department">
                                    <option selected value="">Pilih Department</option>
                                    <?php foreach ($department as $dept) : ?>
                                        <option value="<?= $dept['department']; ?>"> <?= $dept['department']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= session('errors.department'); ?>
                                </div>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select form-control <?php if (session('errors.role')) : ?>is-invalid<?php endif ?>" id="role" name="role" aria-label="role">
                                    <option selected value="">Pilih Role</option>
                                    <?php foreach ($role as $roles) : ?>
                                        <option value="<?= $roles['name']; ?>"> <?= $roles['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= session('errors.role'); ?>
                                </div>
                                <label for="role">Role</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select form-control <?php if (session('errors.status_karyawan')) : ?>is-invalid<?php endif ?>" id="status_karyawan" name="status_karyawan" aria-label="Status Karyawan">
                                    <option selected value="">Pilih Status Karyawan</option>
                                    <option value="karyawan_kontrak">Karyawan Kontrak</option>
                                    <option value="karyawan_tetap">Karyawan Tetap</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= session('errors.status_karyawan'); ?>
                                </div>
                                <label for="floatingSelect">Status Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select form-control <?php if (session('errors.jenis_kelamin')) : ?>is-invalid<?php endif ?>" id="jenis_kelamin" name="jenis_kelamin" aria-label="Jenis Kelamin">
                                    <option selected value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= session('errors.jenis_kelamin'); ?>
                                </div>
                                <label for="floatingSelect">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control <?php if (session('errors.tgl_lahir')) : ?>is-invalid<?php endif ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= old('tgl_lahir'); ?>" autocomplete="off">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>" id="phone" name="phone" placeholder="Nomor Telp" value="<?= old('phone'); ?>" autocomplete="off">
                                <label for="phone">Nomor Telp</label>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3 my-1 mx-1">
                            <div class="col col-md-3 text-center">
                                <button type="submit" class="btn btn-success" id="submit_tambah_karyawan" name="submit_tambah_karyawan">Add Akun</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?= $this->endSection(); ?>