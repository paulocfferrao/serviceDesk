<?php
$sql  = "SELECT * FROM $tabela ORDER BY user;";
      $query = $con->query($sql);
      $lista_usuario = $query->fetchAll();
 ?>
