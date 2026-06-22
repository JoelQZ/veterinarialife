<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeterinariaLife</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .navbar {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            background: linear-gradient(135deg, #1e2a3a 0%, #0f1724 100%) !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.5px;
        }

        .navbar .btn-outline-light {
            border-radius: 20px;
            padding: 5px 16px;
            margin-left: 8px;
            transition: all 0.3s ease;
        }

        .navbar .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1e2a3a;
            margin-bottom: 1.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #0d6efd;
            display: inline-block;
        }

        .alert {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .btn {
            border-radius: 10px;
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.2s ease;
        }

        .btn-sm {
            border-radius: 8px;
            padding: 5px 12px;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            transform: translateY(-1px);
        }

        .btn-success {
            background: #198754;
            border: none;
        }

        .btn-success:hover {
            background: #157347;
            transform: translateY(-1px);
        }

        .btn-warning {
            background: #ffc107;
            border: none;
            color: #1e2a3a;
        }

        .btn-warning:hover {
            background: #e0a800;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background: #bb2d3b;
            transform: translateY(-1px);
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
        }

        .table thead th {
            background: #f8f9fc;
            color: #1e2a3a;
            font-weight: 600;
            border-bottom: 2px solid #e9ecef;
            padding: 14px 12px;
        }

        .table tbody tr:hover {
            background: #f8f9ff;
            transition: background 0.2s ease;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #dee2e6;
            padding: 10px 14px;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 6px;
        }

        .container {
            max-width: 1280px;
        }
        
        .foto-fija {
            width: 50px !important;
            height: 50px !important;
            object-fit: cover !important;
            border-radius: 50% !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">VeterinariaLife</a>
            
            <div class="d-flex align-items-center">
                @if(Auth::user()->role == 'admin')
                    <a href="/pets" class="btn btn-outline-light btn-sm">Mascotas</a>
                    <a href="/owners" class="btn btn-outline-light btn-sm">Dueños</a>
                    <a href="/appointments" class="btn btn-outline-light btn-sm">Citas</a>
                @endif
                
                <span class="text-white ms-3 me-2 text-sm">
                    {{ Auth::user()->name }} ({{ Auth::user()->role }})
                </span>
                
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm ms-2">
                        Salir
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('Exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Logrado!:</strong> {{ session('Exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>