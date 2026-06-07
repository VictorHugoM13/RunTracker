<?php

    class AtletaController {
        public function dashboard()
        {
            AuthMiddleware::handle();

            if ($_SESSION['tipo'] !== 'atleta') {
                header('Location: ?route=dashboard');
                exit;
            }

            require '../app/views/atleta/dashboard.php';
        }
            }

?>