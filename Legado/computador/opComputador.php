  <?php
  session_start();
  require_once('..\pdo.php');
  $acao=$_GET['acao'];
  $registro['nome'] = $_POST['nome'];
  //var_dump($registro);

   if ($acao=="novo") {

    $sql = "INSERT INTO computador(nome)VALUES(:nome);";
    $query = $con->prepare($sql);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaComputador.php?msg=200');

    }else {
      echo "<h1>ERRO  $r</h1> ";
    }

  }elseif ($acao=="editar") {
    $registro['id']= $_GET['id'];
    $sql = "UPDATE computador SET nome=:nome WHERE id=:id";
    $query = $con->prepare($sql);
    var_dump($registro);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaComputador.php?msg=201');

    }else {
      echo "<h1>ERRO</h1>";
    }

  }elseif ($acao=="excluir") {
        $id = $_GET['id'];

        $sql   = "SELECT COUNT(*) as qtd FROM chamados WHERE idcomputador=:id";
        $query = $con->prepare($sql);
        $r     = $query->execute(array('id'=>$id));
        $qtd   = $query->fetch();
        if($qtd >= 1) {
          header('Location: listaComputador.php?msg=400');
        }

        $sql = "DELETE FROM computador WHERE id=:id";
        $query = $con->prepare($sql);
        $r = $query->execute(array('id'=>$id));
        if($r==true){
          header('Location: listaComputador.php?msg=202');
        }else{
          echo "Erro ao tentar excluir o registro";
        }




  }



   ?>
