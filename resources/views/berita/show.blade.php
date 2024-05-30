@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $berita->judul }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Judul:</strong>
                        {{ $berita->judul }}
                    </div>
                    <div class="form-group">
                        <strong>Isi Berita:</strong>
                        {{ $berita->isi_berita }}
                    </div>
                    <div class="form-group">
                        <strong>Tanggal:</strong>
                        {{ $berita->tanggal }}
                    </div>
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $berita->status }}
                    </div>
                    <div class="form-group">
                        <strong>Penulis:</strong>
                        {{ $berita->penulis->nama }} <!-- Anda harus menyesuaikan dengan nama kolom pada model Penulis -->
                    </div>
                    <div class="form-group">
                        <strong>Kategori:</strong>
                        {{ $berita->kategori->nama }} <!-- Anda harus menyesuaikan dengan nama kolom pada model Kategori -->
                    </div>
                    <div class="form-group">
                        <strong>Gambar:</strong><br>
                        <img src="{{ asset('storage/beritas/'.$berita->image) }}" width="300px" alt="Gambar Berita">
                    </div>
                    <a class="btn btn-primary" href="{{ route('berita.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
