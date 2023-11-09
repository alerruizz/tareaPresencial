<?php
    include 'basics/header.php'; // Incluir el encabezado
    include 'basics/body.php'; // Incluir el cuerpo
?>
<div class="container mt-4">
<h1>Registro de Alumnos</h1>
    <form action="procesar_formulario.php" method="post" enctype="multipart/form-data" style="padding: 30px">
        <label for="expediente">Número de expediente:</label>
        <input type="text" id="expediente" name="expediente" pattern="^[A-Za-z]{2,5}-\d{4}-\d{4}\/[HM]$" title="Formato inválido. Ejemplo válido: EST-2022-1234/H" required><br><br>

        <label for="nif">NIF:</label>
        <input type="text" id="nif" name="nif" pattern="^\d{8}[A-Za-z]$" title="Formato inválido. Ejemplo válido: 12345678Z" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" pattern="^[A-Za-z_-]{1,20}$" title="Máximo 20 caracteres. Solo letras, guiones bajos." required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" pattern="^[A-Za-z_-]{1,10}$" title="Máximo 10 caracteres. Solo letras, guiones bajos." required><br><br>

        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
        </select><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefono">Teléfono móvil:</label>
        <input type="tel" id="telefono" name="telefono" pattern="^\d{9}$" title="Formato inválido. Ejemplo válido: 123456789" required><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" required><br><br>

        <label for="beca">Solicitar beca de estudios:</label>
        <input type="checkbox" id="beca" name="beca" value="si"><br><br>

        <input type="submit" value="Enviar">
    </form>    
</div>


<?php
    include 'basics/footer.php'; //Incluir el pie de página
?>
