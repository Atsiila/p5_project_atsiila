@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <div class="float-start">
                        {{ __('Penulis') }}
                    </div>
                    <div class="float-end">
                        <form action="{{ route('penulis.view-pdf') }}" method="post">
                            @csrf
                            <a href="{{ route('penulis.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                            <button type="submit" class="btn btn-sm btn-success">Export PDF</button>
                        </form>
                    </div>
                </div>
                

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penulis</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($penulis as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{!! $data->email !!}</td>
                                    <td>
                                        <form action="{{ route('penulis.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('penulis.show', $data->id) }}" class="btn btn-sm btn-dark">Show</a> |
                                            <a href="{{ route('penulis.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a> |
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');" class="btn btn-sm btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Data belum tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $penulis->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
