<?php
    require_once __DIR__ . '/../models/Atleta.php';

    class AtletasController {
        public function index() {
            AuthMiddleware::handle();
            AdminMiddleware::handle();
            $atletas = new Atleta();

            $todosAtletas = $atletas->listar();

            require __DIR__ . '/../views/atletas/listar.php';
        }

        public function editar() {
            AuthMiddleware::handle();
            AdminMiddleware::handle();
            $id = $_GET['id'] ?? null;

            if (!$id) {
                header('Location: ?route=atletas');
                exit;
            }

            $atleta = new Atleta();

            $dadosAtleta = $atleta->buscarPorId($id);

            require __DIR__ . '/../views/atletas/editar.php';
        }
        public function atualizar()
        {
            AuthMiddleware::handle();
            AdminMiddleware::handle();
            $id = $_POST['id'] ?? null;
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $tipo = trim($_POST['tipo'] ?? '');

            if (!$id || empty($nome) || empty($email)) {
                header('Location: ?route=atletas');
                exit;
            }
            $ativo = isset($_POST['ativo']) ? 1 : 0;

            $atleta = new Atleta();

            $atleta->atualizar($id, $nome, $email, $ativo, $tipo);

            header('Location: ?route=atletas');
            exit;
        }

        public function excluir()
        {
            
            AuthMiddleware::handle();
            AdminMiddleware::handle();
            $id = $_GET['id'] ?? null;;
            if (!$id) {
                header('Location: ?route=atletas');
                exit;
            }

            $atleta = new Atleta();

            $atleta->excluir($id);

            header('Location: ?route=atletas');
            exit;
        }
    }


?>