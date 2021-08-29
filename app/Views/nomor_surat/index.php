<?= $this->extend('/nomor_surat/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Beranda</h1>
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
                            Data Penggunaan Nomor Surat
                        </div>
                        <div class="col-2 text-end">
                            <a href="/nomor_surat/export_penggunaan_surat" type="button" class="btn btn-primary btn-sm mr-2">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Surat</th>
                                <th>Perihal Surat</th>
                                <th>Tujuan Surat</th>
                                <th>Nama Pembuat</th>
                                <th>Tanggal Dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Surat</th>
                                <th>Perihal Surat</th>
                                <th>Tujuan Surat</th>
                                <th>Nama Pembuat</th>
                                <th>Tanggal Dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($nomor_surat as $no_sur) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $no_sur['nomor_surat']; ?></td>
                                    <td><?= $no_sur['perihal_surat']; ?></td>
                                    <td><?= $no_sur['tujuan_surat']; ?></td>
                                    <td><?= $no_sur['nama_pegawai']; ?></td>
                                    <td><?= $no_sur['tanggal_dibuat']; ?></td>
                                    <td>
                                        <?php if ($no_sur['konfirmasi'] == 1) : ?>
                                            <small>
                                                Digunakan
                                            </small>
                                        <?php else : ?>
                                            <small>
                                                Tidak Digunakan
                                            </small>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php if ($no_sur['konfirmasi'] == 1) : ?>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title='Ubah status menjadi "Tidak Digunakan"' href="/nomor_surat/edit_tidak_digunakan/<?= $no_sur['id']; ?>" type="button" class="btn btn-outline-danger btn-sm">X</a>
                                        <?php else : ?>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title='Ubah status menjadi "Digunakan"' href="/nomor_surat/edit_digunakan/<?= $no_sur['id']; ?>" type="button" class="btn btn-outline-success btn-sm">✓</a>
                                        <?php endif ?>
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