<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$examenes = BDRepository::selectUniversal($conexion, 'Examen');
$alumnos = userRep::devolverUsuarioRol($conexion,'Alumno');
?>

<!DOCTYPE html>
<html>
<head>
    <script src='api/apiEliminarExamen.js'></script>

    <title>Lista de Examenes</title>
</head>
<body>
    <table>
        <tr>
            <th>Número Examen</th>
            <th>Fecha Creacion</th>
            <th>Id Creador</th>
        </tr>
        <?php foreach ($examenes as $examen): 
            ?>
        <tr>
            <td id="<?php echo ($examen->get_id()); ?>">Examen : <?php echo ($examen->get_id()); ?></td>
            <td><?php echo ($examen->get_Fecha()); ?></td>
            <td><?php echo ($examen->get_id_creador()); ?></td>
            <td>
                <button class="eliminar" onclick='eliminarExamen(this)'>Eliminar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
