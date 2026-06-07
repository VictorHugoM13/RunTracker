<?php

    require_once '../config/database.php';
    class Atleta {
        public function listar() {
            $pdo = Database::connect();

            $sql = "SELECT * FROM usuarios WHERE tipo = 'atleta'";

            $stmt = $pdo->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarPorId($id) {
            $pdo = Database::connect();

            $sql = "SELECT * FROM usuarios WHERE id = ?";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function atualizar($id, $nome, $email, $ativo, $tipo)
        {
            $pdo = Database::connect();

            $sql = "UPDATE usuarios
                    SET nome = ?, email = ?, ativo = ?, tipo = ?
                    WHERE id = ?";

            $stmt = $pdo->prepare($sql);

            return $stmt->execute([
                $nome,
                $email,
                $ativo,
                $tipo,
                $id
            ]);
        }
        public function excluir($id)
        {
            $pdo = Database::connect();

            $sql = "DELETE FROM usuarios WHERE id = ?";

            $stmt = $pdo->prepare($sql);

            return $stmt->execute([$id]);
        }
    }


?>