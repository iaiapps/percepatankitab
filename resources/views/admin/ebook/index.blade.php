@extends('layouts.app')

@section('title', 'Data Ebook')
@section('content')
    <div class="btn-group">
        <a href="{{ route('ebook.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
            Tambah Data</a>
    </div>

    @if (empty($ebooks) || count($ebooks) === 0)
        <div class="card">
            <div class="card-body">
                <p class="text-center fs-5 mb-0">Belum ada data ...</p>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($ebooks as $ebook)
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="mb-3">{{ $ebook->ebook_name }}</h4>
                            <img class="img-thumbnail" src="{{ $ebook->cover_image }}" alt="thumbnail">
                            <p class="mt-3">{{ Str::limit($ebook->description, 150) }}</p>
                        </div>
                        <div class="card-footer">
                            <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                action="{{ route('ebook.destroy', $ebook->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    hapus
                                </button>
                            </form>

                            <a href="{{ route('ebook.show', $ebook->id) }}" class="btn btn-primary">lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
