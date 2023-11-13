<?php



$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$valida=new Validacion();

// Luego, llama a Identifica en la instancia de Login


if (isset($_POST['registro'])) {
    $valida->Requerido('username');
    $valida->Requerido('password');
    $valida->Requerido('confirmar');

    if ($valida->ValidacionPasada() && $_POST['password']==$_POST['confirmar']) {
        registroRepository::registroPendiente($conexion, $_POST['username'], $_POST['password']);
    }   

}else{
    pintaPantalla();
}

function pintaPantalla(){
    echo"<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' type='text/css' href='../css/registro.css'>
        <title>Registrarse - Autoescuela Fuentezuelas</title>
    </head>
    <body>
        <div class='container'>
            <h2>Registrarse</h2>
            
            <form action='' method='post'>
                <div class='input-container'>
                    <label for='username'>Nombre de usuario</label>
                    <input type='text' id='username' name='username' required>
                </div>
                <div class='input-container'>
                    <label for='password'>Contraseña</label>
                    <input type='password' id='password' name='password' required>
                </div>
                <div class='input-container'>
                    <label for='confirm-password'>Repetir Contraseña</label>
                    <input type='password' id='confirm-password' name='confirmar' required>
                </div>
                <button type='submit' name='registro'>Registrarse</button>
            </form>
        </div>
    </body>
    </html>";
}


?>