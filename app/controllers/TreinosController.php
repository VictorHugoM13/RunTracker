<?php

require_once __DIR__ . '/../models/Atleta.php';
require_once __DIR__ . '/../models/Treino.php';

class TreinosController
{
    public function cadastrar()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();

        $atletaId = $_GET['atleta_id'] ?? null;

        if (!$atletaId) {
            header('Location: ?route=atletas');
            exit;
        }

        $atletaModel = new Atleta();

        $atleta = $atletaModel->buscarPorId($atletaId);

        require '../app/views/treinos/cadastrar.php';
    }

    public function salvar()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();

        $atletaId = $_POST['atleta_id'] ?? '';
        $titulo = trim($_POST['titulo'] ?? '');
        $tipo = trim($_POST['tipo'] ?? '');
        $unidade = trim($_POST['unidade'] ?? '');
        $valor = trim($_POST['valor'] ?? '');
        $treino = trim($_POST['treino'] ?? '');
        $observacoes = trim($_POST['observacoes'] ?? '');
        $dataTreino = trim($_POST['data_treino'] ?? '');

        $atletaModel = new Atleta();
        $atleta = $atletaModel->buscarPorId($atletaId);

        // Validação de campos obrigatórios
        if (
            empty($titulo) ||
            empty($tipo) ||
            empty($unidade) ||
            empty($valor) ||
            empty($treino) ||
            empty($dataTreino)
        ) {

            $erro = "Preencha todos os campos obrigatórios.";

            require '../app/views/treinos/cadastrar.php';

            return;
        }

        // Valor deve ser maior que zero
        if ($valor <= 0) {

            $erro = "O valor deve ser maior que zero.";

            require '../app/views/treinos/cadastrar.php';

            return;
        }

        // Data não pode ser anterior à atual
        if ($dataTreino < date('Y-m-d')) {

            $erro = "A data do treino não pode ser anterior à data atual.";

            require '../app/views/treinos/cadastrar.php';

            return;
        }

        $treinoModel = new Treino();

        $treinoModel->cadastrar(
            $atletaId,
            $titulo,
            $tipo,
            $unidade,
            $valor,
            $treino,
            $observacoes,
            $dataTreino
        );

        header('Location: ?route=atletas');
        exit;
    }
}