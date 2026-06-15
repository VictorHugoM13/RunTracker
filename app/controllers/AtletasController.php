<?php

require_once __DIR__ . '/../models/Atleta.php';

class AtletasController
{
    private $atleta;

    public function __construct()
    {
        $this->atleta = new Atleta();
    }

    public function index()
    {
        $this->middlewares();

        $todosAtletas = $this->atleta->listar();

        require __DIR__ . '/../views/atletas/listar.php';
    }

    public function editar()
    {
        $this->middlewares();

        $id = $this->obterId();

        $dadosAtleta = $this->atleta->buscarPorId($id);

        require __DIR__ . '/../views/atletas/editar.php';
    }

    public function atualizar()
    {
        $this->middlewares();

        $id = $_POST['id'] ?? null;
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $tipo = trim($_POST['tipo'] ?? '');

        if (!$id || empty($nome) || empty($email)) {
            $this->redirecionar();
        }

        $ativo = isset($_POST['ativo']) ? 1 : 0;

        $this->atleta->atualizar(
            $id,
            $nome,
            $email,
            $ativo,
            $tipo
        );

        $this->redirecionar();
    }

    public function excluir()
    {
        $this->middlewares();

        $id = $this->obterId();

        $this->atleta->excluir($id);

        $this->redirecionar();
    }

    public function cadastrar()
    {
        $this->middlewares();

        require '../app/views/atletas/cadastrar.php';
    }

    public function salvar()
    {
        $this->middlewares();

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = trim($_POST['senha'] ?? '');
        $objetivo = trim($_POST['objetivo'] ?? '');

        // Validação de entrada

        if (
            empty($nome) ||
            empty($email) ||
            empty($senha) ||
            empty($objetivo)
        ) {
            $erro = "Preencha todos os campos.";

            require '../app/views/atletas/cadastrar.php';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = "Informe um e-mail válido.";

            require '../app/views/atletas/cadastrar.php';
            return;
        }

        // Regra de negócio

        $resultado = $this->atleta->cadastrar(
            $nome,
            $email,
            $senha,
            $objetivo
        );

        if ($resultado !== true) {
            $erro = $resultado;

            require '../app/views/atletas/cadastrar.php';
            return;
        }

        $this->redirecionar();
    }

    private function middlewares()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();
    }

    private function redirecionar()
    {
        header('Location: ?route=atletas');
        exit;
    }

    private function obterId()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            $this->redirecionar();
        }

        return $id;
    }
}