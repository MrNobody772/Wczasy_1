<?php
    //Ten skrypt wyświetla listę lokalizacji do wyboru podczas rezerwacji
    //Powinien być w formularzu rezerwacji

    $conn = mysqli_connect('localhost','administrator','1357','wczasy');
    //Do połączenia lokalnego
    //$conn = mysqli_connect('localhost','root','','wczasy');
    $q = mysqli_query($conn,'SELECT * FROM destinations');

    echo "<select name='selectedDest', id='selectedDest'>";
    for($i=0; $i<mysqli_num_rows($q); $i++)
    {
        $a = mysqli_fetch_array($q);
        echo "<option value='".$a['name']."'>".$a['name']."</option>";
    }
    echo "</select>";
?>