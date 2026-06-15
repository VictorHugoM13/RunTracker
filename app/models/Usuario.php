<?php

require_once '../config/database.php';

class Usuario
{
    public function autenticar($email, $senha)
    {
        $usuario = $this->buscarPorEmail($email);

        if (!$usuario) {
            return "Usuário ou senha inválidos.";
        }

        if (!password_verify(
            $senha,
            $usuario['senha']
        )) {
            return "Usuário ou senha inválidos.";
        }

        return $usuario;
    }

    public function buscarPorEmail($email)
    {
        $pdo = Database::connect();

        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function contarAtletas()
    {
        $pdo = Database::connect();

        $sql = "SELECT COUNT(*) as total
                FROM usuarios
                WHERE tipo = 'atleta'";

        $stmt = $pdo->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}