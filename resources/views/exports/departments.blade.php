<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departamentos</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1 style="text-align: center"> Reporte de departamentos con productos </h1>
<table>
    <thead>
        <tr>
            <th>Departamento</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Productos</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $departments as $department )
        <tr>
            <td>{{ $department->name }}</td>
            <td>{{ $department->description }}</td>
            <td>
                <img src="../public/images/departments/{{$department->image}}" width="70px" height="70px" alt="">
            </td>
            <td>
                @foreach( $department->products as $product )
                    <p>{{ $product->name }}</p>
                    <img src="../public/images/products/{{$product->image}}" width="50px" height="50px" alt="">
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>