  <?php
  session_start();
  require_once('..\pdo.php');
  $acao=$_GET['acao'];
  if (isset($_POST)) {
    $registro=$_POST;
    $registro['senha'] = md5($_POST['senha']);
  }

   if ($acao=="novo") {
     if (isset($_GET['index'])) {
       $registro['tipo']="requerente";
     }
    $sql = "INSERT INTO usuarios(user,senha,tipo)VALUES(:user,:senha,:tipo);";
    $query = $con->prepare($sql);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaUsuario.php?msg=200');

    }else {
      echo "<h1>ERRO  $r</h1> ";
    }

  }elseif ($acao=="editar") {
    $registro['id']= $_GET['id'];
    $sql = "UPDATE usuarios SET user=:user,senha=:senha,tipo=:tipo WHERE id=:id";
    $query = $con->prepare($sql);
    var_dump($registro);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaUsuario.php?msg=201');

    }else {
      echo "<h1>ERRO</h1>";
    }

  }elseif ($acao=="excluir") {
        $id = $_GET['id'];

        $sql   = "SELECT COUNT(*) as qtd FROM chamados WHERE idusuario=:id";
        $query = $con->prepare($sql);
        $r     = $query->execute(array('id'=>$id));
        $qtd   = $query->fetch();
        if($qtd >= 1) {
          header('Location: listaUsuario.php?msg=400');
        }

        $sql = "DELETE FROM usuarios WHERE id=:id";
        $query = $con->prepare($sql);
        $r = $query->execute(array('id'=>$id));
        if($r==true){
          header('Location: listaUsuario.php?msg=202');
        }else{
          echo "Erro ao tentar excluir o registro";
        }
  }
   ?>
