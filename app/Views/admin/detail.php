<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detail Pengguna</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>
            <?= d($user); ?>
            <div class="card mb-4">
                <ol class="breadcrumb my-1 mx-1">
                    <li class="breadcrumb-item active small">Profil Pengguna</li>
                </ol>
                <div class="row my-2 mx-2">
                    <div class="col-md-2">
                        <div class="text-center">
                            <img src="/img/profile/<?= $user->user_image ?>" class="rounded img-fluid" alt="Profil">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan" value="<?= $user->fullname ?>" autocomplete="off">
                            <label for="nama_karyawan">Nama Karyawan</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="departmnent" name="departmnent" placeholder="Department" value="<?= $user->department ?>" autocomplete="off">
                            <label for="departmnent">Departmnent</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user->username ?>" autocomplete="off">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat" placeholder="Tujuan Surat" value="<?= old('tujuan_surat'); ?>" autocomplete="off">
                            <label for="tujuan_surat">Tujuan Surat</label>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <?= $this->endSection(); ?>