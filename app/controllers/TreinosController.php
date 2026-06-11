<?php

require_once __DIR__ . '/../models/Atleta.php';
require_once __DIR__ . '/../models/Treino.php';

class TreinosController
{
    public function cadastrar()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();

        $atleta = $this->buscarAtleta(
            $_GET['atleta_id'] ?? null
        );

        require '../app/views/treinos/cadastrar.php';
    }

    public function salvar()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();

        $dados = $this->obterDadosFormulario();

        $atleta = $this->buscarAtleta(
            $dados['atleta_id']
        );

        $erro = $this->validarDados($dados);

        if ($erro) {
            require '../app/views/treinos/cadastrar.php';
            return;
        }

        $treinoModel = new Treino();

        $treinoModel->cadastrar(
            $dados['atleta_id'],
            $dados['titulo'],
            $dados['tipo'],
            $dados['unidade'],
            $dados['valor'],
            $dados['treino'],
            $dados['observacoes'],
            $dados['data_treino']
        );

        header('Location: ?route=atletas');
        exit;
    }

    private function obterDadosFormulario()
    {
        return [
            'atleta_id' => $_POST['atleta_id'] ?? '',
            'titulo' => trim($_POST['titulo'] ?? ''),
            'tipo' => trim($_POST['tipo'] ?? ''),
            'unidade' => trim($_POST['unidade'] ?? ''),
            'valor' => trim($_POST['valor'] ?? ''),
            'treino' => trim($_POST['treino'] ?? ''),
            'observacoes' => trim($_POST['observacoes'] ?? ''),
            'data_treino' => trim($_POST['data_treino'] ?? '')
        ];
    }

    private function buscarAtleta($id)
    {
        if (!$id) {
            header('Location: ?route=atletas');
            exit;
        }

        $atletaModel = new Atleta();

        return $atletaModel->buscarPorId($id);
    }

    private function validarDados($dados)
    {
        if (
            empty($dados['titulo']) ||
            empty($dados['tipo']) ||
            empty($dados['unidade']) ||
            empty($dados['valor']) ||
            empty($dados['treino']) ||
            empty($dados['data_treino'])
        ) {
            return 'Preencha todos os campos obrigatórios.';
        }

        if ($dados['valor'] <= 0) {
            return 'O valor deve ser maior que zero.';
        }

        if ($dados['data_treino'] < date('Y-m-d')) {
            return 'A data do treino não pode ser anterior à data atual.';
        }

        return null;
    }
}