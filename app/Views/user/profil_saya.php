<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detail Pengguna</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>
            <?php if (session()->getFlashdata('pesan_edit_profile')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan_edit_profile'); ?>
                </div>
            <?php endif ?>
            <div class="card mb-4">
                <form action="/user/save_profile/<?= user()->id; ?>" method="POST">
                    <div class="row">
                        <div class="col">
                            <ol class="breadcrumb my-1 mx-1">
                                <li class="breadcrumb-item active small">Profil Pengguna</li>
                            </ol>
                        </div>

                        <div class="col-3 text-end my-1 mx-1">
                            <button type="submit" id="btn_edit_simpan_kar" class="btn btn-primary btn-sm">Simpan</button>
                            <button type="button" class="btn btn-primary btn-sm btn_edit_profile_kar">Edit Profile</button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="text-center">
                                <img src="/img/profile/<?= user()->user_image ?>" class="rounded img-fluid" alt="Profil">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 mx-2">
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_id_karyawan_kar" name="detail_id_karyawan_kar" placeholder="ID Karyawan" value="<?= user()->id_karyawan ?>" autocomplete="off" readonly>
                                <label for="detail_id_karyawan_kar">ID Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_fullname_kar" name="detail_fullname_kar" placeholder="Nama Karyawan" value="<?= user()->fullname ?>" autocomplete="off">
                                <label for="detail_fullname_kar">Nama Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_username_kar" name="detail_username_kar" placeholder="Username" value="<?= user()->username ?>" autocomplete="off" readonly>
                                <label for="detail_username_kar">Username</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_department_kar" name="detail_department_kar" placeholder="Department" value="<?= user()->department ?>" autocomplete="off" readonly>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_role_kar" name="detail_role_kar" placeholder="role" value="
<?php
$db = \Config\Database::connect();
$builder = $db->table('users');
$id = user()->id;
$builder->select('users.id as userid, username, email, name');
$builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
$builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
$builder->where('users.id', $id);
$query = $builder->get();
$data = $query->getRow();
echo  $data->name;
?>" autocomplete="off" readonly>
                                <label for="role">Role</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_status_karyawan_kar" name="detail_status_karyawan_kar" placeholder="status_karyawan" value="<?= user()->status_karyawan ?>" autocomplete="off" readonly>
                                <label for="status_karyawan">Status Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_email_kar" name="detail_email_kar" placeholder="email" value="<?= user()->email ?>" autocomplete="off">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <select class="form-select form-control" id="detail_jenis_kelamin_kar" name="detail_jenis_kelamin_kar" aria-label="Jenis Kelamin">
                                    <option selected value="<?= user()->jenis_kelamin ?>"><?= user()->jenis_kelamin ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="date" class="form-control" id="detail_tgl_lahir_kar" name="detail_tgl_lahir_kar" placeholder="tgl_lahir" value="<?= user()->tgl_lahir ?>" autocomplete="off">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" id="detail_phone_kar" name="detail_phone_kar" placeholder="phone" value="<?= user()->phone ?>" autocomplete="off">
                                <label for="phone">Nomor HP</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </main>
    <script src="/js/detail_karyawan.js"></script>
    <?= $this->endSection(); ?>