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
                        <div class="col text-end">
                            <a title='Add' onclick="add_bcpkm()" type="button" class="btn btn-primary btn-sm mr-2">Add</a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($db_bcpkm as $pkm) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $pkm->nomor_inventaris_pkm; ?></td>
                                    <td><?= $pkm->deskripsi; ?></td>
                                    <td><?= $pkm->jumlah_unit; ?></td>
                                    <td><?= $pkm->lokasi; ?></td>
                                    <td><?= $pkm->remark; ?></td>
                                    <td>
                                        <a title='Edit' onclick="edit_bcpkm('<?= $pkm->nomor_inventaris_pkm; ?>')" type="button" class="btn btn-warning btn-sm">Edit</a>&nbsp;&nbsp;
                                        <a href="/inventaris/bc/pkm/detail/<?= $pkm->nomor_inventaris_pkm; ?>" type="button" class="btn btn-info btn-sm">Detail</a>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel_bcpkm').DataTable();
        });
        var save_method; //for save method string
        var table;

        function add_bcpkm() {
            save_method = 'add';
            $('#form_edit_bcpkm')[0].reset(); // reset form on modals
            $('#modal_edit_bcpkm').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Detail Inventaris');
        }

        function edit_bcpkm(nomor_inventaris_pkm) {
            save_method = 'update';
            $('#form_edit_bcpkm')[0].reset(); // reset form on modals
            <?php header('Content-type: application/json'); ?>
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/inventaris/ajax_get_bcpkm/') ?>/" + nomor_inventaris_pkm,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data[0]);
                    $('[name="nomor_inventaris_pkm"]').val(data[0].nomor_inventaris_pkm);
                    $('[name="nomor"]').val(data[0].nomor);
                    $('[name="tahun"]').val(data[0].tahun);
                    $('[name="deskripsi"]').val(data[0].deskripsi);
                    $('[name="kategori"]').val(data[0].kategori);
                    $('[name="jumlah_unit"]').val(data[0].jumlah_unit);
                    $('[name="lokasi"]').val(data[0].lokasi);
                    $('[name="lokasi_kantor"]').val(data[0].lokasi_kantor);
                    $('[name="image"]').attr('src', "/img/inventaris/bc/pkm/" + data[0].image);
                    $('[name="remark"]').val(data[0].remark);

                    $('.modal-title').text('Edit Detail Inventaris');
                    $('#modal_edit_bcpkm').modal('show'); // show bootstrap modal when complete loaded

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            });
        }

        function simpan_pkm() {
            var url;
            if (save_method == 'add') {
                url = "<?php echo site_url('/inventaris/bcpkm_add/') ?>";
            } else {
                url = "<?php echo site_url('/inventaris/bcpkm_update/') ?>";
            }
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: $('#form_edit_bcpkm').serialize(),
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#modal_edit_bcpkm').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data ' + $('#form_edit_bcpkm').serialize());
                }
            });
        }

        $("#nomor, #tahun").keyup(function() {
            updatee();
        });

        function updatee() {
            $("#nomor_inventaris_pkm").val($('#nomor').val() + " " + $('#tahun').val());
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modal_edit_bcpkm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_edit_bcpkmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_bcpkmLabel">Title</h5>
                </div>
                <div class="modal-body">
                    <form action="#" id="form_edit_bcpkm" name="form_edit_bcpkm" method="POST">
                        <div class="row my-2 mx-2">

                            <div class="col-bg-6 text-center mb-3">
                                <div class="form-group">
                                    <img id="image" name="image" class="card-img-top mb-2" alt="Foto Barang" style="width: 15rem">
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-6 justify-content-center">
                                            <input type="file" class="form-control form-control-sm" id="customFile" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nomor_inventaris_pkm" name="nomor_inventaris_pkm" autocomplete="off">
                                        <label for="floatingSelect">Nomor Inventaris</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nomor" name="nomor" autocomplete="off">
                                        <label for="floatingSelect">Nomor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="tahun" name="tahun" autocomplete="off">
                                        <label for="floatingSelect">Tahun</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off">
                                        <label for="floatingSelect">Deskripsi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="kategori" name="kategori" autocomplete="off">
                                        <label for="floatingSelect">Kategori</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="jumlah_unit" name="jumlah_unit" autocomplete="off">
                                        <label for="floatingSelect">Jumlah Unit</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off">
                                        <label for="floatingSelect">Lokasi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lokasi_kantor" name="lokasi_kantor" autocomplete="off">
                                        <label for="floatingSelect">Lokasi Kantor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="remark" name="remark" autocomplete="off">
                                        <label for="floatingSelect">Remark</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button title='Simpan' onclick="simpan_pkm()" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Tabel Responsive -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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