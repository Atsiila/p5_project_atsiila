<!DOCTYPE html>
<html>

<head>
    <title>Export Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>{{ $title }}</h1>
    </center>
    <p>Tanggal: {{ $date }}</p>
    <table id="dataTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi Berita</th>
                <th>Tanggal & waktu</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Status</th>

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
                <td>{{ $data->penulis->nama }}</td>
                <td>{{ $data->kategori->nama }}</td>
                <td>{{ $data->status }}</td>

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

</body>

</html>
