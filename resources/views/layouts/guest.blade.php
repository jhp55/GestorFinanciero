<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Acceso | Gestor Financiero
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eaf5ef, #f6f8f7);
            display: grid;
            place-items: center;
        }

        .auth-card {
            width: min(440px, calc(100% - 28px));
            border: 0;
            border-radius: 20px;
            box-shadow: 0 15px 50px #174d3518;
        }

        .btn-success {
            background: #176b4d;
            border-color: #176b4d;
        }

        .form-control {
            padding: .7rem;
            border-radius: 10px;
        }

    </style>

</head>

<body>

    <div class="card auth-card p-4 p-md-5">

        <div class="text-center mb-4">

            <div class="display-5 text-success">

                <i class="bi bi-wallet2"></i>

            </div>

            <h3 class="fw-bold mb-1">
                Gestor Financiero
            </h3>

            <p class="text-secondary mb-0">
                Controla tus ingresos y gastos
            </p>

        </div>

        {{ $slot }}

    </div>

</body>

</html>