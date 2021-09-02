<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detail Pengguna</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>
            <div class="card mb-4">
                <form action="/admin/save_profile/<?= $user->userid; ?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <ol class="breadcrumb my-1 mx-1">
                                <li class="breadcrumb-item active small">Profil Pengguna</li>
                            </ol>
                        </div>

                        <div class="col-3 text-end my-1 mx-1">
                            <button type="submit" id="btn_edit_simpan" class="btn btn-primary btn-sm">Simpan</button>
                            <button type="button" class="btn btn-primary btn-sm btn_edit_profile">Edit Profile</button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="text-center">
                                <img src="/img/profile/<?= $user->user_image ?>" class="rounded img-fluid" alt="Profil">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 mx-2">
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_id_karyawan" name="detail_id_karyawan" placeholder="ID Karyawan" value="<?= $user->id_karyawan ?>" autocomplete="off">
                                <label for="detail_id_karyawan">ID Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_fullname" name="detail_fullname" placeholder="Nama Karyawan" value="<?= $user->fullname ?>" autocomplete="off">
                                <label for="detail_fullname">Nama Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_username" name="detail_username" placeholder="Username" value="<?= $user->username ?>" autocomplete="off">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <select class="form-select form-control" id="detail_department" name="detail_department" aria-label="Department">
                                    <option selected value="<?= $user->department ?>"><?= $user->department ?></option>
                                    <?php foreach ($department as $dept) : ?>
                                        <option value="<?= $dept['department']; ?>"> <?= $dept['department']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <select class="form-select form-control" id="detail_role" name="detail_role" aria-label="role">
                                    <option selected value="<?= $user->name ?>"><?= $user->name ?></option>
                                    <?php foreach ($role as $roles) : ?>
                                        <option value="<?= $roles['id']; ?>"> <?= $roles['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <label for="role">Role</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <select class="form-select form-control" id="detail_status_karyawan" name="detail_status_karyawan" aria-label="Status Karyawan">
                                    <option selected value="<?= $user->status_karyawan ?>"><?= $user->status_karyawan ?></option>
                                    <option value="karyawan_kontrak">Karyawan Kontrak</option>
                                    <option value="karyawan_tetap">Karyawan Tetap</option>
                                </select>
                                <label for="status_karyawan">Status Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_email" name="detail_email" placeholder="email" value="<?= $user->email ?>" autocomplete="off">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <select class="form-select form-control" id="detail_jenis_kelamin" name="detail_jenis_kelamin" aria-label="Jenis Kelamin">
                                    <option selected value="<?= $user->jenis_kelamin ?>"><?= $user->jenis_kelamin ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="date" class="form-control" id="detail_tgl_lahir" name="detail_tgl_lahir" placeholder="tgl_lahir" value="<?= $user->tgl_lahir ?>" autocomplete="off">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_phone" name="detail_phone" placeholder="phone" value="<?= $user->phone ?>" autocomplete="off">
                                <label for="phone">Nomor HP</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </main>
    <?= $this->endSection(); ?>