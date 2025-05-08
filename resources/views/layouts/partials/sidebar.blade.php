<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="mb-1 mt-3 text-center">
            <a href="{{ route('home') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 50px">
            </a>
            <p class="mb-0 mt-1 fs-5">PERCEPATAN</p>
        </div>
        <hr>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="../dashboard/index.html" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#dashboard"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>


                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">UI Components</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                            <use xlink:href="#line-chart"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#font-size"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Typography</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="../elements/bc_color.html" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#bg-colors"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Color</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="../elements/icon-tabler.html" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#highlight"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Icons</span>
                    </a>
                </li>
                {{-- user management --}}
                <li class="pc-item pc-caption">
                    <label data-i18n="Widget">User Management</label>
                    <i class="pc-micon">
                        <svg class="pc-icon">
                            <use xlink:href="#line-chart"></use>
                        </svg>
                    </i>
                </li>
                <li class="pc-item">
                    <a href="../elements/bc_typography.html" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#font-size"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Master User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
