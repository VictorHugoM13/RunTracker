<?php

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';
require_once '../app/controllers/AtletaController.php';
require_once '../app/controllers/TreinosController.php';
require_once '../app/controllers/AtletasController.php';
require_once '../app/middlewares/AuthMiddleware.php';
require_once '../app/middlewares/AdminMiddleware.php';

$route = $_GET['route'] ?? 'login';

switch ($route) {

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'dashboard':
        $controller = new DashboardController();
        $controller->index();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'dashboard-atleta':
        $controller = new AtletaController();
        $controller->dashboard();
        break;
    case 'atletas':
        $controller = new AtletasController();
        $controller->index();
        break;
    case 'atletas-editar':
        $controller = new AtletasController();
        $controller->editar();
        break;
    case 'atletas-atualizar':
        $controller = new AtletasController();
        $controller->atualizar();
        break;
    case 'atletas-excluir':
        $controller = new AtletasController();
        $controller->excluir();
        break;
    case 'atletas-cadastrar':
        $controller = new AtletasController();
        $controller->cadastrar();
        break;

    case 'atletas-salvar':
        $controller = new AtletasController();
        $controller->salvar();
        break;
    case 'treinos-cadastrar':
        $controller = new TreinosController();
        $controller->cadastrar();
        break;

    case 'treinos-salvar':
        $controller = new TreinosController();
        $controller->salvar();
        break;

    default:
        echo "Página não encontrada";
        break;
}