<?php
$sql  = "SELECT * FROM $tabela ORDER BY descricao;";
      $query = $con->query($sql);
      $lista_categoria = $query->fetchAll();


 ?>
