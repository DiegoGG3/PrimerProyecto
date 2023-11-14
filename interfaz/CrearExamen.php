<?php
    $db = new DB();
    $db->abreConexion();
    $conexion = $db->getConexion();

    $preguntas = BDRepository::selectUniversal($conexion, 'Pregunta');
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='api/apiCrearExamen.js'></script>

    <title>Document</title>
</head>
<body>
    <div id="examen">
    <table>
        
        <tr>
            <th>Pregunta</th>
            <th>Entra</th>

        </tr>
       
        <?php foreach ($preguntas as $pregunta): 
            ?>
        <tr id="preguntas">
            <td><?php echo ($pregunta->getEnunciado()); ?></td>
            <td><input type="checkbox" name="seleccionar" id="<?php echo($pregunta->getIdPregunta()); ?>"></td>
           
        </tr>
        <?php endforeach; ?>


    </table>
        <button id="examen" onclick='crearExamen(this)'>Crear Examen</button>
    </div>
</body>
</html>