<?php 
include_once 'php/Auth.class.php';
include_once 'php/Permissao.enum.php';
Auth::checkPermissao(Permissao::GERENCIAR_PRODUTOS);
?>

<?php include 'components/mensagem.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="&copy;2024 Granja Serra Dourada">
    <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
    <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, produtos, cadastro">
    <meta name="author" content="Granja Serra Dourada">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Granja Serra Dourada">
    <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
    <meta property="og:image" content="assets/images/banner.webp">
    <meta property="og:url" content="https://www.granjaserradourada.com.br/produtos">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/produtos.css">
    <link rel="shortcut icon" href="assets/images/logo_rounded.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Nossos Produtos</title>
</head>

<body>
    <?php include 'components/cabecalho.php'; ?>

    <div class="container mt-5">
        <form class="form" action="/php/Servidor.php" method="POST" enctype="multipart/form-data">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-sm rounded p-4">
                            <h2 class="text-center mb-4">Cadastrar Produto</h2>

                            <input type="hidden" name="action" value="cadastro-produto">

                            <div class="form-group mb-3">
                                <label for="nome" class="font-weight-bold">Nome do Produto</label>
                                <input type="text" class="form-control form-control-lg shadow-sm" id="nome" name="nome" required placeholder="Ex: Natureggs">
                                <small class="form-text text-muted">Insira o nome do produto.</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="descricao" class="font-weight-bold">Descrição</label>
                                <textarea class="form-control form-control-lg shadow-sm" id="descricao" name="descricao" rows="4" required placeholder="Ex: Prático, gostoso..." style="resize: none;"></textarea>
                                <small class="form-text text-muted">Forneça uma descrição detalhada do produto.</small>
                            </div>

                            <div class="mb-3">
                                <label for="imagem" class="form-label font-weight-bold">Imagem do Produto</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="imagem">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"></path>
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"></path>
                                    </svg>
                                    </label>
                                    <input class="form-control" type="file" id="imagem" name="imagem" accept="image/*" required>
                                </div>
                                <small class="form-text text-muted">Carregue uma imagem representativa do produto.</small>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-3 shadow">Cadastrar Produto</button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="/" class="btn btn-outline-secondary btn-sm">Voltar para a Página Principal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>
</html>