  <?php
  session_start();
  require_once('..\pdo.php');
  require_once('..\getIdUser.php');
  // $user = $_SESSION['user'];
  // $acao = $_GET['acao'];
  // $sql = "SELECT id FROM usuarios WHERE user=:user;";
  // $query = $con->prepare($sql);
  // $params = array('user'=>$user);
  // $r = $query->execute($params);
  // $idUser = $query->fetch();
  $registro['titulo'] = $_POST['titulo'];
  $registro['descricao'] = $_POST['descricao'];
  $registro['id_categoria'] = $_POST['id_categoria'];
  $registro['id_computador'] = $_POST['id_computador'];
  $acao=$_GET['acao'];

   if ($acao=="novo") {
     // var_dump($_POST);

     $registro['status'] = "Novo";
     $registro['id_requerente'] = $idUser['id'];
//    var_dump($registro);

    $sql = "INSERT INTO chamados(titulo, descricao,idrequerente, idcategoria, idcomputador,status)
                         VALUES(:titulo, :descricao,:id_requerente, :id_categoria,:id_computador,:status);";
    $query = $con->prepare($sql);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaChamados.php?msg=200');

    }else {
      echo "<h1>ERRO</h1>";
    }

  }elseif ($acao=="editar") {
    $id = $_GET['id'];
    $sql = "UPDATE chamados
    SET titulo=:titulo,descricao=:descricao,idrequerente=:id_requerente,idcategoria=:id_categoria,
    idcomputador=:id_computador,STATUS=:STATUS,solucao=:solucao WHERE id=:id";
    $query = $con->prepare($sql);
    $registro = $_POST;
    if ($registro['solucao']!= "") {
      $registro['STATUS'] = "Fechado";

    }else {
      $registro['STATUS'] = "Novo";

    }
//    $registro['STATUS'] = "Fechado";
    $registro['id_requerente'] = $idUser['id'];
    $registro['id'] = $_GET['id'];
    var_dump($registro);
    $r   = $query->execute($registro);
    if($r==true) {
      header('Location:listaChamados.php?msg=201');

    }else {
      echo "<h1>ERRO</h1>";
    }

  }



   ?>
