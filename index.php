<?php include 'components/mensagem.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="copyright" content="&#169;2024 Granja Serra Dourada">
    <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
    <meta name="keywords" content="rondonia, cacoal, granja, serra, dourada, home, galinha, ovo, ovos">
    <meta name="author" content="Granja Serra Dourada">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Granja Serra Dourada">
    <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
    <meta property="og:image" content="assets/images/banner.webp">
    <meta property="og:url" content="https://www.granjaserradourada.com.br">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="/assets/images/logo_rounded.png" type="image/x-icon">

    <title>Granja Serra Dourada</title>
</head>

<body>
    <?php include 'components/cabecalho.php'; ?>

    <main>
        <?php include 'components/apresentacao.php'; ?>

        <section class="highlight-cards-section">
            <h2 class="highlight-cards-title">Destaques</h2>

            <div class="highlight-cards-container">
                <div class="highlight-card">
                    <h3>Ovos in natura</h3>
                    <p>{}</p>
                </div>
                <div class="highlight-card">
                    <h3>Ovos pasteurizados</h3>
                    <p>{}</p>
                </div>
                <div class="highlight-card">
                    <h3>Sustentabilidade</h3>
                    <p>{}</p>
                </div>
                <div class="highlight-card">
                    <h3>Qualidade de Criação</h3>
                    <p>Nossas galinhas são criadas com todo o cuidado para garantir os melhores ovos.</p>
                </div>
            </div>
        </section>

        <section class="highlights-section">
            <div class="highlights-container">
                <section class="highlight">
                    <div class="highlight-text">
                        <h2>Ovos in natura</h2>
                        <p>Nossos Ovos in natura são produzidos com o máximo de qualidade, garantindo frescor e um sabor
                            autêntico.</p>
                        <a href="#" class="highlight-button">Conheça nossos ovos</a>
                    </div>
                    <div class="highlight-image">
                        <img src="assets/images/ovos.jpeg" alt="Ovos Caipiras" loading="lazy">
                    </div>
                </section>

                <section class="highlight">
                    <div class="highlight-image">
                        <img src="assets/images/ovos.jpeg" alt="Ovos Caipiras" loading="lazy">
                    </div>
                    <div class="highlight-text">
                        <h2>Ovos Caipiras</h2>
                        <p>Nossos ovos caipiras são produzidos com o máximo de qualidade, garantindo frescor e um sabor
                            autêntico.</p>
                        <a href="#" class="highlight-button">Conheça nossos ovos</a>
                    </div>
                </section>

                <section class="highlight">
                    <div class="highlight-text">
                        <h2>Ovos Caipiras</h2>
                        <p>Nossos ovos caipiras são produzidos com o máximo de qualidade, garantindo frescor e um sabor
                            autêntico.</p>
                        <a href="#" class="highlight-button">Conheça nossos ovos</a>
                    </div>
                    <div class="highlight-image">
                        <img src="assets/images/ovos.jpeg" alt="Ovos Caipiras" loading="lazy">
                    </div>
                </section>

                <section class="highlight">
                    <div class="highlight-image">
                        <img src="assets/images/condicoes.webp" alt="Ovos Caipiras" loading="lazy">
                    </div>
                    <div class="highlight-text">
                        <h2>Qualidade de criação</h2>
                        <p>
                            A excelência em cada grão: alimentação cuidadosamente selecionada, controle rigoroso e a
                            chave para ovos de qualidade superior.
                            Aqui, cada refeição é um passo crucial para garantir ovos saudáveis e nutritivos.
                        </p>
                        <a href="#" class="highlight-button">Descubra nosso segredo</a>
                    </div>
                </section>
            </div>
        </section>

        <section class="differentials-section">
            <h2 class="differentials-title">Nossos Diferenciais</h2>

            <div class="differentials-container">
                <div class="differential">
                    <h3>Qualidade Impecável</h3>
                    <p>
                        Os mais rigorosos padrões de qualidade para garantir que você receba sempre o melhor produto.
                    </p>
                </div>
                <div class="differential">
                    <h3>Sustentabilidade</h3>
                    <p>
                        Compromisso com o meio ambiente, implementando práticas sustentáveis em nossa produção.
                    </p>
                </div>
                <div class="differential">
                    <h3>Experiência e Praticidade</h3>
                    <p>
                        Visamos a melhor experiência e facilidade de uso no dia a dia, conheça nossos outros produtos!
                    </p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'components/rodape.php'; ?>
</body>

</html>