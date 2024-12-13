<div class="align-items-stretch">
    <div class="" style="width: 18rem;">
        <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?>" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?></h5>
        <p class="card-text"><?= htmlspecialchars($produto['descricao'], ENT_QUOTES) ?></p>
        </div>
    </div>
</div>