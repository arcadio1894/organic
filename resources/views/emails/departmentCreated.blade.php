<html>

<head></head>

<body>
<img src="{{ $message->embed(public_path().'/organic/img/logo.png') }}" alt="">
<h2> Nuevo departamento creado </h2> <br>
<strong> Creador: </strong> {{ $user->name }}<br>
<strong> Departamento: </strong> {{ $department->name}}<br>
</body>

</html>