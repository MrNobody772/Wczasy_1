<?php
//Ten skrypt liczy cenę mnożąc liczbę osób, dni oraz cenę z bazy dla wybranej lokacji
//Wyniki z php przekazywane są na bieżąco do skryptu w index.php, który wyświetla je w znaczniku o id #result

if(!empty($_POST['osoby']) && !empty($_POST['selectedDest']) && !empty($_POST['dni']))
{
    //debug
    //echo $_POST['osoby'] . $_POST['selectedDest'] . $_POST['dni'];

    $conn = mysqli_connect('localhost','administrator','1357','wczasy');
    //Do połączenia lokalnego
    //$conn = mysqli_connect('localhost','root','','wczasy');
    $q = mysqli_query($conn,'SELECT * FROM destinations WHERE name = "'.$_POST['selectedDest'].'"');

    $a = mysqli_fetch_array($q);

    //debug
    //echo $a['price'];

    $finalPrice = $a['price'] * $_POST['osoby'] * $_POST['dni'];

    echo "Koszt rezerwacji: ". $finalPrice . "zł";
}
?>