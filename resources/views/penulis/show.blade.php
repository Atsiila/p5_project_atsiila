@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('penulis') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('penulis.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <hr>
                    <h4>{{ $penulis->nama }}</h4>
                    <p class="tmt-3">
                        {!! $penulis->deskripsi !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
