<?= $this->extend('inventaris/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Inventaris Peralatan Komputer BPRMGR Batam Center</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>
            <?php if (session()->getFlashdata('pesan_edit')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan_edit'); ?>
                </div>
            <?php endif ?>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <i class="fas fa-table me-1"></i>
                            Data Inventaris Peralatan Komputer
                        </div>
                        <div class="col-2 text-end">
                            <a href="#" type="button" class="btn btn-primary btn-sm mr-2">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="display nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Inventaris</th>
                                <th>Deskripsi</th>
                                <th>Tahun</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Lokasi</th>
                                <th>Remark</th>
                                <th>Update By</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($db_bcpkm as $pkm) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $pkm['nomor_inventaris_pkm']; ?></td>
                                    <td><?= $pkm['deskripsi']; ?></td>
                                    <td><?= $pkm['tahun']; ?></td>
                                    <td><?= $pkm['kategori']; ?></td>
                                    <td><?= $pkm['jumlah_unit']; ?></td>
                                    <td><?= $pkm['lokasi']; ?></td>
                                    <td><?= $pkm['remark']; ?></td>
                                    <td><?= $pkm['update_by']; ?></td>
                                    <td><?= $pkm['last_update']; ?></td>
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