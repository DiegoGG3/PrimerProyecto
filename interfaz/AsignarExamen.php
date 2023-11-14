<?php
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$examenes = BDRepository::selectUniversal($conexion, 'Examen');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Examenes</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Fecha Creacion</th>
            <th>ID Creador</th>
        </tr>
        <?php foreach ($examenes as $examen): 
            ?>
        <tr>
            <td><?php echo ($examen->get_id()); ?></td>
            <td><?php echo ($examen->get_Fecha()); ?></td>
            <td><?php echo ($examen->get_id_creador()); ?></td>
            <td>
                <select name="rol">
                    <option value="Alumno" selected>Alumno</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Admin">Admin</option>

                </select>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
