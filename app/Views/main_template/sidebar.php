<!-- SIDEBAR -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php if (in_groups('Admin')) : ?>
                        <div class="sb-sidenav-menu-heading">Admin Menu</div>
                        <a class="nav-link <?php
                                            if ($title == "Admin") {
                                                echo "active";
                                            } ?>" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard Admin
                        </a>
                        <a class="nav-link <?php
                                            if ($title == "Akun Pengguna") {
                                                echo "active";
                                            } ?>" href="/admin/akun_pengguna">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Akun Pengguna
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsecuti" aria-expanded="false" aria-controls="collapsecuti">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Cuti Online
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsecuti" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="/admin/tambah_karyawan">Tambah Karyawan</a>
                                <a class="nav-link" href="/admin/data_karyawan">Data Karyawan</a>
                            </nav>
                        </div>

                        <a class="nav-link<?php
                                            if ($title == "Role Akun") {
                                                echo "active";
                                            } ?>" href="/admin/role_akun">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Role Akun
                        </a>
                    <?php endif ?>
                    <div class="sb-sidenav-menu-heading">Pengaturan Profil</div>
                    <a class="nav-link <?php
                                        if ($title == "Profil Saya") {
                                            echo "active";
                                        } ?>" href="/user/pengaturan">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Profil Saya
                    </a>
                    <a class="nav-link <?php if ($title == "Edit Profil") {
                                            echo "active";
                                        } ?>" href="/user/edit_profil">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Edit Profil
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer text-capitalize">
                <div class="small">Logged in as:</div>

                <?php
                $db = \Config\Database::connect();
                $builder = $db->table('users');
                $id = user()->id;
                $builder->select('users.id as userid, username, email, name');
                $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $builder->where('users.id', $id);
                $query = $builder->get();
                $data = $query->getRow();
                echo  $data->name;
                ?>
            </div>
        </nav>
    </div>