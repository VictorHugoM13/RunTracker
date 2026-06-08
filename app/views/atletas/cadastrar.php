<?php require '../app/views/layouts/header.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-lg-10 p-4">

            <h1>Cadastrar Atleta</h1>
            <?php if(isset($erro)) : ?>
                <div class="alert alert-danger">
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            <form action="?route=atletas-salvar" method="POST" onsubmit="return confirm('Confirma o cadastro do atleta?')">

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input
                        type="password"
                        name="senha"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Objetivo</label>

                    <select name="objetivo" class="form-select">
                        <option value="">Selecione um objetivo</option>
                        <option value="5 km">5 km</option>
                        <option value="10 km">10 km</option>
                        <option value="21 km">21 km</option>
                        <option value="42 km">42 km</option>
                        <option value="Emagrecimento">Emagrecimento</option>
                        <option value="Condicionamento Físico">Condicionamento Físico</option>
                        <option value="Melhorar Pace">Melhorar Pace</option>
                    </select>
                </div>

                <button type="submit" 
                class="btn btn-success">
                    Salvar
                </button>

                <a href="?route=atletas" class="btn btn-danger">
                    Cancelar
                </a>

            </form>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>