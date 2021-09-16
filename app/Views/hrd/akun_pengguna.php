<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengaturan Akun Pengguna</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <i class="fas fa-table me-1"></i>
                            Data Akun Pengguna
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabel_akun_pengguna" class="tabell">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td><?= $user->name; ?></td>
                                    <td>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title='Lihat Detail' href="/hrd/detail/<?= $user->userid; ?>" type="button" class="btn btn-outline-primary btn-sm">Detail</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
    <?= $this->endSection(); ?>