<!-- index.php -->
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="consulta.php" method="POST">
            <input type="email" name="correo" placeholder="Correo" required><br>
            <input type="password" name="contrasenia" placeholder="Contraseña" required><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
