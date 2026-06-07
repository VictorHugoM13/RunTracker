<?php require '../app/views/layouts/header.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-lg-10 p-4">

            <h1>Editar Atleta</h1>

            <p>Edição do atleta: <?= $dadosAtleta['nome'] ?></p>

           <form action="?route=atletas-atualizar" method="POST">

                <input type="hidden" name="id" value="<?= $dadosAtleta['id'] ?>">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        class="form-control"
                        value="<?= $dadosAtleta['nome'] ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="<?= $dadosAtleta['email'] ?>">
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input
                        type="text"
                        id="tipo"
                        name="tipo"
                        class="form-control"
                        readonly
                        value="<?= $dadosAtleta['tipo'] ?>">
                </div>

                <div class="mb-3 form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        id="ativo"
                        name="ativo"
                        value="1"
                        <?= $dadosAtleta['ativo'] == 1 ? 'checked' : '' ?>
                    >

                    <label class="form-check-label" for="ativo">
                        Ativo
                    </label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Salvar Alterações
                    </button>

                    <a href="?route=atletas" class="btn btn-danger">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>