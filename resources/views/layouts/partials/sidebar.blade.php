@php
    $user = Auth::user();
    $role = $user->getRoleNames()->first();
@endphp

<nav class="pc-sidebar">
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
            {{-- <p>{{ $role }}</p> --}}
        </div>
        <hr>
        <div class="navbar-content">
            <ul class="pc-navbar">
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
                            <a href="../elements/icon-tabler.html" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-journal-bookmark"></i>
                                </span>
                                <span class="pc-mtext mt-3">Modul</span>
                            </a>
                        </li>
                        <li class="pc-item pc-caption">
                            <label data-i18n="Widget">Management</label>
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
                            <a href="{{ route('') }}" class="pc-link">
                                <span class="pc-micon">
                                    <i class="bi bi-mortarboard"></i>
                                </span>
                                <span class="pc-mtext">Kelas</span>
                            </a>
                        </li>
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
    </div>
</nav>
