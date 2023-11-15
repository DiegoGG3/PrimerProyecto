<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$categorias = BDRepository::selectUniversal($conexion, 'categoria');
$dificultades = BDRepository::selectUniversal($conexion, 'dificultad');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pregunta</title>
    <script src='api/apiCrearPregunta.js'></script>

</head>
<body>
    <div>
        <h1>Crear pregunta</h1>

        <label for="enunciado">Enunciado:</label>
        <textarea id="enunciado" name="enunciado" required></textarea>

        <label for="respuestas">Respuesta 1:</label>
        <input type="text" id="1" name="respuestas" required>
        <label for="respuestas">Respuesta 2:</label>
        <input type="text" id="2" name="respuestas" required>
        <label for="respuestas">Respuesta 3:</label>
        <input type="text" id="3" name="respuestas" required>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo ($categoria->get_nombre()); ?>"><?php echo strtoupper($categoria->get_nombre()); ?></option>
            <?php endforeach; ?>

        </select>

        <label for="dificultad">Dificultad:</label>
        <select id="dificultad" name="dificultad" required>
            <?php foreach ($dificultades as $dificultad): ?>
                <option value="<?php echo ($dificultad->get_nombre()); ?>"><?php echo strtoupper($dificultad->get_nombre()); ?></option>
            <?php endforeach; ?>
        </select>
        <label for="buena">Respuesta buena:</label>

        <select id="buena" name="buena" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
        </select>
        <button id="pregunta" onclick='crearPregunta(this)'>Crear Pregunta</button>
    </div>
</body>
</html>
