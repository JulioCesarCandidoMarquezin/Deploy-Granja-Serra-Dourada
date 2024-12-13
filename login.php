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
    <?php include 'components/header.php'; ?>

    <main>
    <div class="presentation-header" style="background-image: url('assets/images/historia1.jpeg');">
            <h1>Granja Serra Dourada</h1>
            <p>A nossa história de dedicação e compromisso com a qualidade</p>
        </div>
        <div class="top">
      <div class="a-t">
        <h1>Página de Login</h1>
      </div>
            
        <div class="container" id="blocks">
            <div class="content" id="email-box">
                <form action="/classes/Servidor.php(nao tá pronto)" method="POST">
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
                
                        <div class="text-center mt-3">
                            <small>Não tem uma conta? <a href="cadastro.php">Registre-se</a></small>
                        </div>
                        </form>
            </div>
        </div>
    </main>
    <?php include './components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>