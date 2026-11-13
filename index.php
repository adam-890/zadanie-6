<?php

session_start();
include("polaczenie.php");

if(!isset($_SESSION['login']))
{
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Logowanie</title>
</head>
<body>

<h2>LOGOWANIE</h2>

<form action="logowanie.php" method="post">

<input type="text" name="login" placeholder="LOGIN">

<br><br>

<input type="password" name="haslo" placeholder="HASLO">

<br><br>

<input type="submit" value="ZALOGUJ">

</form>

</body>
</html>

<?php
exit();
}

$wybranaKlasa = "";

if(isset($_POST['klasa']))
{
    $wybranaKlasa = $_POST['klasa'];
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dziennik szkolny</title>

<style>

body{
    background:#2b1d17;
    color:white;
    font-family:Arial;
    padding:20px;
}

table{
    border-collapse:collapse;
}

th,td{
    border:1px solid white;
    padding:5px;
}

</style>

</head>
<body>

<a href="wyloguj.php">
<button>WYLOGUJ</button>
</a>

<br><br>

<form method="post">

<select name="klasa">

<option value="">Wybierz klase</option>

<?php

$klasy = mysqli_query($conn,"SELECT * FROM klasy");

while($k = mysqli_fetch_assoc($klasy))
{
    echo "<option value='".$k['id']."'>";
    echo $k['nazwa']." - ".$k['wychowawca'];
    echo "</option>";
}

?>

</select>

<input type="submit" value="POKAZ">

</form>

<?php

if($wybranaKlasa != "")
{
    $klasa = mysqli_query($conn,
    "SELECT * FROM klasy WHERE id=$wybranaKlasa");

    $daneKlasy = mysqli_fetch_assoc($klasa);

    echo "<h2>";
    echo "Klasa ";
    echo $daneKlasy['nazwa'];
    echo " - ";
    echo $daneKlasy['wychowawca'];
    echo "</h2>";

    echo "<table>";

    echo "<tr>";
    echo "<th>Imie</th>";
    echo "<th>Nazwisko</th>";
    echo "<th>Srednia ocen</th>";
    echo "</tr>";

    $uczniowie = mysqli_query($conn,
    "SELECT * FROM uczniowie
    WHERE klasa_id=$wybranaKlasa");

    while($u = mysqli_fetch_assoc($uczniowie))
    {
        echo "<tr>";

        echo "<td>".$u['imie']."</td>";
        echo "<td>".$u['nazwisko']."</td>";
        echo "<td>".$u['srednia']."</td>";

        echo "</tr>";
    }

    echo "</table>";

    $srednia = mysqli_query($conn,
    "SELECT AVG(srednia) AS sr
    FROM uczniowie
    WHERE klasa_id=$wybranaKlasa");

    $wynik = mysqli_fetch_assoc($srednia);

    echo "<br>";
    echo "Srednia klasy: ";
    echo round($wynik['sr'],2);
}

?>

<hr>

<h2>DODAWANIE NOWEGO UCZNIA</h2>

<form action="dodaj.php" method="post">

<input type="text" name="imie" placeholder="imie">

<br>

<input type="text" name="nazwisko" placeholder="nazwisko">

<br>

<input type="number" step="0.1" name="srednia" placeholder="srednia">

<br>

<select name="klasa_id">

<?php

$klasy = mysqli_query($conn,"SELECT * FROM klasy");

while($k = mysqli_fetch_assoc($klasy))
{
    echo "<option value='".$k['id']."'>";
    echo $k['nazwa'];
    echo "</option>";
}

?>

</select>

<br><br>

<input type="submit" value="ZAPISZ">

</form>

</body>
</html>