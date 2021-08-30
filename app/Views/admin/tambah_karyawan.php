<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<link href="/css/add_karyawan.css" rel="stylesheet" />
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Karyawan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>

            <div class="card mb-4">
                <ol class="breadcrumb my-1 mx-1">
                    <li class="breadcrumb-item active small">Form Input</li>
                </ol>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row my-2 mx-2">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" placeholder="ID Karyawan" value="<?= old('id_karyawan'); ?>" autocomplete="off" autofocus>
                                <label for="id_karyawan">ID Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="<?= old('fullname'); ?>" autocomplete="off" autofocus>
                                <label for="fullname">Nama Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" placeholder="Email" value="<?= old('email'); ?>" autocomplete="off" autofocus>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>" autocomplete="off" autofocus>
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?= old('password'); ?>" autocomplete="off" autofocus>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pass_confirm" name="pass_confirm" placeholder="pass_confirm" value="<?= old('pass_confirm'); ?>" autocomplete="off" autofocus>
                                <label for="pass_confirm">Konfirmasi Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="department" name="department" placeholder="Department" value="<?= old('department'); ?>" autocomplete="off" autofocus>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="status_karyawan" name="status_karyawan" placeholder="Status Karyawan" value="<?= old('status_karyawan'); ?>" autocomplete="off" autofocus>
                                <label for="status_karyawan">Status Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= old('tempat_lahir'); ?>" autocomplete="off" autofocus>
                                <label for="tempat_lahir">Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= old('tgl_lahir'); ?>" autocomplete="off" autofocus>
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= old('jenis_kelamin'); ?>" autocomplete="off" autofocus>
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telp" value="<?= old('phone'); ?>" autocomplete="off" autofocus>
                                <label for="phone">Nomor Telp</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Alamat" id="alamat" style="height: 100px" value="<?= old('alamat'); ?>"></textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3 my-1 mx-1">
                            <div class="col col-md-3 text-center">
                                <button type="submit" class="btn btn-success">Tambah Karyawan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </main>
    <?= $this->endSection(); ?>