<?php
    //require_once 'classes/familias.php';
    function __autoload($class) {
        require_once 'classes/' . $class . '.php';
    }

    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Modelo FC</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
        <script>
            var ch = '<?php echo sha1(time()); ?>';
        </script>
    </head>
    <body>
        <div class="container">
            <header>
<div class="container">
  <div class="jumbotron text-center">
    <a href="index.php" class="btn btn-primary">Familias</a> | 
    <a href="index1.php" class="btn btn-primary">Guerras</a>
</div>
            <!-- Botão de cadastro de familias -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
            Cadastrar Familia</button>
           </header>
            <hr>
            <!-- Form cadastrar -->
            <div style="margin: 0px 0; text-align: center">
                
                <?php
                    $familia = new Familias();
                    
                    // Cadastro de familia
                    if ( isset($_POST['cadastrar']) ):
                        
                        $nome  = $_POST['nome'];
                        $membros = $_POST['membros'];
                        
                        $familia->setNome($nome);
                        $familia->setMembros($membros);
                        
                        if ($familia->insert()) {
                        
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Incluido com sucesso!!! </div>';
                            
                        } else {
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Erro ao Cadastrar!!! </div>';
                        }
                    endif;
                    
                    
                    //exclusao
                    if (isset($_POST['excluir_ui'])){
                        
                        $id = $_POST['id_ui'];
                        
                        if ($familia->delete($id)) {
                        
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>OK!</strong> Excluido com sucesso!!! </div>';
                                                  
                                              } else {
                                                  echo '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>OK!</strong> Erro ao Excluir!!! </div>';
                                              }
                                                
                    }
                    
                    // Alterar
                    if ( isset($_POST['alterar']) ) {
                        $id    = $_POST['id_uii'];
                        $nome  = $_POST['nome'];
                        $membros = $_POST['membros'];
                        
                        $familia->setNome($nome);
                        $familia->setMembros($membros);
                        
                        if ($familia->update($id)) {
                        
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Alterado com Sucesso!!! </div>';
                            
                        } else {
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Erro ao Alterar!!! </div>';
                        }
                                                
                    }
                ?>
            
 <!-- Modal -->
 <div class="modal fade" id="myModal1" role="dialog" style="vertical-align: middle;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastrar Familia</h4>
        </div>
        <div class="modal-body">
        <form class="form-inline" method="post">
        <div class="form-group-inline">
            <label for="nome">Nome da Família:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group-inline">
            <label for="membros">Quantidade de Membros:</label>
            <input type="number" name="membros" id="membros" class="form-control">
        </div>
        <input name="cadastrar" type="submit" class="btn btn-success" value="cadastrar">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- fim Modal -->

            <!-- Inicio da tabela -->
            <h4>Famílias</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>Nome</th>
                        <th>Nº Membros</th>
                        <th>Guerras</th>
                        <th>Vitorias</th>
                        <th>Derrotas</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
        <?php foreach ($familia->findAll() as $key => $value) { ?>
                    <tr>
                        <td> <?php echo $value->nome;?> </td>
                        <td> <?php echo $value->membros;?> </td>
                        <td> 0 </td>
                        <td> 0 </td>
                        <td> 0 </td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo ($value->id);?>">Editar</button>
                            <form class="form_excluir" method="post" style="float: left; margin: 0 15px;">
                                <input name="id_ui" type="hidden" value="<?php echo $value->id;?>"/>
                                <button name="excluir_ui" type="submit" onclick="fn_exluir();" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
        <?php } ?>
                </tbody>
            </table>
            <!-- Fim da tabela -->

  </div>

        <?php foreach ($familia->findAll() as $key => $value) { ?>
            <!-- Modal para alterar Familias -->
            <div id="message<?php echo ($value->id);?>" class="modal fade" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alterando Familia</h4>
                        </div>
                        <div class="modal-body">
                        <form class="cadastrar form-inline" name="cadastrar" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="nome" name="nome" type="text" class="form-control" required value="<?php echo ($value->nome);?>" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">Membros</span>
                                    <input id="membros" name="membros" type="text" class="form-control" value="<?php echo ($value->membros);?>">
                                </div>
                                <input id="id_uii" name="id_uii" type="hidden" value="<?php echo ($value->id);?>"/>
                                <input name="alterar" type="submit" class="btn btn-warning" value="Alterar">
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- fim Modal -->
        <?php } ?>
        </div> <!-- fim cantainer -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.11.3.min.js" integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g=" crossorigin="anonymous"></script>
    </body>
</html>