<?php

require_once '../config/database.php';

class Treino
{
    public function cadastrar($dados)
    {
        // Regras de negócio

        if ($dados['valor'] <= 0) {
            return 'O valor deve ser maior que zero.';
        }

        if ($dados['data_treino'] < date('Y-m-d')) {
            return 'A data do treino não pode ser anterior à data atual.';
        }

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

        $stmt->execute([
            $dados['atleta_id'],
            $dados['titulo'],
            $dados['tipo'],
            $dados['unidade'],
            $dados['valor'],
            $dados['treino'],
            $dados['observacoes'],
            $dados['data_treino']
        ]);

        return true;
    }
}