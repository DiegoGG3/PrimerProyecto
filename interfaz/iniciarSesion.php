<?php        
require '../entities/DB.php';

$db = new Database(); 
$pdo = $db->getPdo(); 

if (isset($_POST['login'])) {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM User WHERE nombre = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && $password == $user['password']) {
            session_start();
            $_SESSION['username'] = $user['username'];
        
            header('Location: examen.html');
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    }
}else{
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' type='text/css' href='inicioSesio.css'>
        <title>Iniciar Sesión</title>
    </head>
    <body>
        <div class='container'>
            <h2>Iniciar Sesión</h2>
            <form>
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
    </html>"
}
?>




