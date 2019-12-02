  <?php
  session_start();
  require_once('..\pdo.php');
  $acao=$_GET['acao'];
  $registro['descricao'] = $_POST['descricao'];
  //var_dump($registro);

   if ($acao=="novo") {

    $sql = "INSERT INTO categoria(descricao)VALUES(:descricao);";
    $query = $con->prepare($sql);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaCategoria.php?msg=200');

    }else {
      echo "<h1>ERRO  $r</h1> ";
    }

  }elseif ($acao=="editar") {
    $registro['id']= $_GET['id'];
    $sql = "UPDATE categoria SET descricao=:descricao WHERE id=:id";
    $query = $con->prepare($sql);
    var_dump($registro);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaCategoria.php?msg=201');

    }else {
      echo "<h1>ERRO</h1>";
    }

  }elseif ($acao=="excluir") {
        $id = $_GET['id'];

        $sql   = "SELECT COUNT(*) as qtd FROM chamados WHERE idcategoria=:id";
        $query = $con->prepare($sql);
        $r     = $query->execute(array('id'=>$id));
        $qtd   = $query->fetch();
        if($qtd >= 1) {
          header('Location: listaCategoria.php?msg=400');
        }

        $sql = "DELETE FROM categoria WHERE id=:id";
        $query = $con->prepare($sql);
        $r = $query->execute(array('id'=>$id));
        if($r==true){
          header('Location: listaCategoria.php?msg=202');
        }else{
          echo "Erro ao tentar excluir o registro";
        }




  }



   ?>
