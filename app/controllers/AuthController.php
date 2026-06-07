<?php

require_once '../app/models/Usuario.php';

class AuthController
{
    public function login()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');

        if (empty($email) || empty($senha)) {

            $erro = "Preencha todos os campos.";

            require '../app/views/auth/login.php';

            return;
        }

        $usuarioModel = new Usuario();

        $usuario = $usuarioModel->buscarPorEmail($email);

        if (
            $usuario &&
            $senha === $usuario['senha']
        ) {

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['tipo'] = $usuario['tipo'];

            if ($usuario['tipo'] === 'admin') {
                header('Location: ?route=dashboard');
            } else {
                header('Location: ?route=dashboard-atleta');
            }

            exit;
        }

        $erro = "Usuário ou senha inválidos.";

        require '../app/views/auth/login.php';
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