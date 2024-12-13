<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="&copy;2024 Granja Serra Dourada">
    <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
    <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, login, usuário">
    <meta name="author" content="Granja Serra Dourada">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Granja Serra Dourada">
    <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
    <meta property="og:image" content="assets/images/banner.webp">
    <meta property="og:url" content="https://www.granjaserradourada.com.br/login">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="shortcut icon" href="assets/images/logo_rounded.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Cadastro</title>
</head>

<body>
    <?php include 'components/cabecalho.php'; ?>

    <!-- Seção de História -->
    <main>
        <div class="container" id="blocks">

            <div class="content" id="email-box">
                <form action="classes/Servidor.php" method="POST" class="row g-3" style="margin: 20px;">
                    <input type="hidden" name="action" value="cadastro">

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="inputAddress" placeholder="Digite seu Nome">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="exemplo@gmail.com">
                    </div>

                    <div class="col-md-6">
                        <label for="Acesso" class="form-label">Nível de Acesso</label>
                        <select class="form-select" name="nivel" id="Acesso">
                            <option selected hidden>Selecione uma opção</option>
                            <option value="administrador">Administrador</option>
                            <option value="gerente">Gerente</option>
                            <option value="funcionario">Funcionário</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="inputAddress2" placeholder="Insira a sua senha">
                    </div>

                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
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