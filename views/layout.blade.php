<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de animes</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://kit.fontawesome.com/d40c49f1e1.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="jumbotron">
            <h1 class='mt-5 mb-5'>@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>

</body>
</html>