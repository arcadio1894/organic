<html>

<head></head>

<body>
<img src="{{ $message->embed(public_path().'/organic/img/logo.png') }}" alt="">
<h2> Datos del usuario </h2> <br>
<strong> Nombre: </strong> {{ $user->name }}<br>
<strong> Dirección de correo: </strong> {{ $user->email}}<br>
<strong> Teléfono: </strong> {{ $customer->phone }}<br>
</body>

</html>