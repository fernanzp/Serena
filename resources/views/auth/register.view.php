<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>

    <form method="POST" action="/Serena/public/index.php?uri=auth/register/registeruser">
        <input type="text" name="nombre" placeholder="Nombre completo" required><br>
        <input type="email" name="correo" placeholder="Correo electrónico" required><br>
        <input type="password" name="contraseña" placeholder="Contraseña" required><br>
        <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tienes una cuenta? <a href="/Serena/public/index.php?uri=auth/session/inisession">Inicia sesión</a></p>
</body>
</html>