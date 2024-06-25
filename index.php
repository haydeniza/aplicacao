<?php
require_once("Database.php");
require_once("Clienteclass.php");

$db = new Database();

$con = $db->Conectar();

$cliente = new Clienteclass($con);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>

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

  <div class="container-fluid">

      <header id="cabecalho">
        <a href="cadastro.php?id=0" class="btn btn-success">Adicionar</a>
   
      </header>

      <table class="table table-striped table-hover">
        <thead>
         <tr class="text-center"> 
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Idade</th>
          <th scope="col">Email</th>
          <th scope="col">Contato</th>
          <th scope="col">Profissão</th>
          <th scope="col" colspan="3">Ação</th>
         </tr>
        </thead>
          <tbody>
            <?php
            $stmt = $cliente->getAll();

            if($stmt->rowCount()>0){
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
              <tr>
                <td><?php echo $row["cli_id"]."<br>";?></td>
                <td><?php echo $row["cli_nome"]."<br>";?></td>
                <td><?php echo $row["cli_idade"]."<br>";?></td>
                <td><?php echo $row["cli_email"]."<br>";?></td>
                <td><?php echo $row["cli_contato"]."<br>";?></td>
                <td><?php echo $row["cli_profissao"]."<br>";?></td>
                <td><a href="#" class="btn btn-primary">Visualizar</a></td>
                <td><a href="cadastro.php?id=<?php echo $row["cli_id"];?>" class="btn btn-warning">Editar</a></td>
                <td><a href="#" class="btn btn-danger">Excluir</a></td>
              </tr>
                <?php
                }
              }
              else{
                echo "<td colspan='8' align='center'> Vazia </td>";
              }
                ?>
          </tbody>
          <tfoot id="rodape">
            <tr>
              <td colspan="9">Quantidade de Registros:<?php echo $stmt->rowCount();?></td>
            </tr>
          </tfoot>
      </table>


    
  </div>
  


<script type="text/javascript" src="./assets/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="./assets/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
