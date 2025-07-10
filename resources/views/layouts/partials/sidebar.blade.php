@php
    $user = Auth::user();
    $role = $user->getRoleNames()->first();
@endphp

<nav class="pc-sidebar overflow-auto">
    <div class="navbar-wrapper">
        <div class="mb-1 pt-3 text-center">
            <a href="{{ route('home') }}" class="b-brand text-primary">
                <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 50px">
            </a>
            <p class="mb-0 mt-1 fs-5">PERCEPATAN</p>
        </div>
        <hr>
        <div class="text-center">
            <p> {{ $user->name }}</p>
        </div>
        <hr>

        <ul class="pc-navbar  ">
            @switch($role)
                @case('admin')
                    <li class="pc-item">
                        <a href="{{ route('home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label data-i18n="Widget">Kelas</label>
                    </li>

                    <li class="pc-item">
                        <a href="{{ route('payment.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-wallet"></i>
                            </span>
                            <span class="pc-mtext">Pembayaran</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('course.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-mortarboard"></i>
                            </span>
                            <span class="pc-mtext">Kelas</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('ebook.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-journal-bookmark"></i>
                            </span>
                            <span class="pc-mtext mt-3">Ebook</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label data-i18n="Widget">Marketing</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('reseller') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-cart"></i>
                            </span>
                            <span class="pc-mtext">Reseller</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('affiliator') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-at"></i>
                            </span>
                            <span class="pc-mtext">Affiliator</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('commission.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-coin"></i>
                            </span>
                            <span class="pc-mtext">Pembayaran Komisi</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label data-i18n="Widget">Management</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('tracking.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-list-check"></i>
                            </span>
                            <span class="pc-mtext">Tracking Video</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('user.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-people"></i>
                            </span>
                            <span class="pc-mtext">Master User</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('setting.index') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-gear"></i>
                            </span>
                            <span class="pc-mtext">Settings</span>
                        </a>
                    </li>
                @break

                @case('user')
                    <li class="pc-item">
                        <a href="{{ route('home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('usercourse') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-mortarboard"></i>
                            </span>
                            <span class="pc-mtext">Kelas</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('userebook') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-journal-bookmark"></i>
                            </span>
                            <span class="pc-mtext mt-3">Ebook</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('profile') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-person"></i>
                            </span>
                            <span class="pc-mtext">Profil</span>
                        </a>
                    </li>
                @break

                @case('reseller')
                    <li class="pc-item">
                        <a href="{{ route('home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    @if ($user->status == 1)
                        <li class="pc-item">
                            <a href="{{ route('soldbyreseller') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-cart2"></i>
                                </span>
                                <span class="pc-mtext">Daftar Pembeli</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('commissionbyreseller') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-coin"></i>
                                </span>
                                <span class="pc-mtext">Pembayaran Komisi</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('profile') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-person"></i>
                                </span>
                                <span class="pc-mtext">Profil</span>
                            </a>
                        </li>
                    @endif
                @break

                @case('affiliator')
                    <li class="pc-item">
                        <a href="{{ route('home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    @if ($user->status == 1)
                        <li class="pc-item">
                            <a href="{{ route('soldbyaffiliator') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-cart2"></i>
                                </span>
                                <span class="pc-mtext">Daftar Pembeli</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('commissionbyaffiliator') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-coin"></i>
                                </span>
                                <span class="pc-mtext">Pembayaran Komisi</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('profile') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-person"></i>
                                </span>
                                <span class="pc-mtext">Profil</span>
                            </a>
                        </li>
                    @endif
                @break

                @default
                    <li class="pc-item">
                        <a href="{{ route('home') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
            @endswitch
        </ul>

    </div>
</nav>
