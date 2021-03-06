<!-- SIDEBAR -->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu Utama</div>
                    <a class="nav-link <?php
                                        if ($title == "Beranda") {
                                            echo "active";
                                        } ?>" href="/nomor_surat">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Beranda
                    </a>
                    <a class="nav-link <?php
                                        if ($title == "Penomoran") {
                                            echo "active";
                                        } ?>" href="/nomor_surat/penomoran/">
                        <div class="sb-nav-link-icon"><i class="fas fa fa-plus-square"></i></div>
                        Nomor Surat Baru
                    </a>
                    <a class="nav-link <?php
                                        if ($title == "Cetak Template Surat") {
                                            echo "active";
                                        } ?>" href="/nomor_surat/cetak_surat/">
                        <div class="sb-nav-link-icon"><i class="fas fa fa-book"></i></div>
                        Cetak Template Surat
                    </a>
                    <a class="nav-link" href="/nomor_surat/petunjuk/">
                        <div class="sb-nav-link-icon"><i class="fas fa fa-info-circle"></i></div>
                        Petunjuk
                    </a>
                    <?php if (in_groups('HRD') or in_groups('Admin')) : ?>
                        <div class="sb-sidenav-menu-heading">Menu Tambahan</div>
                        <a class="nav-link <?php
                                            if ($title == "Penggunaan Nomor") {
                                                echo "active";
                                            } ?>" href="/nomor_surat/penggunaan_nomor">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Penggunaan Nomor
                        </a>
                    <?php endif ?>
                </div>
            </div>
            <div class="sb-sidenav-footer">
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