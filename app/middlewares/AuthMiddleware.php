<?php

    class AuthMiddleware
    {
        public static function handle()
        {
            if (!isset($_SESSION['usuario_id'])) {

                header('Location: ?route=login');

                exit;
            }
        }
    }

?>