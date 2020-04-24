<?php
$cnx = mysqli_connect ("localhost", "root", "", "fleur");
$sql = "INSERT INTO productos (clave, nombre,precio,categoria,img) VALUES  ('" . $_POST['clave'] . "','" . $_POST['nombre'] . "','" . $_POST['precio'] . "','" . $_POST['nombrecategoria'] . "','" . $_POST['img'] . "')";
$rs = mysqli_query($cnx,$sql);
header('Location:index.php');
?>
