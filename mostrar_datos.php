
<?php
include "basics/header.php";
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $expediente = isset($_POST['expediente']) ? $_POST['expediente'] : '';
        $nif = isset($_POST['nif']) ? $_POST['nif'] : '';
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : '';
        $beca = isset($_POST['Beca']) ? $_POST['Beca'] : '';

        $errores = [];

        // Validación del número de expediente
        if (!preg_match('/^[A-Za-z]{2,5}-\d{4}-\d{4}\/[HM]$/', $expediente)) {
            $errores[] = "Número de expediente incorrecto. Ejemplo válido: EST-2022-1234/H";
        }

        // Validación del NIF
        if (!preg_match('/^\d{8}[A-Za-z]$/', $nif)) {
            $errores[] = "NIF incorrecto. Ejemplo válido: 12345678Z";
        }

        // Validación de Apellidos
        if (!preg_match('/^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s_\-]{1,20}$/', $apellidos)) {
            $errores[] = "Apellidos incorrectos. Máximo 20 caracteres. Letras, espacios, guiones bajos y guiones permitidos.";
        }

        // Validación de Nombre
        if (!preg_match('/^[A-Za-záéíóúüñÁÉÍÓÚÜÑ\s_\-]{1,10}$/', $nombre)) {
            $errores[] = "Nombre incorrecto. Máximo 10 caracteres. Letras, espacios, guiones bajos y guiones permitidos.";
        }

        // Validación del Sexo (es validada en el HTML)

        // Validación del Email (es validada en el HTML)

        // Validación del Teléfono
        if (!preg_match('/^\d{9}$/', $telefono)) {
            $errores[] = "Teléfono incorrecto. Ejemplo válido: 123456789";
        }

        // Validación de la Imagen (es validada en el HTML)

        // Validación de Beca (es validada en el HTML)

        // Verificar si hay errores
        if (count($errores) > 0) {
            echo '<h2 style= "text-align: center">Se encontraron errores al procesar el formulario.</h2>';
            foreach ($errores as $error) {
                echo "<p>$error</p>";
            }
        } else {
            echo '<h2 style= "text-align: center">Formulario válido! Se pueden procesar los datos.</h2>';
            echo '<h2 style= "text-align: center">Datos del formulario.</h2>';
            echo "<table>";

        // Verificar si hay datos en $_POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST as $key => $value) {
                echo "<tr>";
                echo '<td style="color: white;"><strong>' . htmlspecialchars($key) . '</strong></td>';
                echo '<td style="color: #f5f5f5;">' . ($value != '' ? htmlspecialchars($value) : "--- :'(") . '</td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No se han recibido datos. Fallo.</td></tr>";
        }
      
    echo "</table>";
        }
    }}
    include "basics/footer.php";
    
?>