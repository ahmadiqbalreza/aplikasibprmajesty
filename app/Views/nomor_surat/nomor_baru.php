<?= $this->extend('/nomor_surat/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nomor Surat Baru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>

            <div class="card my-3">
                <ol class="breadcrumb my-2 mx-3">
                    <li class="breadcrumb-item active small">Penomoran Surat</li>
                </ol>
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control text-center" id="nomor_surat_baru" name="nomor_surat_baru" value="<?= $nomor_baru; ?>" readonly>
                            <label for="nomor_surat_baru">Nomor Surat</label>
                        </div>
                    </div>
                    <div class="row mb-2 justify-content-center text-center">
                        <div class="col col-4">
                            <button type="button" class="btn btn btn-outline-secondary btn-sm" onclick="fungsicopy()">Copy</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-3">
                <ol class="breadcrumb my-2 mx-3">
                    <li class="breadcrumb-item active small">Detail</li>
                </ol>
                <div class="my-2 mx-3">
                    <table class="table table-borderless">
                        <tbody class="small">
                            <tr>
                                <td>Nomor Surat</td>
                                <td>:</td>
                                <td><?= $surat_baru['nomor_surat']; ?></td>
                            </tr>
                            <tr>
                                <td>Judul Surat</td>
                                <td>:</td>
                                <td><?= $surat_baru['perihal_surat']; ?></td>
                            </tr>
                            <tr>
                                <td>Tujuan Surat</td>
                                <td>:</td>
                                <td><?= $surat_baru['tujuan_surat']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pembuat</td>
                                <td>:</td>
                                <td><?= $surat_baru['nama_pegawai']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal dibuat</td>
                                <td>:</td>
                                <td><?= $surat_baru['tanggal_dibuat']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card my-3">
                <ol class="breadcrumb my-1 mx-3">
                    <li class="breadcrumb-item active small">Cetak Surat</li>
                </ol>
                <div class="accordion accordion-flush my-3" id="accordionFlushExample">
                    <!-- Cetak Surat Pengantar -->
                    <div class="card my-2 mx-2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-cetak_pengantar" aria-expanded="false" aria-controls="flush-cetak_pengantar">
                                    Cetak Surat Pengantar
                                </button>
                            </h2>
                            <div id="flush-cetak_pengantar" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <form action="/nomor_surat/cetak_spengantar" method="POST" class="my-3">
                                    <?= csrf_field(); ?>
                                    <div class="row mb-3 mx-2">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="perihal_surat_pengantar" name="perihal_surat_pengantar" value="<?= $surat_baru['perihal_surat']; ?>" autocomplete="off">
                                                <label for="perihal_surat_pengantar">Perihal Surat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nomor_surat_pengantar" name="nomor_surat_pengantar" value="<?= $nomor_baru; ?>" readonly>
                                                <label for="nomor_surat_pengantar">Nomor Surat</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tempat_tanggal_pengantar" name="tempat_tanggal_pengantar" value="Batam, <?= $tanggal_sekarang  ?>" autocomplete="off">
                                                <label for="tempat_tanggal_pengantar">Tempat dan Tanggal </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="lampiran_pengantar" name="lampiran_pengantar" value="<?= old('lampiran_pengantar'); ?>" autocomplete="off">
                                                <label for="lampiran_pengantar">Lampiran</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tembusan_pengantar" name="tembusan_pengantar" value='<?= old('tembusan_pengantar'); ?>' autocomplete="off">
                                                <label for="tembusan_pengantar">Tembusan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="yth_pengantar" name="yth_pengantar" value="<?= old('yth_pengantar'); ?>" autocomplete="off">
                                                <label for="yth_pengantar">Kepada Yth.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="di_pengantar" name="di_pengantar" value="<?= $surat_baru['tujuan_surat']; ?>" autocomplete="off">
                                                <label for="di_pengantar">Di</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="isi_surat_pengantar" name="isi_surat_pengantar" style="height: 100px" value="<?= old('isi_surat_pengantar'); ?>" autocomplete="off"></textarea>
                                                <label for="isi_surat_pengantar">Isi Surat</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2 justify-content-center">
                                        <div class="col col-md-3 text-center">
                                            <button type="submit" class="btn btn-success">Cetak Surat</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Cetak Surat Pengantar -->
                    <!-- Cetak Surat Laporan Nihil -->
                    <div class="card my-2 mx-2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-cetak_laporan_nihil" aria-expanded="false" aria-controls="flush-cetak_laporan_nihil">
                                    Cetak Surat Laporan Nihil DTTOT
                                </button>
                            </h2>
                            <div id="flush-cetak_laporan_nihil" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <form action="/nomor_surat/cetak_slaporannihil" method="POST" class="my-3">
                                    <?= csrf_field(); ?>
                                    <div class="row mb-3 mx-2">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="perihal_surat_lapnihil" name="perihal_surat_lapnihil" value="Laporan Nihil atas Pemblokiran Secara Serta Merta" autocomplete="off">
                                                <label for="perihal_surat_lapnihil">Perihal Surat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nomor_surat_lapnihil" name="nomor_surat_lapnihil" value="<?= $nomor_baru; ?>" readonly>
                                                <label for="nomor_surat_lapnihil">Nomor Surat</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tempat_tanggal_lapnihil" name="tempat_tanggal_lapnihil" value="Batam, <?= $tanggal_sekarang  ?>" autocomplete="off">
                                                <label for="tempat_tanggal_lapnihil">Tempat dan Tanggal </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="lampiran_lapnihil" name="lampiran_lapnihil" value="-" autocomplete="off">
                                                <label for="lampiran_lapnihil">Lampiran</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tembusan_lapnihil" name="tembusan_lapnihil" value="Yth. Ketua Dewan Komisioner Otoritas Jasa Keuangan" autocomplete="off">
                                                <label for="tembusan_lapnihil">Tembusan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="yth_lapnihil" name="yth_lapnihil" value="Kepala Kepolisian Negara Republik Indonesia" autocomplete="off">
                                                <label for="yth_lapnihil">Kepada Yth.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="di_lapnihil" name="di_lapnihil" value="Jakarta" autocomplete="off">
                                                <label for="di_lapnihil">Di</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nosur_kepolisian" name="nosur_kepolisian" value="<?= old('nosur_kepolisian'); ?>" autocomplete="off">
                                                <label for="nosur_kepolisian">Nomor Surat Kepolisian</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tgl_nosur_kepolisian" name="tgl_nosur_kepolisian" value="<?= old('tgl_nosur_kepolisian'); ?>" autocomplete="off">
                                                <label for="tgl_nosur_kepolisian">Tanggal Nomor Surat Kepolisian</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nomor_dttot" name="nomor_dttot" value="<?= old('nomor_dttot'); ?>" autocomplete="off">
                                                <label for="nomor_dttot">Nomor DTTOT</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tglwaktu_dttot" name="tglwaktu_dttot" value="<?= old('tglwaktu_dttot'); ?>" autocomplete="off">
                                                <label for="tglwaktu_dttot">Tanggal Nomor Surat Kepolisian</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2 justify-content-center">
                                        <div class="col col-md-3 text-center">
                                            <button type="submit" class="btn btn-success">Cetak Surat</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Cetak Surat Laporan Nihil -->
                    <!-- Cetak Surat Laporan Profil Risiko -->
                    <div class="card my-2 mx-2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-cetak_lapprofil" aria-expanded="false" aria-controls="flush-cetak_lapprofil">
                                    Cetak Surat Laporan Profil Risiko
                                </button>
                            </h2>
                            <div id="flush-cetak_lapprofil" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <form action="/nomor_surat/cetak_slapprofil" method="POST" class="my-3">
                                    <?= csrf_field(); ?>
                                    <div class="row mb-3 mx-2">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="perihal_surat_lapprofil" name="perihal_surat_lapprofil" value="<?= $surat_baru['perihal_surat']; ?>">
                                                <label for="perihal_surat_lapprofil">Perihal Surat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nomor_surat_lapprofil" name="nomor_surat_lapprofil" value="<?= $nomor_baru; ?>" readonly>
                                                <label for="nomor_surat_lapprofil">Nomor Surat</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tempat_tanggal_lapprofil" name="tempat_tanggal_lapprofil" value="Batam, <?= $tanggal_sekarang  ?>" autocomplete="off">
                                                <label for="tempat_tanggal_lapprofil">Tempat dan Tanggal </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="lampiran_lapprofil" name="lampiran_lapprofil" value="<?= old('lampiran_lapprofil'); ?>" autocomplete="off">
                                                <label for="lampiran_lapprofil">Lampiran</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="tembusan_lapprofil" name="tembusan_lapprofil" value='<?= old('tembusan_lapprofil'); ?>' autocomplete="off">
                                                <label for="tembusan_lapprofil">Tembusan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="yth_lapprofil" name="yth_lapprofil" value="<?= old('yth_lapprofil'); ?>" autocomplete="off">
                                                <label for="yth_lapprofil">Kepada Yth.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="di_lapprofil" name="di_lapprofil" value="<?= $surat_baru['tujuan_surat']; ?>" autocomplete="off">
                                                <label for="di_lapprofil">Di</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2">
                                        <div class="col">
                                            <div class="form-floating">
                                                <textarea class="form-control" id="isi_surat_lapprofil" name="isi_surat_lapprofil" style="height: 100px" value="<?= old('isi_surat_lapprofil'); ?>" autocomplete="off"></textarea>
                                                <label for="isi_surat_lapprofil">Isi Surat</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 mx-2 justify-content-center">
                                        <div class="col col-md-3 text-center">
                                            <button type="submit" class="btn btn-success">Cetak Surat</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Cetak Surat Laporan Profil Risiko -->
                </div>
                <small class="mx-3 my-1 breadcrumb-item active fst-italic">Note : Jika ada template format surat sendiri, dapat menghubungi bagian IT untuk dibuatkan Cetak Template Surat</small>
            </div>
        </div>
    </main>

    <script>
        function fungsicopy() {
            /* Get the text field */
            var copyText = document.getElementById("nomor_surat_baru");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");
        }
    </script>
    <?= $this->endSection(); ?>