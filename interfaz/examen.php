<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();
$examenes = BDRepository::devolverExamenAlumno($conexion, $_SESSION["user"]->get_Id());

?>

<!DOCTYPE html>
<html>
<head>

    <title>Lista de Examenes</title>
</head>
<body>
    <table>
        <tr>
            <th>Número Examen</th>
            <th>Fecha Creacion</th>
        </tr>
        <?php foreach ($examenes as $examen): ?>
            
        <tr>
            <td id="<?php echo ($examen->get_id()); ?>">Examen : <?php echo ($examen->get_id()); ?></td>
            <td><?php echo ($examen->get_Fecha()); ?></td>
            <td>
                <button class="eliminar" onclick='realizarExamen(this)'>Realizar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
