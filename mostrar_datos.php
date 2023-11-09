
<?php
include "basics/header.php"; include "basics/body.php";
// Obtener el año actual
$currentYear = date('Y');
// Ejemplo de número de expediente
$expediente = "EST-2022-1234/H"; // Puedes obtener este valor desde $_POST['expediente'] en tu código

// Separar el número de expediente para obtener el año
$expediente_parts = explode('-', $expediente);
$year_part = $expediente_parts[1]; // Obtenemos la parte del año

// Validar si el año del expediente es anterior al año actual
$expediente_year = intval(substr($year_part, 0, 4)); // Extraemos el año del número de expediente

if ($expediente_year < $currentYear) {
    echo '<h2 style= "text-align: center">El año del expediente es inválido. Debe ser anterior al actual.</h2>';
} else{
    echo "<h2>Datos del Formulario</h2>";
    echo "<table>";

        // Verificar si hay datos en $_POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST as $key => $value) {
                echo "<tr>";
                echo "<td><strong>" . htmlspecialchars($key) . "</strong></td>";
                echo "<td>" . ($value != "" ? htmlspecialchars($value) : "--- :'(") . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No se han recibido datos</td></tr>";
        }
      
    echo "</table>"
}
?>