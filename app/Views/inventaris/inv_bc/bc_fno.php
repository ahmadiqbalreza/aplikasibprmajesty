<?= $this->extend('inventaris/layout/template'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Inventaris Furniture Non Besi BPRMGR Batam Center</h3>
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
                            Data Inventaris Furniture Non Besi
                        </div>
                        <div class="col text-end">
                            <a title='Add' onclick="add_bcfno()" type="button" class="btn btn-primary btn-sm mr-2">Add</a>
                            <a href="#" type="button" class="btn btn-primary btn-sm mr-2">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabel_bcfno" class="table table-striped display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Inventaris</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Lokasi</th>
                                <th>Remark</th>
                                <th>Diupdate oleh</th>
                                <th>Terakhir diupdate</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($db_bcfno as $fno) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><a href="#" onclick="view_bcfno('<?= $fno->nomor_inventaris_fno; ?>')"><?= $fno->nomor_inventaris_fno; ?><a></td>
                                    <td><?= $fno->deskripsi; ?></td>
                                    <td><?= $fno->jumlah_unit; ?></td>
                                    <td><?= $fno->lokasi; ?></td>
                                    <td><?= $fno->remark; ?></td>
                                    <td><?= $fno->update_by; ?></td>
                                    <td><?= date('d-m-Y H:i:s', strtotime($fno->last_update)); ?></td>
                                    <td>
                                        <a title='Detail' onclick="view_bcfno('<?= $fno->nomor_inventaris_fno; ?>')" type="button" class="btn btn-info btn-sm">Detail</a>&nbsp;&nbsp;
                                        <a title='Edit' onclick="edit_bcfno('<?= $fno->nomor_inventaris_fno; ?>')" type="button" class="btn btn-warning btn-sm">Edit</a>&nbsp;&nbsp;
                                        <a title='Hapus' onclick="hapus_bcfno('<?= $fno->nomor_inventaris_fno; ?>')" type="button" class="btn btn-danger btn-sm">Hapus</a>
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


    <!-- Modal Edit -->
    <div class="modal fade" id="modal_edit_bcfno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_edit_bcfnoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_bcfnoLabel">Title</h5>
                </div>
                <div class="modal-body">
                    <form action="#" id="form_edit_bcfno" name="form_edit_bcfno" method="POST" enctype="multipart/form-data">
                        <div class="row my-2 mx-2">
                            <div class="col-bg-6 text-center mb-3">
                                <div class="form-group">
                                    <img id="view_foto_barang" name="view_foto_barang" class="img-thumbnail img-preview card-img-top mb-2" alt="Foto Barang" style="width: 15rem">
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-6 justify-content-center">
                                            <input type="file" id="inp_foto_barang" name="inp_foto_barang" class="form-control form-control-sm" onchange="previewimg()" />
                                            <div class="invalid-feedback error_inp_foto_barang">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nomor_inventaris_fno" name="nomor_inventaris_fno" autocomplete="off" disabled>
                                        <div class="invalid-feedback error_nomor_inventaris_fno">

                                        </div>
                                        <label for="floatingSelect">Nomor Inventaris</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <select class="form-select form-control" id="tahun" name="tahun" aria-label="Tahun">

                                        </select>
                                        <div class="invalid-feedback errortahun">

                                        </div>
                                        <label for="floatingSelect">Tahun</label>
                                        <button type="button" onclick="cek_tahun()" class="btn btn-primary btn-sm mt-1" id="cek_tahunn">Gunakan tahun sekarang</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nomor" name="nomor" autocomplete="off">
                                        <div class="invalid-feedback errornomor">

                                        </div>
                                        <label for="floatingSelect">Nomor</label>
                                        <button type="button" onclick="cek_nomor()" class="btn btn-primary btn-sm mt-1" id="cek_nomor_terakhir">Gunakan nomor urut dari database</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off">
                                        <div class="invalid-feedback errordeskripsi">

                                        </div>
                                        <label for="floatingSelect">Deskripsi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="kategori" name="kategori" autocomplete="off" value="FNO" readonly>
                                        <div class="invalid-feedback errorkategori">

                                        </div>
                                        <label for="floatingSelect">Kategori</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="jumlah_unit" name="jumlah_unit" autocomplete="off">
                                        <div class="invalid-feedback errorjumlah_unit">

                                        </div>
                                        <label for="floatingSelect">Jumlah Unit</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off">
                                        <div class="invalid-feedback errorlokasi">

                                        </div>
                                        <label for="floatingSelect">Lokasi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <select class="form-select form-control" id="lokasi_kantor" name="lokasi_kantor" aria-label="lokasi_kantor">

                                        </select>
                                        <div class="invalid-feedback errorlokasi_kantor">

                                        </div>
                                        <label for="lokasi_kantor">Lokasi Kantor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <select class="form-select form-control" id="remark" name="remark" aria-label="remark">

                                        </select>
                                        <div class="invalid-feedback errorremark">

                                        </div>
                                        <label for="remark">Remark</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="keterangan_lain" name="keterangan_lain" autocomplete="off">
                                        <label for="floatingSelect">Keterangan Lain</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button title='Simpan' onclick="simpan_fno()" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail-->
    <div class="modal fade" id="modal_detail_bcfno" tabindex="-1" aria-labelledby="modal_detail_bcfnoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_detail_bcfnoLabel">Title</h5>
                </div>
                <div class="modal-body">
                    <form action="#" id="form_detail_bcfno" name="form_detail_bcfno">
                        <div class="row my-2 mx-2">

                            <div class="col-bg-6 text-center mb-3">
                                <div class="form-group">
                                    <img id="image" name="image" class="card-img-top mb-2" alt="Foto Barang" style="width: 15rem">
                                    <br>
                                </div>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">
                                            <h4 class="text-uppercase fw-bold" id="nomor_inventaris_fno" name="nomor_inventaris_fno"></h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Deskripsi Barang</td>
                                        <td>:</td>
                                        <td name="deskripsi"></td>
                                    </tr>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td name="tahun"></td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>:</td>
                                        <td name="kategori"></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Unit</td>
                                        <td>:</td>
                                        <td name="jumlah_unit"></td>
                                    </tr>
                                    <tr>
                                        <td>Remark</td>
                                        <td>:</td>
                                        <td name="remark"></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan Lain</td>
                                        <td>:</td>
                                        <td name="keterangan_lain"></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td name="lokasi"></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi Kantor</td>
                                        <td>:</td>
                                        <td name="lokasi_kantor"></td>
                                    </tr>
                                    <tr>
                                        <td>Update By</td>
                                        <td>:</td>
                                        <td name="update_by"></td>
                                    </tr>
                                    <tr>
                                        <td>Last Update</td>
                                        <td>:</td>
                                        <td name="last_update"></td>
                                    </tr>
                                </tbody>
                            </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

    <!-- Tabel Responsive -->
    <script>
        $(document).ready(function() {
            $('#tabel_bcfno').DataTable({
                responsive: true
            });
        });
    </script>

    <!-- Preview Img on change file -->
    <script>
        function previewimg() {
            const inp_foto_barang = document.querySelector('#inp_foto_barang');
            const imgview = document.querySelector('.img-preview');
            const filefoto = new FileReader();
            filefoto.readAsDataURL(inp_foto_barang.files[0]);
            filefoto.onload = function(e) {
                imgview.src = e.target.result;
            }
        }
    </script>

    <!-- Script Modal BC fno -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel_bcfno').DataTable();
        });
        var save_method; //for save method string
        var table;

        function add_bcfno() {
            save_method = 'add';

            $('#form_edit_bcfno')[0].reset(); // reset form on modals
            $('#modal_edit_bcfno').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Detail Inventaris');

            $('[name="view_foto_barang"]').removeAttr('src');
            $('[name="tahun"]').find('option').remove();
            $('[name="lokasi_kantor"]').find('option').remove();
            $('[name="remark"]').find('option').remove();

            $('[name="tahun"]').append("<option selected value=''>" + "Pilih Tahun" + "</option>");
            for (var i = 2009; i <= 2030; i++) {
                $('[name="tahun"]').append("<option value='" + i + "'>" + i + "</option>");
            }

            // Select untuk Lokasi Kantor
            $('[name="lokasi_kantor"]').append("<option value='Kantor Batam Center'>Kantor Batam Center</option>");
            $('[name="lokasi_kantor"]').append("<option value='Kantor Penuin'>Kantor Penuin</option>");

            // Select untuk Remark
            $('[name="remark"]').append("<option value=''>Pilih Remark</option>");
            $('[name="remark"]').append("<option value='Bagus'>Bagus</option>");
            $('[name="remark"]').append("<option value='Rusak'>Rusak</option>");
            $('[name="remark"]').append("<option value='Perbaikan'>Perbaikan</option>");

        }

        function edit_bcfno(nomor_inventaris_fno) {
            save_method = 'update';

            // Reset Form Validasi
            var formx = $('#form_edit_bcfno');
            formx.find('.form-control').removeClass('is-invalid');
            formx.find('.form-control').html('');

            $('#form_edit_bcfno')[0].reset(); // reset form on modals
            <?php header('Content-type: application/json'); ?>
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/inventaris/ajax_get_bcfno/') ?>/" + nomor_inventaris_fno,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data[0]);
                    $('[name="nomor_inventaris_fno"]').val(data[0].nomor_inventaris_fno);
                    $('[name="nomor"]').val(data[0].nomor).attr("disabled", true);

                    // Select untuk Tahun
                    $('[name="tahun"]').append("<option value='" + data[0].tahun + "'>" + data[0].tahun + "</option>").attr("disabled", true);
                    // for (var i = 2009; i <= 2030; i++) {
                    //     $('[name="tahun"]').append("<option value='" + i + "'>" + i + "</option>");
                    // }

                    $('[id="cek_tahunn"]').remove();
                    $('[id="cek_nomor_terakhir"]').remove();

                    $('[name="deskripsi"]').val(data[0].deskripsi);
                    $('[name="kategori"]').val(data[0].kategori);
                    $('[name="jumlah_unit"]').val(data[0].jumlah_unit);
                    $('[name="lokasi"]').val(data[0].lokasi);

                    // Select untuk Lokasi Kantor
                    $('[name="lokasi_kantor"]').append("<option value='" + data[0].lokasi_kantor + "'>" + data[0].lokasi_kantor + "</option>");
                    $('[name="lokasi_kantor"]').append("<option value='Kantor Batam Center'>Kantor Batam Center</option>");
                    $('[name="lokasi_kantor"]').append("<option value='Kantor Penuin'>Kantor Penuin</option>");

                    // Select untuk Remark
                    $('[name="remark"]').append("<option value=''>Pilih Remark</option>");
                    $('[name="remark"]').append("<option value='Bagus'>Bagus</option>");
                    $('[name="remark"]').append("<option value='Rusak'>Rusak</option>");
                    $('[name="remark"]').append("<option value='Perbaikan'>Perbaikan</option>");

                    $('[name="view_foto_barang"]').attr('src', "/img/inventaris/bc/fno/" + data[0].image);
                    $('[name="remark"]').val(data[0].remark);
                    $('[name="keterangan_lain"]').val(data[0].keterangan_lain);

                    $('.modal-title').text('Edit Detail Inventaris');
                    $('#modal_edit_bcfno').modal('show'); // show bootstrap modal when complete loaded

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ada sesuatu yang error nih!, Coba deh kamu tanyakan ke bagian IT!'
                    })
                }
            });
        }

        function simpan_fno() {
            var url;
            if (save_method == 'add') {
                url = "<?php echo site_url('/inventaris/bcfno_add/') ?>";
            } else {
                url = "<?php echo site_url('/inventaris/bcfno_update/') ?>";
            }
            // ajax adding data to database
            var nomor_inventaris_fno = $('#nomor_inventaris_fno').val();

            var formDatafno = new FormData();
            // Attach file
            formDatafno.append('inp_foto_barang', $('#inp_foto_barang')[0].files[0]);
            formDatafno.append('nomor_inventaris_fno', $('#nomor_inventaris_fno').val());
            formDatafno.append('nomor', $('#nomor').val());
            formDatafno.append('tahun', $('#tahun').val());
            formDatafno.append('deskripsi', $('#deskripsi').val());
            formDatafno.append('kategori', $('#kategori').val());
            formDatafno.append('jumlah_unit', $('#jumlah_unit').val());
            formDatafno.append('lokasi', $('#lokasi').val());
            formDatafno.append('lokasi_kantor', $('#lokasi_kantor').val());
            formDatafno.append('remark', $('#remark').val());
            formDatafno.append('keterangan_lain', $('#keterangan_lain').val());

            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: formDatafno,
                contentType: false,
                processData: false,
                success: function(data) {
                    //if success close modal and reload ajax table
                    if (data.error) {
                        if (data.error.nomor_inventaris_fno) {
                            $('#nomor_inventaris_fno').addClass('is-invalid');
                            $('.error_nomor_inventaris_fno').html(data.error.nomor_inventaris_fno);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.error.nomor_inventaris_fno
                            })
                        } else {
                            $('#nomor_inventaris_fno').removeClass('is-invalid');
                            $('.error_nomor_inventaris_fno').html('');
                        }

                        if (data.error.inp_foto_barang) {
                            $('#inp_foto_barang').addClass('is-invalid');
                            $('.error_inp_foto_barang').html(data.error.inp_foto_barang);
                        } else {
                            $('#inp_foto_barang').removeClass('is-invalid');
                            $('.error_inp_foto_barang').html('');
                        }

                        if (data.error.nomor) {
                            $('#nomor').addClass('is-invalid');
                            $('.errornomor').html(data.error.nomor);
                        } else {
                            $('#nomor').removeClass('is-invalid');
                            $('.errornomor').html('');
                        }

                        if (data.error.tahun) {
                            $('#tahun').addClass('is-invalid');
                            $('.errortahun').html(data.error.tahun);
                        } else {
                            $('#tahun').removeClass('is-invalid');
                            $('.errortahun').html('');
                        }

                        if (data.error.deskripsi) {
                            $('#deskripsi').addClass('is-invalid');
                            $('.errordeskripsi').html(data.error.deskripsi);
                        } else {
                            $('#deskripsi').removeClass('is-invalid');
                            $('.errordeskripsi').html('');
                        }

                        if (data.error.kategori) {
                            $('#kategori').addClass('is-invalid');
                            $('.errorkategori').html(data.error.kategori);
                        } else {
                            $('#kategori').removeClass('is-invalid');
                            $('.errorkategori').html('');
                        }

                        if (data.error.jumlah_unit) {
                            $('#jumlah_unit').addClass('is-invalid');
                            $('.errorjumlah_unit').html(data.error.jumlah_unit);
                        } else {
                            $('#jumlah_unit').removeClass('is-invalid');
                            $('.errorjumlah_unit').html('');
                        }

                        if (data.error.lokasi) {
                            $('#lokasi').addClass('is-invalid');
                            $('.errorlokasi').html(data.error.lokasi);
                        } else {
                            $('#lokasi').removeClass('is-invalid');
                            $('.errorlokasi').html('');
                        }

                        if (data.error.lokasi_kantor) {
                            $('#lokasi_kantor').addClass('is-invalid');
                            $('.errorlokasi_kantor').html(data.error.lokasi_kantor);
                        } else {
                            $('#lokasi_kantor').removeClass('is-invalid');
                            $('.errorlokasi_kantor').html('');
                        }

                        if (data.error.remark) {
                            $('#remark').addClass('is-invalid');
                            $('.errorremark').html(data.error.remark);
                        } else {
                            $('#remark').removeClass('is-invalid');
                            $('.errorremark').html('');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ada Field yang belum diisi atau data tidak sesuai nih! Cek Ulang yaa!'
                        })
                    } else {
                        $('#modal_edit_bcfno').modal('hide');
                        // console.log(data[0].error);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data berhasil disimpan ke database!',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Oke!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // for reload a page
                            }
                        })
                    }
                },
                error: function(jqXHR, textStatus, errorThrown, data) {
                    // alert(data);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ada sesuatu yang error nih!, Coba deh kamu tanyakan ke bagian IT! Kesalahan : ' + data
                    })
                }
            });
        }

        function hapus_bcfno(nomor_inventaris_fno) {
            Swal.fire({
                title: 'Anda yakin ingin menghapus data ini?',
                text: "Data akan terhapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo site_url('/inventaris/bcfno_delete/') ?>/" + nomor_inventaris_fno,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            Swal.fire(
                                'Berhasil dihapus!',
                                'Data berhasil dihapus dari database.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error deleting data');
                        }
                    });
                }
            })
        }

        function view_bcfno(nomor_inventaris_fno) {
            $('#form_detail_bcfno')[0].reset(); // reset form on modals
            <?php header('Content-type: application/json'); ?>
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/inventaris/ajax_get_bcfno/') ?>/" + nomor_inventaris_fno,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data[0]);
                    $('[name="nomor_inventaris_fno"]').text(data[0].nomor_inventaris_fno);
                    $('[name="nomor"]').text(data[0].nomor);
                    $('[name="tahun"]').text(data[0].tahun);
                    $('[name="deskripsi"]').text(data[0].deskripsi);
                    $('[name="kategori"]').text(data[0].kategori);
                    $('[name="jumlah_unit"]').text(data[0].jumlah_unit);
                    $('[name="lokasi"]').text(data[0].lokasi);
                    $('[name="lokasi_kantor"]').text(data[0].lokasi_kantor);
                    $('[name="image"]').attr('src', "/img/inventaris/bc/fno/" + data[0].image);
                    $('[name="remark"]').text(data[0].remark);
                    $('[name="keterangan_lain"]').text(data[0].keterangan_lain);
                    $('[name="update_by"]').text(data[0].update_by);
                    $('[name="last_update"]').text(data[0].last_update);

                    $('.modal-title').text('Detail Inventaris');
                    $('#modal_detail_bcfno').modal('show'); // show bootstrap modal when complete loaded

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            });
        }

        $("#tahun").change(function() {
            updatee();
        });

        $("#nomor").keyup(function() {
            updatee();
        });

        function cek_nomor() {
            $.ajax({
                url: "<?php echo site_url('/inventaris/ajax_get_nomor_terakhir_fno/') ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data[0]);
                    if (data[0] != null) {
                        $("#nomor").val(parseInt(data[0].nomor) + 1);
                    } else {
                        $("#nomor").val("1");
                    }
                    updatee();
                }
            });
        }

        function cek_tahun() {
            document.getElementById("tahun").value = new Date().getFullYear();
            updatee();
        }

        function updatee() {
            $("#nomor_inventaris_fno").val("BC-" + $('#tahun').val() + "-FNO-" + $('#nomor').val());
        }
    </script>

    <?= $this->endSection(); ?>