<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Empresa - DAW</title>

        <link rel="stylesheet" href="css/layout.css">
    </head>
    <body>
        <section id="container">

            <ul>
                <li><a href="?m=departamentos">Departamentos</a></li>
                <li><a href="?m=funcionarios">Funcionários</a></li>
            </ul>

        <?php
        if(isset($view) && $view != NULL):
            include $view;

        else:
            echo "<h1 class='bem-vindo'>Bem vindo ao sistema!</h1>";

        endif;

        ?>

        </section>
    </body>
</html>
