@extends('layouts.app')

@section('title', 'Data Setting')
@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="border p-3">
                        <p class="mb-0 fs-5">Setting Landing Page</p>
                        <hr>
                        <a class="btn btn-primary" href="{{ route('settinglanding') }}">Setting</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $setting)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $setting->user->name }}</td>
                                <td><a href="{{ route('setting.show', $setting->id) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-card-checklist"></i>
                                        lihat</a></td>
                                <td>
                                    <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i>
                                        edit</a>

                                    <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('setting.destroy', $setting->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3"></i> del
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
