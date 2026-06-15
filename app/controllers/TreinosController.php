<?php

require_once __DIR__ . '/../models/Atleta.php';
require_once __DIR__ . '/../models/Treino.php';

class TreinosController
{
    private $treino;

    public function __construct()
    {
        $this->treino = new Treino();
    }

    public function cadastrar()
    {
        $this->middlewares();

        $atleta = $this->buscarAtleta(
            $_GET['atleta_id'] ?? null
        );

        require '../app/views/treinos/cadastrar.php';
    }

    public function salvar()
    {
        $this->middlewares();

        $dados = $this->obterDadosFormulario();

        $atleta = $this->buscarAtleta(
            $dados['atleta_id']
        );

        // Validação de entrada

        if (
            empty($dados['titulo']) ||
            empty($dados['tipo']) ||
            empty($dados['unidade']) ||
            empty($dados['valor']) ||
            empty($dados['treino']) ||
            empty($dados['data_treino'])
        ) {

            $erro = 'Preencha todos os campos obrigatórios.';

            require '../app/views/treinos/cadastrar.php';
            return;
        }

        // Regras de negócio

        $resultado = $this->treino->cadastrar($dados);

        if ($resultado !== true) {

            $erro = $resultado;

            require '../app/views/treinos/cadastrar.php';
            return;
        }

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

    private function middlewares()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();
    }
}