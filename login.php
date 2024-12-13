<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="&copy;2024 Granja Serra Dourada">
    <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
    <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, sobre, historia, missao, valores">
    <meta name="author" content="Granja Serra Dourada">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Granja Serra Dourada">
    <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
    <meta property="og:image" content="assets/images/banner.webp">
    <meta property="og:url" content="https://www.granjaserradourada.com.br/sobre">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="assets/images/logo_rounded.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Quem Somos</title>
</head>

<body class="bg-light">
    <?php include 'components/cabecalho.php'; ?>

    <div class="container align-items-center justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Login</h3>

                        <form action="/classes/Servidor.php" method="POST">
                            <input type="hidden" name="action" value="login">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Digite seu email" required>
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" id="senha" name="senha" class="form-control"
                                    placeholder="Digite sua senha" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <small>Não tem uma conta? <a href="/cadastro.php">Registre-se</a></small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control"
                        placeholder="Digite sua senha" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                
                        <div class="text-center mt-3">
                            <small>Não tem uma conta? <a href="cadastro.php">Registre-se</a></small>
                        </div>
                        </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>