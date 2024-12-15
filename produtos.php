<?php include 'components/mensagem.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="&copy;2024 Granja Serra Dourada">
  <meta name="description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
  <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, ovos, produtos, alta qualidade">
  <meta name="author" content="Granja Serra Dourada">
  <meta name="robots" content="index, follow">

  <meta property="og:title" content="Granja Serra Dourada - Produtos">
  <meta property="og:description" content="Conheça os produtos de alta qualidade da Granja Serra Dourada, em Cacoal - RO.">
  <meta property="og:image" content="assets/images/banner.webp">
  <meta property="og:url" content="https://www.granjaserradourada.com.br/produtos.php">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="stylesheet" href="css/produtos.css">
  <link rel="shortcut icon" href="assets/images/logo_rounded.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Nossos Produtos</title>
</head>

<body>
  <?php include 'components/cabecalho.php'; ?>

  <main>
    <?php include 'components/apresentacao.php'; ?>

    <section class="history-section">
      <div class="container py-5">
        <h2 class="section-title">Nossos Produtos</h2>
        <div class="row g-4">
          <?php
            include_once 'php/Produto.class.php';
            $produtos = Produto::all();

            if (!empty($produtos) && is_array($produtos)) {
              foreach ($produtos as $produto) {
                include 'components/produto.php';
              }
            } else {
              echo '<p class="text-center">Nenhum produto disponível no momento.</p>';
            }
          ?>
        </div>
      </div>
    </section>
  </main>

  <?php include 'components/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
