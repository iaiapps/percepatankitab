@extends('layouts.app')

@section('title', 'Data Pembayaran')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="card p-3 rounded">

        <div class="table-responsive">
            <div class="mb-3">
                <div class="btn-group">
                    <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                        Tambah Data</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Token</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->profile->no_hp ?? 'belum ada data' }}</td>
                                <td>
                                    @php
                                        if ($user->payment) {
                                            $img = asset('img-pembayaran/' . $user->payment->img);
                                            $id = $user->payment->id;
                                        } else {
                                            $img = asset('img/404.png');
                                            $id = 'tidak ada';
                                        }
                                    @endphp
                                    <img class="img-pembayaran" src="{{ $img }}" alt="bukti">
                                    <br>
                                    <a href="{{ route('payment.show', $id) ?? 'belum' }}"
                                        class=" mt-2 btn btn-sm btn-outline-primary">lihat
                                        bukti</a>
                                </td>
                                <td>
                                    @if ($user->getRoleNames()->first() == 'guest')
                                        <p class="mb-0 bg-danger text-center text-white rounded">belum diverifikasi</p>
                                    @elseif ($user->getRoleNames()->first() == 'user')
                                        <p class="mb-0 bg-primary text-center text-white rounded">sudah diverifikasi</p>
                                    @else
                                        <p>tidak dapat menentukan status ...</p>
                                    @endif
                                </td>
                                <td>{{ $user->payment->token_code ?? 'belum ada' }}</td>
                                <td>
                                    <form class="d-block"
                                        onsubmit="return confirm('Apakah anda yakin untuk mengubah data?');"
                                        action="{{ route('activate', $user->id) }}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-primary btn-sm w-100"><i
                                                class="bi bi-check2-circle"></i> aktifkan
                                        </button>
                                    </form>

                                    <a href="https://wa.me/{{ $user->no_hp }}?text=Hai kak, ..."
                                        class="btn btn-success btn-sm w-100 "> <i class="bi bi-send"></i> kirim</a>

                                    <form class="d-block"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm w-100">
                                            <i class="bi bi-trash3"></i> hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .img-pembayaran {
            width: 70px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
