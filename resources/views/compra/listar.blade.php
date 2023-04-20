<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Hello, world!</h1>
    <a href='/compra/insertar' class="btn btn-primary">insertar</a>

    <table class="table">
        <thead>
            <tr>
                <th>idcompra</th>
                <th>producto</th>
                <th>cantidad</th>
            </tr>
        </thead>
        @foreach ($compras as $com)
            <tr>
                <td>{{ $com->idcompra }}</td>
                <td>{{ $com->idproducto }}</td>
                <td>{{ $com->cantidad }}</td>
            </tr>
        @endforeach
    </table>
    <ul>

    </ul>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if($pagina>1)
                <li class="page-item"><a class="page-link" href="?page={{$pagina-1}}">Previous</a></li>
            @endif()
            @for ($i = 1; $i <= $cantidadPaginas; $i++)
                <li class="page-item {{$i==$pagina?"active":""}} "><a class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
            @endfor
            @if($pagina<$cantidadPaginas) 
                <li class="page-item"><a class="page-link" href="?page={{$pagina+1}}">Next</a></li>
            @endif()
        </ul>
    </nav>
</body>

</html>
