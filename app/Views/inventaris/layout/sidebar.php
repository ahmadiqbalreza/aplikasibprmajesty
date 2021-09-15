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
                                        } ?>" href="/inventaris">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Beranda
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_inv_bc" aria-expanded="false" aria-controls="collapse_inv_bc">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Batam Center
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php
                                            if ($title == "Batam Center" or $title == "PKM" or $title == "PRK" or $title == "FNO" or $title == "FNB") {
                                                echo "show";
                                            } ?>" id="collapse_inv_bc" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/inventaris/bc/add">Tambah Data</a>
                            <a class="nav-link <?php
                                                if ($title == "Batam Center") {
                                                    echo "active";
                                                } ?>" href="/inventaris/bc">Data Inventaris</a>
                            <a class="nav-link <?php
                                                if ($title == "PKM") {
                                                    echo "active";
                                                } ?>" href="/inventaris/bc/pkm">Peralatan Komputer</a>
                            <a class="nav-link <?php
                                                if ($title == "PRK") {
                                                    echo "active";
                                                } ?>" href="/inventaris/bc/prk">Peralatan Kantor</a>
                            <a class="nav-link <?php
                                                if ($title == "FNO") {
                                                    echo "active";
                                                } ?>" href="/inventaris/bc/fno">Furniture Non Besi</a>
                            <a class="nav-link <?php
                                                if ($title == "FNB") {
                                                    echo "active";
                                                } ?>" href="/inventaris/bc/fnb">Furniture Besi</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse_inventaris" aria-expanded="false" aria-controls="collapse_inventaris">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Inventaris
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapse_inventaris" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/hrd/add_karyawan_nosur">Tambah Karyawan</a>
                            <a class="nav-link" href="/hrd/data_karyawan">Data Karyawan</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsecuti" aria-expanded="false" aria-controls="collapsecuti">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Cuti Online
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsecuti" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/hrd/tambah_karyawan">Tambah Karyawan</a>
                            <a class="nav-link" href="/hrd/data_karyawan">Data Karyawan</a>
                        </nav>
                    </div>
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