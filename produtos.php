<?php include 'components/mensagem.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="&copy;2024 Granja Serra Dourada">
  <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
  <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, home, ovo, ovos, natureggs, galinha">
  <meta name="author" content="Granja Serra Dourada">
  <meta name="robots" content="index, follow">

  <meta property="og:title" content="Granja Serra Dourada">
  <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
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

    <!-- Início dos produtos -->
    <div class="history-section">
      <h2 class="section-title">Nossos Produtos</h2>
    </div>
    <!-- Primeira fileira de produtos (máximo 3)-->
    <div class="flex-container">
      <!-- Produto 1 -->
      <div class="align-items-stretch">
        <div class="" style="width: 18rem;">
          <img src="assets/images/ovo-granja.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nome 1</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, dignissimos.
            </p>
          </div>
        </div>
      </div>

      <!-- Produto 2 -->
      <div class="align-items-stretch">
        <div class="" style="width: 18rem;">
          <img src="assets/images/ovo-granja.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nome 2</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, provident.
          </div>
        </div>
      </div>

      <!-- Produto 3 -->
      <div class="align-items-stretch">
        <div class="" style="width: 18rem;">
          <img src="assets/images/ovo-granja.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nome 3</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus laboriosam.</p>
          </div>
        </div>
      </div>
    </div>

  </main>

  <?php include 'components/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>