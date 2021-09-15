<?= $this->extend('/nomor_surat/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Penomoran Baru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>

            <form action="/nomor_surat/addnomor" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= user()->fullname; ?>" readonly>
                            <label for="nama_pegawai">Nama Pegawai</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="<?= user()->id_karyawan; ?>" readonly>
                            <label for="id_pegawai">ID Pegawai</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="department_pegawai" name="department_pegawai" value="<?= user()->department; ?>" readonly>
                            <label for="department_pegawai">Department</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value='<?= $tanggal_sekarang  ?>' readonly>
                            <label for="tanggal">Tanggal Saat Ini :</label>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <ol class="breadcrumb my-1 mx-1">
                        <li class="breadcrumb-item active small">Form Input</li>
                    </ol>
                    <div class="row my-2 mx-2">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('perihal_surat')) ? 'is-invalid' : ''; ?>" id="perihal_surat" name="perihal_surat" placeholder="Perihal Surat" value="<?= old('perihal_surat'); ?>" autocomplete="off" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('perihal_surat'); ?>
                                </div>
                                <label for="perihal_surat">Perihal Surat</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control <?= ($validation->hasError('tujuan_surat')) ? 'is-invalid' : ''; ?>" id="tujuan_surat" name="tujuan_surat" placeholder="Tujuan Surat" value="<?= old('tujuan_surat'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tujuan_surat'); ?>
                                </div>
                                <label for="tujuan_surat">Tujuan Surat</label>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3 my-1 mx-1">
                            <div class="col col-md-3 text-center">
                                <button type="submit" class="btn btn-success">Buat Nomor</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?= $this->endSection(); ?>