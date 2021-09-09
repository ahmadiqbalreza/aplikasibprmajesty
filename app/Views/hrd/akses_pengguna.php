<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pengaturan Akses Pengguna</h1>
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
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Nomor Surat</th>
                                <th class="text-center">Inventaris</th>
                                <th class="text-center">Cuti Online</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $user) : ?>
                                <tr class="text-center">
                                    <td><?= $i; ?></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->name; ?></td>
                                    <td><?php if ($user->access_nomor_surat != '1') : ?>
                                            ❌
                                        <?php else : ?>
                                            ✅
                                        <?php endif; ?>
                                    </td>
                                    <td><?php if ($user->access_inventaris != '1') : ?>
                                            ❌
                                        <?php else : ?>
                                            ✅
                                        <?php endif; ?>
                                    </td>
                                    <td><?php if ($user->access_cuti_online != '1') : ?>
                                            ❌
                                        <?php else : ?>
                                            ✅
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a title='Edit Akses' data-bs-toggle="modal" data-bs-target="#btn_edit_akses" class="btn btn-outline-primary btn-sm">Edit</a>
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

    <!-- Modal Edit Akses APP -->
    <div class="modal fade" id="btn_edit_akses" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="btn_edit_aksesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="btn_edit_aksesLabel">Edit Akses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <Form action="/hrd/save_edit_akses/" method="POST">
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </Form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>