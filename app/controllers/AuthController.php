<?php

require_once '../app/models/Usuario.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            // Validação de entrada

            if (empty($email) || empty($senha)) {

                $erro = "Preencha todos os campos.";

                require '../app/views/auth/login.php';

                return;
            }

            $usuarioModel = new Usuario();

            $resultado = $usuarioModel->autenticar(
                $email,
                $senha
            );

            if (is_string($resultado)) {

                $erro = $resultado;

                require '../app/views/auth/login.php';

                return;
            }

            $_SESSION['usuario_id'] = $resultado['id'];
            $_SESSION['nome'] = $resultado['nome'];
            $_SESSION['tipo'] = $resultado['tipo'];

            if ($resultado['tipo'] === 'admin') {

                header('Location: ?route=dashboard');

            } else {

                header('Location: ?route=dashboard-atleta');

            }

            exit;
        }

        require '../app/views/auth/login.php';
    }

    public function logout()
    {
        session_unset();

        session_destroy();

        header('Location: ?route=login');

        exit;
    }
}