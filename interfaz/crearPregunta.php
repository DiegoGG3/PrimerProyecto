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
    
</head>
<body>
    <form action="procesar_formulario.php" method="post">
        <h1>Crear pregunta</h1>

        <label for="enunciado">Enunciado:</label>
        <textarea id="enunciado" name="enunciado" required></textarea>

        <label for="respuestas">Respuesta 1:</label>
        <input type="text" id="respuesta1" name="respuestas" required>
        <label for="respuestas">Respuesta 2:</label>
        <input type="text" id="respuesta2" name="respuestas" required>
        <label for="respuestas">Respuesta 3:</label>
        <input type="text" id="respuesta3" name="respuestas" required>

        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo ($categoria->get_id_categoria()); ?>"><?php echo strtoupper($categoria->get_nombre()); ?></option>
            <?php endforeach; ?>

        </select>

        <label for="dificultad">Dificultad:</label>
        <select id="dificultad" name="dificultad" required>
            <?php foreach ($dificultades as $dificultad): ?>
                <option value="<?php echo ($dificultad->get_id_dificultad()); ?>"><?php echo strtoupper($dificultad->get_nombre()); ?></option>
            <?php endforeach; ?>
        </select>

    

        <button type="submit">Enviar Pregunta</button>
    </form>
</body>
</html>
