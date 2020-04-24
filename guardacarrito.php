<?php
if (!isset($_SESSION)) session_start();
$cnx = mysqli_connect ("localhost", "root", "", "fleur");

$sql="INSERT INTO ventas (fecha,hora,total) VALUES ('" . date('Y-m-d') . "','" . date('H:m') . "','" . $_SESSION['total'] . "')";
mysqli_query($cnx,$sql);
$folio = mysqli_insert_id($cnx);
foreach ($_SESSION['carrito'] as $k => $value) {
  $valores=explode('|',$value);
  $sql="INSERT INTO desglose VALUES ('" . $folio . "','" . $k . "','" . $valores[1] . "','" . $valores[2] . "','" . $valores[3] . "')";
  mysqli_query($cnx,$sql);
$sql="UPDATE productos SET existencia=existencia-" . $valores[1];
mysqli_query($cnx,$sql);
}
unset($_SESSION['carrito']);
unset($_SESSION['total']);
header('Location: index.php');
?>
