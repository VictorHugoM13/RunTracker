<?php require '../app/views/layouts/header.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Atletas</h1>
                <a href="?route=atletas-cadastrar" class="btn btn-primary p-2">
                    Cadastrar Atletas
                </a>
            </div>
            

            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
                            <th>Ativo</th>
                            <th>Objetivo</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($todosAtletas as $atleta) { ?>
                            <tr>
                                <td><?= $atleta['nome'] ?></td>
                                <td><?= $atleta['email'] ?></td>
                                <td><?= $atleta['tipo'] ?></td>
                                <td><?=$atleta['ativo'] == 1
                                ? '<i class="bi bi-check-circle-fill text-success"></i>'
                                : '<i class="bi bi-x-circle-fill text-danger"></i>' ?></td>
                                <td><?= $atleta['objetivo'] ?></td>
                                <td>
                                    <a href="?route=atletas-editar&id=<?= $atleta['id'] ?>" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="?route=atletas-excluir&id=<?= $atleta['id'] ?>" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Deseja realmente excluir este atleta?')">
                                        <i class="bi bi-trash"></i>
                                        
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>