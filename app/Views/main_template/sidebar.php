<!-- SIDEBAR -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <?php if (in_groups('Admin')) : ?>
                        <div class="sb-sidenav-menu-heading">Admin Menu</div>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard Admin
                        </a>

                        <a class="nav-link" href="/admin/akun_pengguna">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Akun Pengguna
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Role Akun
                        </a>
                    <?php endif ?>
                    <div class="sb-sidenav-menu-heading">Pengaturan Profil</div>
                    <a class="nav-link" href="/user/pengaturan">
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