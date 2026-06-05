<?php

class DashboardController
{
    public function index()
    {
        AuthMiddleware::handle();


        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?route=login');
            exit;
        }

        require '../app/views/dashboard/index.php';
    }
}