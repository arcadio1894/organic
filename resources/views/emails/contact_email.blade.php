<html>

<head></head>

<body>
<img src="{{ $message->embed(public_path().'/organic/img/logo.png') }}" alt="">
<h2> Datos del Contacto </h2> <br>
<strong> Nombre: </strong> {{ $name }}<br>
<strong> Dirección de correo: </strong> {{ $email}}<br>
<strong> Mensaje: </strong> {{ $content }}<br>
</body>

</html>