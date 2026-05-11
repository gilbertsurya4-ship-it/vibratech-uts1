<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Vibra-Tech | Dashboard Monitoring Batam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #1e293b; }
        .card { border-radius: 15px; border: none; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">VIBRA-TECH INDONESIA</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow p-4">
                    <h3 class="text-secondary">Monitoring Mesin Pabrik - Wilayah Batam</h3>
                    <p>Status real-time dari sensor IoT di lapangan.</p>
                </div>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Waktu</th>
                            <th>Nama Mesin</th>
                            <th>Getaran (Hz)</th>
                            <th>Suhu (°C)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->created_at->format('H:i:s d-m-Y') }}</td>
                            <td>{{ $log->nama_mesin }}</td>
                            <td>{{ $log->getaran }}</td>
                            <td>{{ $log->suhu }}°C</td>
                            <td>
                                <span class="badge {{ $log->status == 'Normal' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $log->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>