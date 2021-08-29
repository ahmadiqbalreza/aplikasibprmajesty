<?= $this->extend('/main_template/template_home'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang di Aplikasi BPRMGR</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>
            <?php if (in_groups('admin')) : ?>
                <a href="/admin" class="btn btn-primary btn-sm">Admin</a>
            <?php endif; ?>
            <a href="#" class="btn btn-primary btn-sm">User</a>
            <div class="row my-3">
                <div class="card mb-4">
                    <ol class="breadcrumb my-1 mx-1">
                        <li class="breadcrumb-item active small">Informasi Profil</li>
                    </ol>
                    <div class="row my-2 mx-2">
                        <div class="col-md-2">
                            <img src="/img/profile/<?= user()->user_image; ?>" class="img-fluid" alt="foto-profil">
                        </div>
                        <div class="col-md-10">
                            <h5 class="card-title"><?= user()->fullname; ?></h5>
                            <div class="card-text">
                                <table class="table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= user()->username; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Login sebagai</td>
                                            <td>:</td>
                                            <td class="text-capitalize">
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
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>:</td>
                                            <td><?= user()->department; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bekerja Sejak</td>
                                            <td>:</td>
                                            <td>@fat</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">APLIKASI NOMOR SURAT</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/nomor_surat">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">APLIKASI INVENTARIS</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="/inventaris">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">COMING SOON</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">COMING SOON</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= $this->endSection(); ?>