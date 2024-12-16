<?php include 'components/mensagem.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="&#169;2024 Granja Serra Dourada">
    <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
    <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, sustentabilidade, renovável, ecologia, energia, sustentável">
    <meta name="author" content="Granja Serra Dourada">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Granja Serra Dourada">
    <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
    <meta property="og:image" content="assets/images/banner.webp">
    <meta property="og:url" content="https://www.granjaserradourada.com.br/sustentabilidade.php">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/sustentabilidade.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="/assets/images/logo_rounded.png" type="image/x-icon">

    <title>Sustentabilidade</title>
</head>

<body>
    <?php include 'components/cabecalho.php'; ?>

    <main>
        <!-- Introdução -->
        <section id="sustentabilidade-intro" class="text-center py-5">
            <div class="container">
                <h1 class="display-4 fw-bold">Nosso Compromisso com a Sustentabilidade</h1>
                <p class="lead">Na Granja Serra Dourada, a sustentabilidade está no centro de nossas operações. Adotamos práticas ecológicas para proteger o meio ambiente e garantir um futuro saudável para as próximas gerações.</p>
            </div>
        </section>

        <!-- Práticas Sustentáveis -->
        <section id="praticas-sustentaveis" class="container my-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <img src="assets/images/banner.png" alt="Práticas Sustentáveis" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold text-success">Práticas Sustentáveis</h2>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-check-circle text-success me-2"></i>✓ Uso de energia solar para reduzir emissões de carbono.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle text-success me-2"></i>✓ Gestão eficiente de recursos hídricos.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle text-success me-2"></i>✓ Reutilização de resíduos orgânicos como fertilizantes naturais.
                        </li>
                        <li>
                            <i class="bi bi-check-circle text-success me-2"></i>✓ Proteção da biodiversidade local em nossas áreas de produção.
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Cards de Destaques -->
        <section id="destaques" class="py-5" style="background-color: #f9f7f3;">
            <div class="container">
                <div class="row text-center mb-4">
                    <h2 class="fw-bold text-dark">Sustentabilidade</h2>
                    <p class="text-muted mx-auto" style="max-width: 700px;">
                        Nosso compromisso é com o meio ambiente, utilizando práticas sustentáveis que garantem a qualidade de produção e respeito à natureza.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body">
                                <h5 class="text-center card-title fw-bold text-success">Energia Renovável</h5>
                                <p class="card-text text-muted">Utilizamos energia solar para abastecer nossa granja, reduzindo a emissão de carbono.</p>
                            </div>
                            <div class="card-footer bg-transparent text-center">
                                <img src="assets/images/energia.webp" class="img-fluid rounded shadow-sm" alt="Energia Solar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body">
                                <h5 class="text-center card-title fw-bold text-success">Reaproveitamento</h5>
                                <p class="card-text text-muted">Adotamos práticas de reutilização de água e compostagem de resíduos orgânicos.</p>
                            </div>
                            <div class="card-footer bg-transparent text-center">
                                <img src="assets/images/agua.webp" class="img-fluid rounded shadow-sm" alt="Reaproveitamento de Água">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body">
                                <h5 class="text-center card-title fw-bold text-success">Bem-estar Animal</h5>
                                <p class="card-text text-muted">Garantimos um ambiente saudável e espaçoso para as aves.</p>
                            </div>
                            <div class="card-footer bg-transparent text-center">
                                <img src="assets/images/bem-estar.webp" class="img-fluid rounded shadow-sm" alt="Bem-estar Animal">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'components/rodape.php'; ?>
</body>
</html>