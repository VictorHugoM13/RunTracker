<?php require '../app/views/layouts/header.php'; ?>

<div class="container-fluid">

    <div class="row">
        

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-lg-10 p-4">
            <?php if(isset($erro)) : ?>
                <div class="alert alert-danger">
                    <?= $erro ?>
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1>Cadastrar Treino</h1>
                    <div>
                        Cadastrando treino para o atleta, 
                        <strong><?= htmlspecialchars($atleta['nome'] ?? '') ?></strong>
                    </div>
                </div>

                <a href="?route=atletas" class="btn btn-secondary">
                    Voltar
                </a>
            </div>

            <div class="card shadow-sm">

                <div class="card-body">

                    <form action="?route=treinos-salvar" method="POST">

                        <input
                            type="hidden"
                            name="atleta_id"
                            value="<?= $atleta['id'] ?? '' ?>">

                        <!-- Título -->

                        <div class="mb-3">

                            <label class="form-label">
                                Título do Treino
                            </label>

                            <input
                                type="text"
                                name="titulo"
                                class="form-control"
                                placeholder="Ex: Longão 15km">

                        </div>

                        <!-- Tipo -->

                        <div class="mb-3">

                            <label class="form-label">
                                Tipo de Treino
                            </label>

                            <select
                                name="tipo"
                                class="form-select">

                                <option value="">
                                    Selecione
                                </option>

                                <option value="Rodagem">
                                    Rodagem
                                </option>

                                <option value="Longão">
                                    Longão
                                </option>

                                <option value="Intervalado">
                                    Intervalado
                                </option>

                                <option value="Fartlek">
                                    Fartlek
                                </option>

                                <option value="Regenerativo">
                                    Regenerativo
                                </option>

                                <option value="Tempo Run">
                                    Tempo Run
                                </option>

                                <option value="Progressivo">
                                    Progressivo
                                </option>

                            </select>

                        </div>
                       <div class="mb-3">

                        <label class="form-label">
                            Unidade do Treino
                        </label>

                        <select
                            id="unidade"
                            name="unidade"
                            class="form-select">

                            <option value="">
                                Selecione
                            </option>

                            <option value="km">
                                Quilometragem
                            </option>

                            <option value="tempo">
                                Tempo
                            </option>

                        </select>

                    </div>

                    <div
                        id="campoValor"
                        class="mb-3"
                        style="display:none;">

                        <label
                            id="labelValor"
                            class="form-label">

                            Valor

                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="valor"
                            class="form-control">

                    </div>

                        <!-- Data -->

                        <div class="mb-3">

                            <label class="form-label">
                                Data do Treino
                            </label>

                            <input
                                type="date"
                                name="data_treino"
                                class="form-control"
                                min="<?= date('Y-m-d') ?>">

                        </div>

                        <!-- Treino -->

                        <div class="mb-3">

                            <label class="form-label">
                                Descrição do Treino
                            </label>

                            <textarea
                                name="treino"
                                rows="5"
                                class="form-control"
                                placeholder="Ex: 2km TR + 4km RM + 2km TR"></textarea>

                        </div>

                        <!-- Observações -->

                        <div class="mb-3">

                            <label class="form-label">
                                Observações
                            </label>

                            <textarea
                                name="observacoes"
                                rows="3"
                                class="form-control"
                                placeholder="Ex: Manter frequência cardíaca controlada"></textarea>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success"
                            onclick="return confirm('Confirma o cadastro deste treino?')">

                            Salvar Treino

                        </button>

                    </form>

                </div>

            </div>

            <!-- LEGENDA -->

            <div class="card shadow-sm mt-4">

                <div class="card-header">
                    <strong>Legenda de Ritmos</strong>
                </div>

                <div class="card-body">

                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th>Sigla</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td><strong>TR</strong></td>
                                <td>Trote - esforço muito leve.</td>
                            </tr>

                            <tr>
                                <td><strong>RL</strong></td>
                                <td>Ritmo leve e confortável.</td>
                            </tr>

                            <tr>
                                <td><strong>ROD</strong></td>
                                <td>Rodagem confortável.</td>
                            </tr>

                            <tr>
                                <td><strong>RM</strong></td>
                                <td>Ritmo moderado.</td>
                            </tr>

                            <tr>
                                <td><strong>RAC</strong></td>
                                <td>Ritmo acelerado.</td>
                            </tr>

                            <tr>
                                <td><strong>RF</strong></td>
                                <td>Ritmo forte.</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

        
<?php require '../app/views/layouts/footer.php'; ?>