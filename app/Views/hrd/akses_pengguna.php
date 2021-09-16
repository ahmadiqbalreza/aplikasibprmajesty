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
                    <table id="tabel_akses" class="tabell">
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
                                        <a title='Edit Akses' onclick="edit_akses(<?php echo $user->userid; ?>)" class="btn btn-outline-primary btn-sm">Edit</a>
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
            $('#tabel_akses').DataTable();
        });
        var save_method; //for save method string
        var table;

        function edit_akses(id) {
            save_method = 'update';
            $('#form_edit_akses')[0].reset(); // reset form on modals
            <?php header('Content-type: application/json'); ?>
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/hrd/ajax_edit/') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);

                    $('[name="sel_access_nomor_surat"]').val(data.access_nomor_surat);
                    $('[name="sel_access_inventaris"]').val(data.access_inventaris);
                    $('[name="sel_access_cuti_online"]').val(data.access_cuti_online);
                    $('[name="id_kar"]').val(data.id);
                    $('[name="username"]').val(data.username);
                    $('[name="id_karyawan"]').text('ID Karyawan : ' + data.id);
                    $('[name="nama_karyawan"]').text('Nama Karyawan : ' + data.fullname);
                    $('[name="username"]').text('Username : ' + data.username);

                    $('#modal_form_edit_akses').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Akses APP'); // Set title to Bootstrap modal title

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            });
        }

        function save() {
            var url;
            var id_kar = $("#id_kar").val();
            if (save_method == 'add') {
                url = "<?php echo site_url('/hrd/akses_add/') ?>/" + id_kar;
            } else {
                url = "<?php echo site_url('/hrd/akses_update/') ?>";
            }
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                dataType: "JSON",
                data: $('#form_edit_akses').serialize(),
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#modal_form_edit_akses').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data ' + $('#form_edit_akses').serialize());
                }
            });
        }
    </script>

    <!-- Modal Edit Akses APP -->
    <div class="modal fade" id="modal_form_edit_akses" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_form_edit_aksesLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form_edit_akses" name="form_edit_akses" method="POST">
                        <div class="row my-2 mx-2">
                            <input type="hidden" value="" name="id_kar" />
                            <input type="hidden" value="" name="username" />
                            <h6 class="mb-1" name="id_karyawan"></h6>
                            <h6 class="mb-1" name="nama_karyawan"></h6>
                            <h6 class="mb-4" name="username"></h6>

                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <select class="form-select form-control" id="sel_access_nomor_surat" name="sel_access_nomor_surat" aria-label="Nomor Surat">
                                            <option value="0">❌ No Access</option>
                                            <option value="1">✅ Access</option>
                                        </select>
                                        <!-- <input name="sel_access_nomor_surat" placeholder="sel_access_nomor_surat" value="" class="form-control" type="text"> -->
                                        <label for="floatingSelect">App Nomor Surat</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <select class="form-select form-control" id="sel_access_inventaris" name="sel_access_inventaris" aria-label="Inventaris">
                                            <option value="0">❌ No Access</option>
                                            <option value="1">✅ Access</option>
                                        </select>
                                        <!-- <input name="sel_access_inventaris" placeholder="sel_access_inventaris" value="" class="form-control" type="text"> -->
                                        <label for="floatingSelect">App Inventaris</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-bg-6">
                                <div class="form-group">
                                    <div class="form-floating mb-3">
                                        <select class="form-select form-control" id="sel_access_cuti_online" name="sel_access_cuti_online" aria-label="Cuti Online">
                                            <option value="0">❌ No Access</option>
                                            <option value="1">✅ Access</option>
                                        </select>
                                        <!-- <input name="sel_access_cuti_online" placeholder="sel_access_cuti_online" value="" class="form-control" type="text"> -->
                                        <label for="floatingSelect">App Cuti Online</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>