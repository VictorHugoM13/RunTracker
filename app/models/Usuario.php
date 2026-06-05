<?php

require_once '../config/database.php';

class Usuario
{
    public function buscarPorEmail($email)
    {
        $pdo = Database::connect();

        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}