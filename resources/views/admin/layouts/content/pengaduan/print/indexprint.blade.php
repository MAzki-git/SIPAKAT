<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="text-center">

    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>judul laporan</th>
                        <th>tanggal</th>
                        <th>isi laporan</th>
                        <th>kategori</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul_laporan }}</td>
                        <td>{{ $item->tgl_pengaduan }}</td>
                        <td class="embed-responsive">{{ $item->isi_laporan }}</td>
                        <td>{{ $item->kategori->nama }}
                        </td>
                        <td>{{ $item->status == '0' ? 'pending' :ucwords($item->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>