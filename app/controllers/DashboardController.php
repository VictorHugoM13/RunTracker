<?php
require_once __DIR__ . '/../models/Usuario.php';
class DashboardController
{
    public function index()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();

        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?route=login');
            exit;
        }

        $usuarioModel = new Usuario();

        $totalAtletas = $usuarioModel->contarAtletas();

        require '../app/views/dashboard/index.php';
    }
}