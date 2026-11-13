<?php

session_start();

if(!isset($_SESSION['login']))
{
    header("Location: index.php");
    exit();
}

include("polaczenie.php");

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$srednia = $_POST['srednia'];
$klasa_id = $_POST['klasa_id'];

mysqli_query($conn,
"INSERT INTO uczniowie(imie,nazwisko,srednia,klasa_id)
VALUES('$imie','$nazwisko','$srednia','$klasa_id')");

header("Location: index.php");

?>