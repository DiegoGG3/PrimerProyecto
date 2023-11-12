<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/registro.css">
    <title>Registrarse - Autoescuela Fuentezuelas</title>
</head>
<body>
    <div class="container">
        <h2>Registrarse</h2>
        
        <form>
            <div class="input-container">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-container">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-container">
                <label for="confirm-password">Repetir Contraseña</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>