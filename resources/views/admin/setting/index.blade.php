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
                        <a class="btn btn-primary" href="{{ route('settinglanding.index') }}">Setting</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="border p-3">
                        <p class="mb-0 fs-5">Setting Komisi</p>
                        <hr>
                        <a class="btn btn-primary" href="link">Setting</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
