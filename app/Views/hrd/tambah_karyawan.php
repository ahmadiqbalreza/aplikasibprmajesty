<?= $this->extend('/main_template/template_pengaturan'); ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Karyawan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">PT.BPR Majesty Golden Raya</li>
            </ol>

            <div class="card mb-4">
                <ol class="breadcrumb my-1 mx-1">
                    <li class="breadcrumb-item active small">Form Input</li>
                </ol>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="" method="" name="form_tambah_karyawan" id="form_tambah_karyawan">
                    <?= csrf_field() ?>
                    <div class="row my-2 mx-2">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control  <?= ($validation->hasError('id_karyawan')) ? 'is-invalid' : ''; ?>" id="id_karyawan" name="id_karyawan" placeholder="ID Karyawan" value="<?= old('id_karyawan'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_karyawan'); ?>
                                </div>
                                <label for="id_karyawan">ID Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="Fullname" value="<?= old('fullname'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fullname'); ?>
                                </div>
                                <label for="fullname">Nama Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email" value="<?= old('email'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username" value="<?= old('username'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password" value="<?= old('password'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control <?= ($validation->hasError('pass_confirm')) ? 'is-invalid' : ''; ?>" id="pass_confirm" name="pass_confirm" placeholder="pass_confirm" value="<?= old('pass_confirm'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pass_confirm'); ?>
                                </div>
                                <label for="pass_confirm">Konfirmasi Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('department')) ? 'is-invalid' : ''; ?>" id="department" name="department" placeholder="Department" value="<?= old('department'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('department'); ?>
                                </div>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('status_karyawan')) ? 'is-invalid' : ''; ?>" id="status_karyawan" name="status_karyawan" placeholder="Status Karyawan" value="<?= old('status_karyawan'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('status_karyawan'); ?>
                                </div>
                                <label for="status_karyawan">Status Karyawan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= old('tempat_lahir'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tempat_lahir'); ?>
                                </div>
                                <label for="tempat_lahir">Tempat Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= old('tgl_lahir'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgl_lahir'); ?>
                                </div>
                                <label for="tgl_lahir">Tanggal Lahir</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= old('jenis_kelamin'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_kelamin'); ?>
                                </div>
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="Nomor Telp" value="<?= old('phone'); ?>" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phone'); ?>
                                </div>
                                <label for="phone">Nomor Telp</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <textarea class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" placeholder="Alamat" id="alamat" style="height: 100px" value="<?= old('alamat'); ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                                <label for="alamat">Alamat</label>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-3 my-1 mx-1">
                            <div class="col col-md-3 text-center">
                                <button type="submit" class="btn btn-success" id="submit_tambah_karyawan" name="submit_tambah_karyawan">Tambah Karyawan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <script type="text/javascript">
                $("#submit_tambah_karyawan").click(function() {
                    var id_karyawan = $('#id_karyawan').val();
                    var fullname = $('#fullname').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var pass_confirm = $('#pass_confirm').val();
                    var tempat_lahir = $('#tempat_lahir').val();
                    var tgl_lahir = $('#tgl_lahir').val();
                    var jenis_kelamin = $('#jenis_kelamin').val();
                    var alamat = $('#alamat').val();
                    var phone = $('#phone').val();
                    var email = $('#email').val();
                    var department = $('#department').val();
                    var status_karyawan = $('status_karyawan').val();
                    $.ajax({
                        url: '<?= route_to('register') ?>',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            id_karyawan: id_karyawan,
                            fullname: fullname,
                            username: username,
                            password: password,
                            pass_confirm: pass_confirm,
                            tempat_lahir: tempat_lahir,
                            tgl_lahir: tgl_lahir,
                            jenis_kelamin: jenis_kelamin,
                            alamat: alamat,
                            phone: phone,
                            email: email,
                            department: department
                        }
                    });
                });

                $("#submit_tambah_karyawan").click(function() {
                    var id_karyawan = $('#id_karyawan').val();
                    var fullname = $('#fullname').val();
                    var username = $('#username').val();
                    var tempat_lahir = $('#tempat_lahir').val();
                    var tgl_lahir = $('#tgl_lahir').val();
                    var jenis_kelamin = $('#jenis_kelamin').val();
                    var alamat = $('#alamat').val();
                    var phone = $('#phone').val();
                    var email = $('#email').val();
                    var department = $('#department').val();
                    $.ajax({
                        url: '/hrd/insert_table_karyawan',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            id_karyawan: id_karyawan,
                            fullname: fullname,
                            username: username,
                            tempat_lahir: tempat_lahir,
                            tgl_lahir: tgl_lahir,
                            jenis_kelamin: jenis_kelamin,
                            alamat: alamat,
                            phone: phone,
                            email: email,
                            department: department
                        },
                        success: function() {
                            alert = "Data Berhasil disimpan!";
                        }
                    });
                });
            </script>

        </div>
    </main>
    <?= $this->endSection(); ?>