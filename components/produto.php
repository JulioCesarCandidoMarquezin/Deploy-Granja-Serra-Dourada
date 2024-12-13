<div class="align-items-stretch">
    <div class="produto">
        <div class="card" style="width: 18rem;">
            <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?>">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produto['nome'], ENT_QUOTES) ?></h5>
                <p class="card-text"><?= htmlspecialchars($produto['descricao'], ENT_QUOTES) ?></p>
            </div>
        </div>
    </div>
</div>
