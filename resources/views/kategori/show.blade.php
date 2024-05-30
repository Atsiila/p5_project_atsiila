@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('kategori') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <hr>
                    <h4>{{ $kategori->nama }}</h4>
                    <p class="tmt-3">
                        {!! $kategori->deskripsi !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
