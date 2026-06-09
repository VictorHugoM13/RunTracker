<?php

require_once '../config/database.php';

class Treino
{
    public function cadastrar(
        $atletaId,
        $titulo,
        $tipo,
        $unidade,
        $valor,
        $treino,
        $observacoes,
        $dataTreino
    ) {
        $pdo = Database::connect();

        $sql = "INSERT INTO treinos (
                    atleta_id,
                    titulo,
                    tipo,
                    unidade,
                    valor,
                    treino,
                    observacoes,
                    data_treino
                )
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            $atletaId,
            $titulo,
            $tipo,
            $unidade,
            $valor,
            $treino,
            $observacoes,
            $dataTreino
        ]);
    }
}