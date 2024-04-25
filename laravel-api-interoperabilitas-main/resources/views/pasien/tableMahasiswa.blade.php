<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>List Pasien</h2>
        <hr>
        <a href="/datamahasiswa/create" class="btn btn-primary">Tambah Nilai Mahasiswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Nilai</th>
                    <th>Mata Kuliah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['nim'] }}</td>
                    <td>{{ $item['nilai'] }}</td>
                    <td>{{ $item['nama_mk'] }}</td>
                    <td>
                        <a href="/datamahasiswa/{{ $item['nim'] }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/api/datamahasiswa/{{ $item['nim']}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="kode_mk" value="{{ $item['kode_mk'] }}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
