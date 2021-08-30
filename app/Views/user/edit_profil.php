<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Profil</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>
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
    </main>
    <?= $this->endSection(); ?>