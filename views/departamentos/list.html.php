<section class="listagem">

    <h1>Lista de departamentos</h1>

    <!--Chamar mensagens de sistema (se houver)-->
    <?php Util::showSystemMsgs(); ?>

    <a href="?m=departamentos&acao=incluir">Incluir departamento</a>

    <?php if($departamentos): ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($departamentos AS $departamento):
                $id = $departamento->getId();
                $nome = $departamento->getNome();
                $desc = $departamento->getDescricao();
            ?>

            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $desc; ?></td>
                <td><a href="?m=departamentos&acao=editar&id=<?php echo $id; ?>">Editar</a></td>
                <td><a href="?m=departamentos&acao=confirmar_excluir&id=<?php echo $id; ?>">Excluir</a></td>
            </tr>

            <?php
            endforeach;
            ?>

        </tbody>
    </table>

    <?php endif; ?>

</section>