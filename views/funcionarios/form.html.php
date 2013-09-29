<section class="form">

    <form method="post" action="./">
        <input type="hidden" name="acao" value="gravar_<?php echo $acao; ?>" />
        <input type="hidden" name="m" value="funcionarios" />
        <input type="hidden" name="id" value="<?php Util::printVar($id); ?>" />

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php Util::printObjAttr($func, 'nome'); ?>"/>

        <label for="estado-civil">Estado civil:</label>
        <input type="text" name="estado-civil" value="<?php Util::printObjAttr($func, 'estadoCivil'); ?>"/>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php Util::printObjAttr($func, 'cpf'); ?>"/>

        <label for="conjuge">Cônjuge:</label>
        <input type="text" name="conjuge" value="<?php Util::printObjAttr($func, 'conjuge'); ?>"/>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?php Util::printObjAttr($func, 'telefone'); ?>"/>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" value="<?php Util::printObjAttr($func, 'endereco'); ?>"/>

        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" value="<?php Util::printObjAttr($func, 'cargo'); ?>"/>

        <label for="departamento">Departamento:</label>
        <!--<input type="text" name="departamento" value="<?php Util::printObjAttr($func, 'idDep'); ?>"/>-->
        <select name="departamento">
            <?php
            foreach($depts as $d):

                if($func->getIdDep() == $d->getId())
                    echo "<option value='{$d->getId()}' selected='selected'>{$d->getNome()}</option>";
                else
                    echo "<option value='{$d->getId()}'>{$d->getNome()}</option>";

            endforeach;
            ?>
        </select>

        <input type="submit" value="Enviar" name="enviar"/>
    </form>

</section>