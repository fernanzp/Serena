<?php

namespace controllers\auth;

use controllers\Controller;
use classes\View;
use models\Usuario;

class RegisterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registerForm($params = null)
    {
        $response = [
            'ua'    => ['sv' => 0],
            'title' => 'Registro',
            'code'  => 200
        ];

        View::render('auth/register', $response);
    }

    public function registerUser()
    {
        $datos = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        // Validación básica (puedes hacer más completa después)
        if (
            empty($datos['nombre']) ||
            empty($datos['correo']) ||
            empty($datos['contraseña'])
        ) {
            echo json_encode(['r' => false, 'msg' => 'Campos incompletos']);
            return;
        }

        $usuarioModel = new Usuario();

        // Verificar si ya existe ese correo
        $existente = $usuarioModel->where([['correo', $datos['correo']]]);
        if (count($existente) > 0) {
            echo json_encode(['r' => false, 'msg' => 'El correo ya está registrado']);
            return;
        }

        // Crear usuario
        $nuevo = $usuarioModel->nuevoUsuario($datos);

        if ($nuevo) {
            // Iniciar sesión automáticamente
            $usuario = $usuarioModel->where([['correo', $datos['correo']]])[0];
            session_start();
            $_SESSION['sv']     = true;
            $_SESSION['IP']     = $_SERVER['REMOTE_ADDR'];
            $_SESSION['id']     = $usuario->id_usuario;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['correo'] = $usuario->correo;
            $_SESSION['rol']    = $usuario->rol;
            session_write_close();

            header("Location: /Serena/public/index.php?uri=home");
            exit();
        }

        echo json_encode(['r' => false, 'msg' => 'Error al crear usuario']);
    }
}