<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="/Serena/public/assets/css/auth_styles.css">
</head>
<body>
    <h1>Iniciar sesión</h1>

    <form action="/Serena/public/index.php?uri=auth/session/userauth" method="POST">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required><br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña" required><br><br>

        <button type="submit">Iniciar sesión</button>
    </form>

    <p>¿No tienes una cuenta? <a href="/Serena/public/index.php?uri=auth/register/registerform">Regístrate</a></p>
</body>
</html>