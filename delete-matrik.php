<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db_saw, "delete from saw_evaluations where id_alternative='$id'");

header("location:./matrik.php");
