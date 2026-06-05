<?php


    class AdminMiddleware
    {
        public static function handle()
        {
            if ($_SESSION['tipo'] !== 'admin') {

                header('Location: ?route=dashboard');

                exit;
            }
        }
    }

?>