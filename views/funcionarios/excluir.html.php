<section class="confirm-excluir cf">
    <h2>Exclusão do departamento <?php echo $func->getNome(); ?></h2>
    <div class="desc">Nome: <?php echo $func->getNome(); ?></div>
    <div class="links-acoes">
        <a class="voltar" href="?m=funcionarios">Voltar</a>
        <a class="excluir" href="?m=funcionarios&acao=excluir&id=<?php echo $id; ?>">
            Excluir
        </a>
    </div>
</section>