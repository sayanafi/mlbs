<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?= ($menu == 'dashboard') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php if (session()->get('role_id') == 1) {
                                            echo base_url() .  '/admin';
                                        } else if (session()->get('role_id') == 2) {
                                            echo base_url() .  '/manajemen';
                                        } else if (session()->get('role_id') == 3) {
                                            echo base_url() .  '/staff';
                                        } else if (session()->get('role_id') == 4) {
                                            echo base_url() .  '/konsultan';
                                        } ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <?php if (session()->get('role_id') == 1) : ?>
            <li class="nav-item <?= ($menu == 'usermanagement') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url(); ?>/usermanagement">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">User Management</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (session()->get('role_id') != 1) : ?>
            <li class="nav-item" <?= ($menu == 'juknis') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#juknis" aria-expanded="false" aria-controls="juknis">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Juknis</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="juknis">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/juknis">List Juknis</a></li>
                        <?php if (session()->get('role_id') == 2 and session()->get('role_id') == 4) : ?>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/nilaiJuknis">Nilai Juknis</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </li>


            <li class="nav-item <?= ($menu == 'spo') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#spo" aria-expanded="false" aria-controls="spo">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Spo</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="spo">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/spo">List SPO</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#rekapnilai" aria-expanded="false" aria-controls="rekapnilai">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Rekap Nilai</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="rekapnilai">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">List Nilai</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?= ($menu == 'standarpelayanan') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#standarpelayanan" aria-expanded="false" aria-controls="standarpelayanan">
                    <i class="icon-contract menu-icon"></i>
                    <span class="menu-title">Standar Pelayanan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="standarpelayanan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/standarpelayanan">List Dokumen</a></li>
                    </ul>
                </div>
            </li>
        <?php endif; ?>
        <?php if (session()->get('role_id') == 2) : ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#validasi" aria-expanded="false" aria-controls="validasi">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Validasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="validasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">List Validasi</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?= ($menu == 'staffmanagement') ? 'active' : ''; ?>">
                <a class="nav-link" href="<?= base_url(); ?>/staffmanagement">
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">User Management</span>
                </a>
            </li>

            <li class="nav-item <?= ($menu == 'inventaris') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#inventaris" aria-expanded="false" aria-controls="inventaris">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Inventaris</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="inventaris">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/inventaris"> List Inventaris </a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item <?= ($menu == 'unit') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#unit" aria-expanded="false" aria-controls="unit">
                    <i class="icon-ban menu-icon"></i>
                    <span class="menu-title">Unit</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="unit">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/unit"> List Unit </a></li>

                    </ul>
                </div>
            </li>
        <?php endif; ?>

        <?php if (session()->get('role_id') == 4) : ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#validasi" aria-expanded="false" aria-controls="validasi">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Validasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="validasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">List Validasi</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item <?= ($menu == 'inventaris') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#inventaris" aria-expanded="false" aria-controls="inventaris">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Inventaris</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="inventaris">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/inventaris"> List Inventaris </a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item <?= ($menu == 'unit') ? 'active' : ''; ?>">
                <a class="nav-link" data-toggle="collapse" href="#unit" aria-expanded="false" aria-controls="unit">
                    <i class="icon-ban menu-icon"></i>
                    <span class="menu-title">Unit</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="unit">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>/unit"> List Unit </a></li>

                    </ul>
                </div>
            </li>
        <?php endif; ?>

    </ul>
</nav>