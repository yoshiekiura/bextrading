<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contáctenos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="jumbotrom">
            <h1>Contacto Web desde Berlingercapital.com</h1>
            <p> Nombre: {{ $nombre }}</p>
            <p> Email: {{ $email }}</p>
            <p>Asunto: {{ $asunto }}</p>
            <p>Telefono: {{ $telefono }}</p>
            <p>Mensaje: {{ $mensaje }}</p>
        </div>
    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
