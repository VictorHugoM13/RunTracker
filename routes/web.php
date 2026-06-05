<?php

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/DashboardController.php';
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

    default:
        echo "Página não encontrada";
        break;
}