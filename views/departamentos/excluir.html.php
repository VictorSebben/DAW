<section class="confirm-excluir cf">
    <h2>Exclusão do departamento <?php echo $dept->getNome(); ?></h2>
    <div class="desc">Nome: <?php echo $dept->getNome(); ?></div>
    <div class="desc">Descrição: <?php echo $dept->getDescricao(); ?></div>
    <div class="links-acoes">
        <a class="voltar" href="?m=departamentos">Voltar</a>
        <a class="excluir" href="?m=departamentos&acao=excluir&id=<?php echo $id; ?>">
            Excluir
        </a>
    </div>
</section>