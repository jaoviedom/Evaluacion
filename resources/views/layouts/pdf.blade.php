<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>PDF</title>
    <style>
        table, th, td {
            border: 1px solid rgb(190, 188, 188);
            border-collapse: collapse;
            border-radius: 20px;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>