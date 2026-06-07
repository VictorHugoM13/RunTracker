<?php require '../app/views/layouts/header.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-lg-10 p-4">

            <h1>Dashboard</h1>

            <p>Bem-vindo, <?= $_SESSION['nome'] ?></p>

            <div class="card card-dashboard p-3 mt-3">

                <div class="d-flex justify-content-between">

                    <div>
                        <small class="text-muted">
                            Atletas
                        </small>

                        <h2><?= $totalAtletas ?></h2>
                    </div>

                    <div class="card-icon">
                        <i class="bi bi-people"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>