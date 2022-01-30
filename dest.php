<?php
    //Ten skrypt pobiera dostępne lokalizacje z bazy danych i wyświetla je w tabeli
    //Powinien znajdować się w bloku z lokalizacjami

    $conn = mysqli_connect('localhost','administrator','1357','wczasy');
    //Do połączenia lokalnego
    //$conn = mysqli_connect('localhost','root','','wczasy');
    $q = mysqli_query($conn,'SELECT * FROM destinations');

    echo "<table>";
    echo "<tr><td>nazwa lokacji</td><td>cena</td></tr>";
    for($i=0; $i<mysqli_num_rows($q); $i++)
    {
        $a = mysqli_fetch_array($q);
        echo "<tr>
                <td>".$a['name']."</td>
                <td>".$a['price']."</td>
            </tr>";
    }
    echo "</table>";
?>