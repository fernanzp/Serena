<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="/Serena/public/assets/css/auth_styles.css">
</head>
<body>
    <h1>Registro</h1>

    <form method="POST" action="/Serena/public/index.php?uri=auth/register/registeruser">
        <label for="nombre">Nombre completo</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="correo">Correo electrónico</label>
        <input type="email" name="correo" id="correo" required><br>

        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" id="contraseña" required><br>

        <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tienes una cuenta? <a href="/Serena/public/index.php?uri=auth/session/inisession">Inicia sesión</a></p>
</body>
</html>