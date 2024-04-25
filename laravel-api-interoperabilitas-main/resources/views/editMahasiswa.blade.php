<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .form {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mt-5 mb-4">EDIT Data Nilai Mahasiswa</h2>

    <div class="container">
    <!-- Form -->

    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form -->
</div>

@foreach($data as $mahasiswa)

    <form class="form-group" method="POST"  action="/api/datamahasiswa/{{$mahasiswa['nim']}}">
    @method('PUT')
    @csrf
    <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" placeholder="NIM" name="nim" required value="{{$mahasiswa['nim']}}">
        </div>
        <div class="mb-3">
            <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
            <input type="text" class="form-control" id="kode_mk" placeholder="Kode Mata Kuliah " name="kode_mk" required value="{{$mahasiswa['kode_mk']}}">
        </div>
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="text" class="form-control" id="nilai" placeholder="Nilai Mata Kuliah" name="nilai" required value="{{$mahasiswa['nilai']}}">
    </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endforeach

</body>
</html>
