<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RunTracker - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div class="container-fluid">
    <div class="row login-container">

        <!-- LADO ESQUERDO -->
        <div class="col-lg-7 d-none d-lg-flex flex-column justify-content-center px-5 left-side">

            <h1 class="brand">RUNTRACKER</h1>

            <p class="slogan mb-5">
                Planeje. Execute. Evolua.
            </p>

            <div class="row g-3">

                <div class="col-md-4">
                    <div class="stat">
                        <h3>🏃</h3>
                        <h5>Treinos</h5>
                        <p class="mb-0">Controle completo</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat">
                        <h3>📈</h3>
                        <h5>Evolução</h5>
                        <p class="mb-0">Gráficos detalhados</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat">
                        <h3>🎯</h3>
                        <h5>Metas</h5>
                        <p class="mb-0">Acompanhe resultados</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- LADO DIREITO -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center">

            <div class="card login-card p-4">

                <div class="text-center mb-3">
                    <h2 class="fw-bold">Bem-vindo!</h2>
                    <p class="text-muted">
                        Acesse sua conta para continuar
                    </p>
                </div>

                <div class="text-center">
                    <img src= "assets/img/logo.jpg" class="img-fluid mb-2" style="width: 100px; height: 80px;" alt="logo-runTracker">
                </div>

                <?php if (isset($erro)): ?>
                    <div class="alert alert-danger">
                        <?= $erro ?>
                    </div>
                <?php endif; ?>

                <form action="?route=login" method="POST">

                    <div class="mb-3">
                        <label class="form-label">
                            E-mail
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            placeholder="Digite seu e-mail"
                            name="email"
                            value="<?= htmlspecialchars($email ?? '') ?>"
                            >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Senha
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            placeholder="Digite sua senha"
                            name="senha"
                            >
                    </div>

                    <div class="d-flex justify-content-between mb-4">

                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox">

                            <label class="form-check-label">
                                Lembrar-me
                            </label>
                        </div>

                        <a href="#" class="text-decoration-none">
                            Esqueci minha senha
                        </a>

                    </div>

                    <button type="submit" class="btn btn-run text-white w-100 py-2">
                        Entrar
                    </button>

                </form>

            </div>

        </div>

    </div>
</div>

</body>
</html>