<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db_saw, "delete from saw_users where id_user='$id'");

header("location:./user-kelola.php");
