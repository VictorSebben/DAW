<section class="form">

    <form method="post" action="./">
        <input type="hidden" name="acao" value="gravar_<?php echo $acao; ?>" />
        <input type="hidden" name="m" value="departamentos" />
        <input type="hidden" name="id" value="<?php Util::printVar($id); ?>" />

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php Util::printObjAttr($dept, 'nome'); ?>"/>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" value="<?php Util::printObjAttr($dept, 'descricao'); ?>"/>

        <input type="submit" value="Enviar" name="enviar"/>
    </form>

</section>