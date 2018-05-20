<?php
    //require_once 'classes/guerras.php';
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

            <!-- Botão de cadastro de guerras -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" style="float: left; margin: 0 0px;">
            Cadastrar Guerra</button>

        <form class="form-inline" method="post" style="float: left; margin: 0 90px;">
            <label for="inicio">Inicio:</label>
            <input type="date" class="form-control" id="inicio" name="inicio">
            <label for="fim">Fim:</label>
            <input type="date" class="form-control" id="fim" name="fim">
            <input name="pesquisar" type="submit" class="btn btn-success" value="Filtrar">
        </form>

           </header>

<hr>

            <!-- Form cadastrar -->
            <div style="margin: 0px 0; text-align: center">
                
            <?php
                    $guerra = new Guerras();
                    
                    // Cadastro de guerra
                    if ( isset($_POST['cadastrar']) ):
                        
                        $desafiadora  = $_POST['desafiadora'];
                        $desafiada = $_POST['desafiada'];
                        $inicio = $_POST['inicio'];
                        $fim = $_POST['fim'];
                        $vencedora = $_POST['vencedora'];
                        
                        $guerra->setDesafiadora($desafiadora);
                        $guerra->setDesafiada($desafiada);
                        $guerra->setInicio($inicio);
                        $guerra->setFim($fim);
                        $guerra->setVencedora($vencedora);
                        
                        if ($guerra->insert()) {
                        
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
                        
                        if ($guerra->delete($id)) {
                        
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
                        $desafiadora  = $_POST['desafiadora'];
                        $desafiada = $_POST['desafiada'];
                        $inicio = $_POST['inicio'];
                        $fim = $_POST['fim'];
                        $vencedora = $_POST['vencedora'];
                        
                        $guerra->setDesafiadora($desafiadora);
                        $guerra->setDesafiada($desafiada);
                        $guerra->setInicio($inicio);
                        $guerra->setFim($fim);
                        $guerra->setVencedora($vencedora);
                        
                        if ($guerra->update($id)) {
                        
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Alterado com Sucesso!!! </div>';
                            
                        } else {
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Erro ao Alterar!!! </div>';
                        }
                                                
                    }

                    // pesquisar
                    if ( isset($_POST['pesquisar']) ):
                        
                        $inicio = $_POST['inicio'];
                        $fim = $_POST['fim'];

                        $guerra->getInicio($inicio);
                        $guerra->getFim($fim);
                        
                        if ($guerra->findAll()) {
                        
                            echo 'Não tive tempo suficiente de terminar mas consigo fazer e sei trabalhar';
                        } else {
                            echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Erro ao Pesquisar!!! </div>';
                        }
                    endif;
                    
                    
                ?>
            
 <!-- Modal -->
 <div class="modal fade" id="myModal1" role="dialog" style="vertical-align: middle;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cadastrar Guerra</h4>
        </div>
        <div class="modal-body">
        <form class="form-inline" method="post">
        <div class="form-group-inline">
            <label for="desafiadora">Desafiadora:</label>
            <input type="text" class="form-control" id="desafiadora" name="desafiadora">
        </div>
        <div class="form-group-inline">
            <label for="desafiada">Desafiada:</label>
            <input type="text" class="form-control" id="desafiada" name="desafiada">
        </div>
        <div class="form-group-inline">
            <label for="inicio">Inicio:</label>
            <input type="date" class="form-control" id="inicio" name="inicio">
        </div>
        <div class="form-group-inline">
            <label for="fim">Fim:</label>
            <input type="date" class="form-control" id="fim" name="fim">
        </div>
        <div class="form-group-inline">
            <label for="vencedora">Vencedora:</label>
            <input type="text" class="form-control" id="vencedora" name="vencedora">
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
<?php

$data = isset($inicio);

  function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}
?>

            <!-- Inicio da tabela -->
            <h4>Famílias</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>desafiadora</th>
                        <th>desafiada</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                        <th>Vencedora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
        <?php foreach ($guerra->findAll() as $key => $value) { ?>
          
                    <tr>
                        <td> <?php echo $value->desafiadora;?> </td>
                        <td> <?php echo $value->desafiada;?> </td>
                        <td> <?php echo inverteData($value->inicio);?> </td>
                        <td> <?php echo inverteData($value->fim);?> </td>
                        <td> <?php echo $value->vencedora;?> </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message<?php echo ($value->id);?>">Alterar</button>

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


        <?php foreach ($guerra->findAll() as $key => $value) { ?>
            <!-- Modal para alterar guerras -->
            <div id="message<?php echo ($value->id);?>" class="modal fade" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Alterando guerra</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" method="post">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="desafiadora" name="desafiadora" type="text" class="form-control" required value="<?php echo ($value->desafiadora);?>" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="desafiada" name="desafiada" type="text" class="form-control" required value="<?php echo ($value->desafiada);?>" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="inicio" name="inicio" type="date" class="form-control" required value="<?php echo ($value->inicio);?>" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="fim" name="fim" type="date" class="form-control" required value="<?php echo ($value->fim);?>" >
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="vencedora" name="vencedora" type="text" class="form-control" required value="<?php echo ($value->vencedora);?>" >
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