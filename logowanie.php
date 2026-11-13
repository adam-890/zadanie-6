<?php

session_start();
include("polaczenie.php");

$login = $_POST['login'];
$haslo = $_POST['haslo'];

$sql = "SELECT * FROM uzytkownicy
        WHERE login='$login'
        AND haslo='$haslo'";

$wynik = mysqli_query($conn,$sql);

if(mysqli_num_rows($wynik) > 0)
{
    $_SESSION['login'] = $login;

    header("Location: index.php");
}
else
{
    echo "ZLE DANE LOGOWANIA";
    echo "<br><br>";
    echo "<a href='index.php'>POWROT</a>";
}

?>