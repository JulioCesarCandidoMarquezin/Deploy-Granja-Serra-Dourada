<?php 

$nome = htmlspecialchars($produto['nome'], ENT_QUOTES);
$imagem = htmlspecialchars($produto['imagem'], ENT_QUOTES);
$descricao = htmlspecialchars($produto['descricao'], ENT_QUOTES);

echo <<<HTML
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card">
            <img src="$imagem" class="card-img-top" alt="$nome">
            <div class="card-body">
                <h5 class="card-title">$nome</h5>
                <p class="card-text">$descricao</p>
            </div>
        </div>
    </div>
HTML;
