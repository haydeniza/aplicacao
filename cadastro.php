<?php
require_once("Database.php");
require_once("Clienteclass.php");

$db = new Database();
$con = $db->Conectar();



$cliente = new Clienteclass($con);


if(isset($_GET['id'])){
  if($_GET['id']<>0){
    $id_cliente = $_GET['id'];
    
  $stmt = $cliente->getId($id_cliente);
  if($stmt->rowCount()>0){
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
      $id = $linha['cli_id'];
      $nome = $linha['cli_nome'];
      $idade = $linha['cli_idade'];
      $email = $linha['cli_email'];
      $contato = $linha['cli_contato'];
      $profissao = $linha['cli_profissao'];
    }
  
  }

  }
  
}


  if(!empty($_POST['idcli']) || isset($_POST['idcli'])){
    $id  = @$_POST['idcli'];
    $nome = @$_POST['nome'];
    $idade = @$_POST['idade'];
    $email = @$_POST['email'];
    $contato = @$_POST['contato'];
    $profissao = @$_POST['profissao'];

        $stmt = $cliente->editarCliente($nome,$idade,$email,$contato,$profissao,$id);
        if($stmt){
          echo "<script>"
          ."alert('Salvo com Sucesso');"
          ."location.href='index.php';"
          ."</script>";
        }
        else{
          echo "<script>"
          ."alert('Erro');"
          ."</script>";
        }

      }
      else{
        $stmt = $cliente->insertCliente($nome,$idade,$email,$contato,$profissao);
      if($stmt){
        echo "<script>"
          ."alert('Salvo com Sucesso');"
          ."location.href='index.php';"
          ."</script>";

      }
      else {
        echo "<script>"
          ."alert('Erro');"
          ."</script>";
      }

  }
  
  

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sdsds</title>

    <link rel="stylesheet" href="./assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/meucss.css">

</head>
<body>

  <nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand"> Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="Menu">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a href="index.php" class="nav-link"> home </a>
        </li>
        <li class="nav-item">
          <a href="cadastro.php" class="nav-link"> cadastro </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"> ajuda </a>
        </li>
      </ul>
    </div>

  </nav>
      
      <div class="container">
        <header>
        <h2>Cadastro</h2>
        </header>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Nome</label>
                    <input type="hidden" name="idcli" value="<?php echo @$id;?>">
                    <input type="text" name="nome" id="nome" class="form-control" value="<?php echo @$nome;?>">                    
                </div>        
            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label>Idade</label>
                    <input type="text" name="idade" id="idade" class="form-control" value="<?php echo @$idade;?>">                    
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-5">
                  <label>Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="<?php echo @$email;?>">                    
              </div>              
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
                <label>Contato</label>
                <input type="text" name="contato" id="contato" class="form-control" value="<?php echo @$contato;?>">                                    
            </div>            
          </div>
          <div class="form-row">
            <div class="form-group col-md-5">
                <label>Profissão</label>
                <input type="text" name="profissao" id="profissao" class="form-control" value="<?php echo @$profissao;?>">                    
            </div>
        </div>
        <hr>
        <div class="form-row">
          <button type="submit" class="btn btn-success">
          Salvar
          
          </button>
          <button type="reset" class="btn btn-primary">
            Limpar
          </button>

        </div>

        </form>

      </div>
    

    <script type="text/javascript" src="./assets/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="./assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>