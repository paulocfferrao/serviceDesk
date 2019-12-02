<?php
// session_start();
// require_once('..\pdo.php');
$user = $_SESSION['user'];
$sql = "SELECT id FROM usuarios WHERE user=:user;";
$query = $con->prepare($sql);
$params = array('user'=>$user);
$r = $query->execute($params);
$idUser = $query->fetch();
?>
