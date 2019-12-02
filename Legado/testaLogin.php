<?php
session_start();
require_once('pdo.php');

if(isset($_POST['user']) && isset($_POST['senha'])){
    $user = $_POST['user'];
    $senha = md5($_POST['senha']);
    $sql  = "SELECT count(*) as qtd FROM usuarios WHERE user=:user AND senha=:senha";
    $query = $con->prepare($sql);
    $params = array('user'=>$user,'senha'=>$senha);
    $r = $query->execute($params);
    $result = $query->fetch();
    if($result['qtd']==1){
        $_SESSION['user'] = $user;
        $_SESSION['senha'] = $senha;

        header('Location: ./chamado/listaChamados.php');
    }else{
          $mensagem = "Usuário/Senha Incorretos";
          header('Location:./index.php');
    }
}


?>
