<?php
$sql  = "SELECT * FROM $tabela ORDER BY nome;";
      $query = $con->query($sql);
      $lista_computador = $query->fetchAll();
 ?>
