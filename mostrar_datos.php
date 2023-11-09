
<?php
include "basics/header.php"; include "basics/body.php";
// Obtener el año actual y el expediente.
$currentYear = date('Y');
$expediente = $_POST['expediente']; 

// Separar el número de expediente para obtener el año
if(!empty($expediente)){
$expediente_parts = explode('-', $expediente);
$year_part = $expediente_parts[1]; // Obtenemos la parte del año

// Validar si el año del expediente es anterior al año actual
$expediente_year = intval(substr($year_part, 0, 4)); // Extraemos el año del número de expediente
}else $expediente = 3000;
if ($expediente_year > $currentYear) {
    echo '<h2 style= "text-align: center">El año del expediente es inválido. Debe ser anterior al actual.</h2>';
    echo '<div style="text-align: center; margin-top: 20px;">';
    echo '<a href="index.php"><button type="button">Volver a intentar.</button></a>';
    echo '</div>';
} else{
    echo '<h2 style= "text-align: center">Datos del formulario.</h2>';
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
            echo "<tr><td colspan='2'>No se han recibido datos. Fallo.</td></tr>";
        }
      
    echo "</table>";
}
?>