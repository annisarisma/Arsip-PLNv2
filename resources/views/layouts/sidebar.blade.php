<div class="sidebar">
    <!-- Logo -->
    <div class="logo-details">
        <img src="Assets/Img/kalla Group Logo 1.png" alt="">
        <span class="logo_name">PT PLN UPP JBT</span>
    </div>
    <!-- End of Logo -->

    <ul class="nav-links">
        <!-- Menu Beranda -->
        <li class="{{ $title == 'Beranda' ? 'active' : '' }}">
            <div class="icon-link">
                <i class="fa-solid fa-house icon"></i>
                <a href="/home">
                    <span class="link_name">Beranda</span>
                </a>
            </div>
        </li>

        @if (auth()->user()->role == 'superadmin')
            <!-- Menu Kategori -->
            <li class="{{ $title == 'Kategori' ? 'active' : '' }}">
                <div class="icon-link">
                    <i class="fa-solid fa-layer-group icon"></i>
                    <a href="/category">
                        <span class="link_name">Kelola Kategori</span>
                    </a>
                </div>
            </li>

            <!-- Menu Arsip -->
            <li class="{{ $title == 'Semua Bidang' ||
                $title == 'ADM & Keuangan' ||
                $title == 'Perizinan & Pertahanan' ||
                $title == 'K3L' ||
                $title == 'Teknik'
                ? 'active'
                : '' }}">
                <div class="icon-link">
                    <i class="fa-solid fa-clipboard-list icon"></i>
                    <a>
                        <span class="link_name">Arsip</span>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </a>
                </div>
                <!-- Sub Menu -->
                <ul class="sub-menu">
                    <li class="{{ $title == 'Semua Bidang' ? 'active' : '' }}">
                        <div class="main-sub-menu">
                            <a href="/archive/semua">
                                <span class="name-sub">Semua Bidang</span>
                            </a>
                        </div>
                    </li>
                    <li class="{{ $title == 'ADM & Keuangan' ? 'active' : '' }}">
                        <div class="main-sub-menu">
                            <a href="/archive/adm-keuangan">
                                <span class="name-sub">ADM & Keuangan</span>
                            </a>
                        </div>
                    </li>
                    <li class="{{ $title == 'Perizinan & Pertahanan' ? 'active' : '' }}">
                        <div class="main-sub-menu">
                            <a href="/archive/perizinan-pertanahan">
                                <span class="name-sub">Perizinan Pertahanan</span>
                            </a>
                        </div>
                    </li>
                    <li class="{{ $title == 'K3L' ? 'active' : '' }}">
                        <div class="main-sub-menu">
                            <a href="/archive/k3l">
                                <span class="name-sub">K3L</span>
                            </a>
                        </div>
                    </li>
                    <li class="{{ $title == 'Teknik' ? 'active' : '' }}">
                        <div class="main-sub-menu">
                            <a href="/archive/teknik">
                                <span class="name-sub">Teknik</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>

            <!-- Menu Management User -->
            <li>
                <div class="icon-link">
                    <i class="fa-solid fa-user-gear icon"></i>
                    <a href="/manage-user">
                        <span class="link_name">Kelola Pengguna</span>
                    </a>
                </div>
            </li>

        @else
             <!-- Menu Arsip -->
            <li class="{{ $title == 'Semua Bidang' ||
                $title == 'ADM & Keuangan' ||
                $title == 'Perizinan & Pertahanan' ||
                $title == 'K3L' ||
                $title == 'Teknik'
                ? 'active'
                : '' }}">
                <div class="icon-link">
                    <i class="fa-solid fa-clipboard-list icon"></i>
                    <a>
                        <span class="link_name">Arsip</span>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </a>
                </div>
                <!-- Sub Menu -->
                <ul class="sub-menu">
                    <li class="{{ $title == 'Semua Bidang' ? 'active' : '' }}">
                        <div class="main-sub-menu">
                            <a href="/archive/semua">
                                <span class="name-sub">Semua Bidang</span>
                            </a>
                        </div>
                    </li>
                    @if (auth()->user()->unit_id == '1')
                        <li class="{{ $title == 'ADM & Keuangan' ? 'active' : '' }}">
                            <div class="main-sub-menu">
                                <a href="/archive/adm-keuangan">
                                    <span class="name-sub">ADM & Keuangan</span>
                                </a>
                            </div>
                        </li>
                    @elseif (auth()->user()->unit_id == '2')
                        <li class="{{ $title == 'Perizinan & Pertahanan' ? 'active' : '' }}">
                            <div class="main-sub-menu">
                                <a href="/archive/perizinan-pertahanan">
                                    <span class="name-sub">Perizinan Pertahanan</span>
                                </a>
                            </div>
                        </li>
                    @elseif (auth()->user()->unit_id == '3')
                        <li class="{{ $title == 'K3L' ? 'active' : '' }}">
                            <div class="main-sub-menu">
                                <a href="/archive/k3l">
                                    <span class="name-sub">K3L</span>
                                </a>
                            </div>
                        </li>
                    @elseif (auth()->user()->unit_id == '4')
                        <li class="{{ $title == 'Teknik' ? 'active' : '' }}">
                            <div class="main-sub-menu">
                                <a href="/archive/teknik">
                                    <span class="name-sub">Teknik</span>
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Menu User -->
        <li class="{{ $title == 'User' ? 'active' : '' }}">
            <div class="icon-link">
                <i class="fa-solid fa-user icon"></i>
                <a href="/user">
                    <span class="link_name">Akun Saya</span>
                </a>
            </div>
        </li>
    </ul>
</div>