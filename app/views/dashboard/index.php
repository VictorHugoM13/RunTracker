<?php require '../app/views/layouts/header.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-lg-10 p-4">

            <h1>Dashboard</h1>

            <p>Bem-vindo, <?= $_SESSION['nome'] ?></p>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>