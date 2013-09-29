<section class="listagem">

    <h1>Lista de funcionários</h1>

    <!--Chamar mensagens de sistema (se houver)-->
    <?php Util::showSystemMsgs(); ?>

    <a href="?m=funcionarios&acao=incluir">Incluir funcionário</a>

    <?php if($funcionarios): ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Estado civil</th>
                <th>CPF</th>
                <th>Conjuge</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($funcionarios AS $funcionario):
                $id = $funcionario->getId();
                $nome = $funcionario->getNome();
                $estCiv = $funcionario->getEstadoCivil();
                $cpf = $funcionario->getCpf();
                $conjuge = $funcionario->getConjuge();
                $telefone = $funcionario->getTelefone();
                $endereco = $funcionario->getEndereco();
                $cargo = $funcionario->getCargo();
                $departamento = $funcionario->getIdDep();
            ?>

            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nome; ?></td>
                <td><?php echo $estCiv; ?></td>
                <td><?php echo $cpf; ?></td>
                <td><?php echo $conjuge; ?></td>
                <td><?php echo $telefone; ?></td>
                <td><?php echo $endereco; ?></td>
                <td><?php echo $cargo; ?></td>
                <td><?php echo $departamento; ?></td>
                <td><a href="?m=funcionarios&acao=editar&id=<?php echo $id; ?>">Editar</a></td>
                <td><a href="?m=funcionarios&acao=confirmar_excluir&id=<?php echo $id; ?>">Excluir</a></td>
            </tr>

            <?php
            endforeach;
            ?>

        </tbody>
    </table>

    <?php endif; ?>

</section>