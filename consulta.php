<!-- consulta.php -->
<?php
// Conexión a la base de datos
$conex = mysqli_connect("localhost", "root", "", "test");
if (!$conex) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener el correo y la contraseña del formulario
$correo = $_POST['correo'];
$contrasenia = $_POST['contrasenia'];

// Validar las credenciales del usuario
$query = "SELECT cveASESOR FROM ASESORES WHERE nomCORREO = '$correo' AND desContrasenia = '$contrasenia'";
$result = mysqli_query($conex, $query);

if (mysqli_num_rows($result) == 1) {
    // Obtener la clave del asesor
    $row = mysqli_fetch_assoc($result);
    $cveASESOR = $row['cveASESOR'];

    // Mostrar la pantalla de consulta
    echo '
        <html>
        <head>
            <title>Consulta de Pensionados</title>
            <link rel="stylesheet" type="text/css" href="styles.css">
        </head>
        <body>
            <div class="container">
                <h2>Consulta de Pensionados</h2>
                <form action="buscar.php" method="POST">
                    <input type="hidden" name="cveASESOR" value="' . $cveASESOR . '">
                    <input type="text" name="telefono" placeholder="Teléfono (10 dígitos)" pattern="[0-9]{10}" required><br>
                    <input type="text" name="nss" placeholder="NSS (11 dígitos)" pattern="[0-9]{11}" required><br>
                    <input type="text" name="curp" placeholder="CURP (18 caracteres)" pattern="[A-Za-z0-9]{18}" required><br>
                    <input type="text" name="nombre" placeholder="Nombre (hasta 75 caracteres)" maxlength="75" required><br>
                    <input type="submit" value="Buscar">
                </form>
            </div>
        </body>
        </html>
    ';
} else {
    echo "Credenciales inválidas. Por favor, inténtalo de nuevo.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>
