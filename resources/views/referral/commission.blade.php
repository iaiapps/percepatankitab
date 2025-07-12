@extends('layouts.app')

@section('title', 'Data Komisi')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-3 rounded">
        <div class="table-responsive">

            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            {{-- <th scope="col">Tanggal Komisi</th> --}}
                            <th scope="col">Pembayaran Komisi</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Komisi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commissions as $commission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $commission->referral->user->name }}</td>
                                <td>
                                    @if ($commission->status == 'pending')
                                        <span class="mb-0 bg-danger text-center text-white rounded p-1">pending</span>
                                    @elseif ($commission->status == 'paid')
                                        <span class="mb-0 bg-primary text-center text-white rounded p-1">paid</span>
                                    @else
                                        <span class="mb-0 bg-warning text-center text-white rounded p-1">tidak dapat
                                            menentukan status ...</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($commission->status == 'pending')
                                        <span class="mb-0">-</span>
                                    @elseif ($commission->status == 'paid')
                                        <span
                                            class="mb-0">{{ \Carbon\Carbon::parse($commission->paid_at)->isoFormat('DD MMMM YYYY, HH:MM') }}</span>
                                    @else
                                        <span class="mb-0">tidak dapat
                                            menentukan ...</span>
                                    @endif

                                </td>
                                <td>Dari = {{ $commission->payment->name }}, <br> Komisi =
                                    {{ $commission->nominal ?? ' - ' }}
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
