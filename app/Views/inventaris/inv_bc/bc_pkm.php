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
                        <div class="col-4 text-end">
                            <a href="#" type="button" class="btn btn-primary btn-sm mr-2">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabel_bcpkm" class="table table-striped display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Inventaris</th>
                                <th>Deskripsi</th>
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


    <!-- Tabel Responsive -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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