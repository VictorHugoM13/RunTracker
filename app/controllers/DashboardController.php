<?php

require_once __DIR__ . '/../models/Usuario.php';

class DashboardController
{
    private $usuario;

    public function __construct()
    {
        $this->usuario = new Usuario();
    }

    public function index()
    {
        $this->middlewares();

        $totalAtletas = $this->usuario->contarAtletas();

        require '../app/views/dashboard/index.php';
    }

    private function middlewares()
    {
        AuthMiddleware::handle();
        AdminMiddleware::handle();
    }
}