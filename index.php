<?php
session_start();

header('Content-Type: text/html; charset=utf-8');


include './dao/Conexao.php';
include './dao/DaoDepartamento.php';
include './dao/DaoFuncionario.php';
include './model/Departamento.php';
include './model/Funcionario.php';
include './model/util.php';

$menu = Util::getVar('m', Util::REQUEST);
$acao = Util::getVar('acao', Util::REQUEST);
$id = Util::getVar('id', Util::REQUEST);


$url = "?m={$menu}";

$redir = FALSE;

switch($menu):
    case 'departamentos':
        $depDao = new DaoDepartamento(Conexao::getConexao());

        if($acao == 'listar' || $acao == ''){
            $departamentos = $depDao->getDepartamentos();
            $view = 'views/departamentos/list.html.php';
        }

        if($acao == 'incluir'){
            $dept = new Departamento();
            $view = 'views/departamentos/form.html.php';
        }

        if($acao == 'gravar_incluir'){
            $dept = new Departamento();

            //setar departamento usando o método get var, que retorna o valor de POST ou nulo se não
            //estiver setado
            $dept->setNome(Util::getVar('nome', Util::POST));
            $dept->setDescricao(Util::getVar('descricao'), Util::POST);

            //chama método para inserir
            $res = $depDao->salvar($dept);

            if(!$res)
                $url = "?m=departamentos&acao=incluir";

            $redir = TRUE;
        }

        if($acao == 'editar' && $id !== NULL){
            $dept = new Departamento();
            $dept = $depDao->getDepartamento($id);

            $view = 'views/departamentos/form.html.php';
        }

        if($acao == 'gravar_editar' && $id !== NULL){
            $dept = new Departamento();

            $dept->setId(Util::getVar('id', Util::POST));
            $dept->setNome(Util::getVar('nome', Util::POST));
            $dept->setDescricao(Util::getVar('descricao', Util::POST));

            //chama método para editar - mesmo que para salvar, mas passando id
            $res = $depDao->salvar($dept);

            if(!$res)
                $url = "?m=departamentos&acao=editar&id={$id}";

            $redir = TRUE;
        }

        if($acao == 'confirmar_excluir' && $id != NULL){
            $dept = $depDao->getDepartamento($id);

            $view = 'views/departamentos/excluir.html.php';
        }

        if($acao == 'excluir' && $id != NULL){
            $depDao->excluir($id);
            $redir = TRUE;
        }

        break;

    case 'funcionarios':
        $funcDao = new DaoFuncionario(Conexao::getConexao());

        if($acao == 'listar' || $acao == ''){
            $funcionarios = $funcDao->getFuncionarios();
            $view = 'views/funcionarios/list.html.php';
        }

        if($acao == 'incluir'){
            $func = new Funcionario();

            //Departamentos para o select box
            $daoDept = new DaoDepartamento(Conexao::getConexao());
            $depts = $daoDept->getDepartamentos();

            $view = 'views/funcionarios/form.html.php';
        }

        if($acao == 'gravar_incluir'){
            $func = new Funcionario();

            $func->setNome(Util::getVar('nome', Util::POST));
            $func->setEstadoCivil(Util::getVar('estado-civil'), Util::POST);
            $func->setCpf(Util::getVar('cpf'), Util::POST);
            $func->setConjuge(Util::getVar('conjuge'), Util::POST);
            $func->setTelefone(Util::getVar('telefone'), Util::POST);
            $func->setEndereco(Util::getVar('endereco'), Util::POST);
            $func->setCargo(Util::getVar('cargo'), Util::POST);
            $func->setIdDep(Util::getVar('departamento'), Util::POST);

            //chama método para inserir
            $res = $funcDao->salvar($func);

            if(!$res)
                $url = "?m=funcionarios&acao=incluir";

            $redir = TRUE;
        }

        if($acao == 'editar' && $id !== NULL){
            $func = new Funcionario();
            $func = $funcDao->getFuncionario($id);

            $view = 'views/funcionarios/form.html.php';
        }

        if($acao == 'gravar_editar' && $id !== NULL){
            $func = new Funcionario();

            $func->setId(Util::getVar('id', Util::POST));
            $func->setNome(Util::getVar('nome', Util::POST));
            $func->setEstadoCivil(Util::getVar('estado_civil', Util::POST));
            $func->setCpf(Util::getVar('cpf', Util::POST));
            $func->setConjuge(Util::getVar('conjuge', Util::POST));
            $func->setTelefone(Util::getVar('telefone', Util::POST));
            $func->setEndereco(Util::getVar('endereco', Util::POST));
            $func->setCargo(Util::getVar('cargo', Util::POST));
            $func->setIdDep(Util::getVar('id_dep', Util::POST));

            //chama método para editar - mesmo que para salvar, mas passando id
            $res = $depDao->salvar($dept);

            if(!$res)
                $url = "?m=funcionarios&acao=editar&id={$id}";

            $redir = TRUE;
        }

        if($acao == 'confirmar_excluir' && $id != NULL){
            $func = $funcDao->getFuncionario($id);

            $view = 'views/funcionarios/excluir.html.php';
        }

        if($acao == 'excluir' && $id != NULL){
            $funcDao->excluir($id);
            $redir = TRUE;
        }

        break;

endswitch;




include './views/template.html.php';

if($redir)
    header("Location: {$url}");

?>
