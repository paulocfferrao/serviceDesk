<?php

require 'getIdUser.php';
$id=$idUser['id'];
$tipo = buscaValor($id,"usuarios","tipo",$con);

if(!isset($todos)){
  $where="STATUS!='Fechado'";
}else {
  $where="1";
}

if ("admin"==$tipo || $tipo=="tecnico") {
  $sql  = "SELECT * FROM $tabela WHERE $where ORDER BY id DESC;";
        $query = $con->query($sql);
        $lista = $query->fetchAll();
}else {

  $sql  = "SELECT * FROM $tabela WHERE $where AND idrequerente = $id ORDER BY id DESC;";
        $query = $con->query($sql);
        $lista = $query->fetchAll();
}


 ?>
