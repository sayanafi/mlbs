<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?= ($menu == 'dashboard') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php if (session()->get('role_id') == 1) {
                                            echo 'admin';
                                        } else if (session()->get('role_id') == 2) {
                                            echo 'manajemen';
                                        } else if (session()->get('role_id') == 3) {
                                            echo 'staff';
                                        } else if (session()->get('role_id') == 4) {
                                            echo 'konsultan';
                                        } ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?= ($menu == 'usermanagement') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url(); ?>/usermanagement">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>