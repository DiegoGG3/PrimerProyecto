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
                <select name="Alumno">
                    <?php foreach ($alumnos as $alumno): ?>
                        <option value="Alumno" selected><?php echo ($alumno->get_Nombre()); ?></option>
                    <?php endforeach; ?>
                </select>

            </td>
            <td>
                <button id="asignar" onclick='asignarPregunta(this)'>asignar</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>
