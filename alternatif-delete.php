<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db_saw, "delete from saw_alternatives where id_alternative='$id'");
header("location:./alternatif.php");
