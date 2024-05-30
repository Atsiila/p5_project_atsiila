@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('berita') }}
                    </div>
                    <div class="float-end">
                        <form action="{{ route('berita.view-pdf') }}" method="post">
                            @csrf
                            <a href="{{ route('berita.create') }}" class="btn btn-sm btn-outline-primary">Tambah
                                Data</a>
                            <button type="submit" class="btn btn-sm btn-outline-success">Export PDF</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul berita</th>
                                    <th>Isi Berita</th>
                                    <th>Tanggal</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($berita as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->isi_berita }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{$data->penulis->nama}}</td>
                                    <td>{{$data->kategori->nama}}</td>
                                    <td>{{ $data->status}}</td>
                                    <td>
                                        <img src="{{ asset('/storage/beritas/' . $data->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td>
                                        <form action="{{ route('berita.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('berita.show', $data->id) }}"
                                                class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('berita.edit', $data->id) }}"
                                                class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
