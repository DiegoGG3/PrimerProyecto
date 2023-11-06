<?php        


require_once '../helper/autocargar.php';

$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

$valida=new Validacion();
$repository = new BDRepository();
$login = new Login($repository,$conexion);

// Luego, llama a Identifica en la instancia de Login


if (isset($_POST['login'])) {
    $valida->Requerido('username');
    $valida->Requerido('password');

    if ($valida->ValidacionPasada()) {
        // Autenticar al usuario
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Llama al método Identifica en la instancia de Login
        $login->Identifica($username, $password);

        if ($login->UsuarioEstaLogueado()) {
            // Inicio de sesión exitoso
            $_SESSION['username'] = $username;
            header("location: examen.html");
            exit();
        }
    }

}else{
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' type='text/css' href='../css/inicioSesio.css'>
        <title>Iniciar Sesión</title>
    </head>
    <body>
        <div class='container'>
            <h2>Iniciar Sesión</h2>
            <form method='post'>
            <div class='input-container'>
                <label for='username'>Nombre de usuario</label>
                <input type='text' id='username' name='username' required>
            </div>
            <div class='input-container'>
                <label for='password'>Contraseña</label>
                <input type='password' id='password' name='password' required>
            </div>
            <button type='submit' name='login'>Iniciar Sesión</button><br>
        </form>
            <a href='registrarse.html'>Regístrate</a>
    
        </div>
    </body>
    </html>";
}
?>




