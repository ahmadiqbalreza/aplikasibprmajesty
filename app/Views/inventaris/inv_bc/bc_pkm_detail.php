<?= $this->extend('inventaris/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Detail Nomor Inventaris</h3>
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
                            Detail Barang
                        </div>
                        <div class="col-4 text-end">
                            <a href="#" type="button" class="btn btn-primary btn-sm mr-2">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php foreach ($db_bcpkm as $pkm) : ?>
                        <div class="row justify-content-center">
                            <div class="card mb-2 text-center" style="width: 18rem;">
                                <?php if ($pkm['image'] != null) : ?>
                                    <img src="\img\inventaris\bc\pkm\<?= $pkm['image']; ?>" class="card-img-top" alt="Gambar Barang">
                                <?php else : ?>
                                    <h6>Data Gambar Tidak Ada!</h6>
                                <?php endif; ?>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">
                                            <h4 class="text-uppercase fw-bold"><?= $nomor_inventaris; ?></h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Deskripsi Barang</td>
                                        <td>:</td>
                                        <td><?= $pkm['deskripsi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td><?= $pkm['tahun']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td><?= $pkm['kategori']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Unit</td>
                                        <td>:</td>
                                        <td><?= $pkm['jumlah_unit']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Remark</td>
                                        <td>:</td>
                                        <td><?= $pkm['remark']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td><?= $pkm['lokasi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi Kantor</td>
                                        <td>:</td>
                                        <td><?= $pkm['lokasi_kantor']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Update By</td>
                                        <td>:</td>
                                        <td><?= $pkm['update_by']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last Update</td>
                                        <td>:</td>
                                        <td><?= $pkm['last_update']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>


    <!-- Tabel Responsive -->
    <!-- Bootstrap CSS -->
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel_bcpkm').DataTable({
                responsive: true
            });
        });
    </script>

    <?= $this->endSection(); ?>