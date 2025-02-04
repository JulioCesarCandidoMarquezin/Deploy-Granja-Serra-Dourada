<?php include 'components/mensagem.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="&copy;2024 Granja Serra Dourada">
  <meta name="description" content="Granja Serra Dourada, Cacoal - RO.">
  <meta name="keywords"
    content="rondonia, cacoal, granja, serra, dourada, contato, facebook, instagram, linkedin, whatsapp, local, localizacao">
  <meta name="author" content="Granja Serra Dourada">
  <meta name="robots" content="index, follow">

  <meta property="og:title" content="Granja Serra Dourada">
  <meta property="og:description" content="Granja Serra Dourada, produtora de ovos de alta qualidade em Cacoal - RO.">
  <meta property="og:image" content="assets/images/banner.webp">
  <meta property="og:url" content="https://www.granjaserradourada.com.br/contato.php">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="stylesheet" href="css/contato.css">
  <link rel="shortcut icon" href="assets/images/logo_rounded.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Contato</title>
</head>

<body>
  <?php include 'components/cabecalho.php'; ?>

  <main>
    <?php include 'components/apresentacao.php'; ?>

    <div class="container" id="blocks">

      <div class="content" id="email-box" style="display: none;">

        <form action="php/mail.php" class="row g-3" style="margin: 20px;" id="mail-form" method="POST">

          <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputName" placeholder="Digite seu Nome" required>
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="exemplo@gmail.com" required>
          </div>

          <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input id="telefone-input" name="telefone" type="tel" class="form-control" placeholder="(XX) XXXXX-XXXX"
              pattern="\(?\d{2}\)?\s?\d{5}-\d{4}" required>
          </div>

          <div class="col-12">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" name="assunto" class="form-control" id="inputAddress2"
              placeholder="Resuma qual o seu problema ou duvída" required>
          </div>

          <div class="col-12">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="msg" cols="20" rows="10" placeholder="Detalhe o seu problema"></textarea>
          </div>



          <div class="botao" id="form-btns">
            <button type="submit" class="btn" disabled id="sub-button">Enviar</button>
            <button type="reset" class="btn" id="btn-cancel">Cancelar</button>
          </div>
        </form>



      </div>



      
      <div class="content">
        <h1>E-mail</h1>
        <p>Se tem alguma dúvida, precisa de assistência ou informações adicionais sobre nossos produtos, Clique no 
          botão abaixo, preencha o formulário e nos mande um E-mail, reponderemos o mais rápido possível! 
      </p>
        <div class="botao" style="display: flex; justify-content: center;">
          <button class="btn btn-lg" id="btn-talk">E-mail</button>
        </div>
      </div>

      <div class="content">
        <h1>Telefone</h1>
        <p>Para um atendimento mais personalizado ou se você prefere falar diretamente com um de nossos consultores,
          ligue para nós. Estamos disponíveis para atender suas necessidades e oferecer a melhor solução. Entre em
          contato: (69) 99982-2940. Nossa equipe está à disposição para garantir que você receba todo o suporte necessário.</p>
      </div>

    </div>

    <div class="botao" style="display: flex; justify-content: center;"> <button class="btn btn-lg" id="btn-loc">Mostrar
        Localização</button></div>

    <div class="botao" style="display: flex; justify-content: center;">
      <a href="https://maps.google.com/maps?ll=-11.29014,-61.33146&amp;z=16&amp;t=h&amp;hl=pt-BR&amp;gl=BR&amp;mapclient=embed"
        target="_blank" style="text-decoration: none;" type="button" class="btn btn-lg" id="maps">Abrir Localização</a>
    </div>

    <div class="container" id="mapa" style="display: none;">
      <div class="content" style="width: 1830px; height: 730px;">
        <div class="mapBox">
          <h1>Localização</h1>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4697.168391354636!2d-61.33146020085629!3d-11.290139837417199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spt-BR!2sbr!4v1727208805441!5m2!1spt-BR!2sbr"
            width="1830" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </main>

  <?php include 'components/rodape.php'; ?>

  <script src="js/contact.js"></script>
</body>

</html>