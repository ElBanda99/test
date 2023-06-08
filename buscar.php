<!-- buscar.php -->
<?php
// Conexión a la base de datos
$conex = mysqli_connect("localhost", "root", "", "test");
if (!$conex) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario de búsqueda
$cveASESOR = $_POST['cveASESOR'];
$telefono = $_POST['telefono'];
$nss = $_POST['nss'];
$curp = $_POST['curp'];
$nombre = $_POST['nombre'];

// Actualizar el campo de asesor en la tabla de pensionados
$updateQuery = "UPDATE PENSIONADOS SET cveASESOR = '$cveASESOR' WHERE curp = '$curp'";
mysqli_query($conex, $updateQuery);

// Realizar la consulta en la base de datos
$query = "SELECT * FROM PENSIONADOS WHERE cveASESOR = '$cveASESOR' AND (Telefono = '$telefono' OR NSS = '$nss' OR CURP = '$curp' OR PENSIONADO = '$nombre')";
$result = mysqli_query($conex, $query);

// Mostrar los resultados en una tabla
echo '
    <html>
    <head>
        <title>Resultados de la búsqueda</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="container">
            <h2>Resultados de la búsqueda</h2>
            <table>
                <tr>
                    <th>Teléfono</th>
                    <th>NSS</th>
                    <th>CURP</th>
                    <th>Pensionado</th>
                </tr>
';

while ($row = mysqli_fetch_assoc($result)) {
    echo '
        <tr>
            <td>' . $row['Telefono'] . '</td>
            <td>' . $row['NSS'] . '</td>
            <td>' . $row['CURP'] . '</td>
            <td>' . $row['PENSIONADO'] . '</td>
        </tr>
    ';
}

echo '
            </table>
        </div>
    </body>
    </html>
';

// Actualizar el campo de asesor en la tabla de pensionados
$updateQuery = "UPDATE PENSIONADOS SET cveASESOR = '$cveASESOR' WHERE cveASESOR = 0";
mysqli_query($conex, $updateQuery);

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>
