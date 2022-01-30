<?php
    if(isset($_POST['reservation']))
    {
        //Ten skrypt sprawdza poprawność danych i dodaje je do tabeli "reservations"
        //Powinien być wywoływany przez przycisk w formularzu rejestracji

        //NIE UŻYWAĆ exit; DO ZAKOŃCZENIA SKRYPTU (PRZERYWA DALSZE ŁADOWANIE STRONY):
        //https://stackoverflow.com/questions/7218467/php-not-loading-rest-of-page-after-exit

        $reservationPossible = true;

        $osoby = $_POST['osoby'];
        $dni = $_POST['dni'];
        $selectedDest = $_POST['selectedDest'];
        $email = $_POST['email'];

        //Weryfikuje poprawność danych
        if(empty($osoby) || empty($dni) || empty($selectedDest) || empty($email)) {echo "Jedno z pól jest puste"; $reservationPossible = false;}
        if($osoby < 1){$reservationPossible = false;}
        if($dni < 1){$reservationPossible = false;}

        $conn = mysqli_connect('localhost','administrator','1357','wczasy');
        //Do połączenia lokalnego
        //$conn = mysqli_connect('localhost','root','','wczasy');

        //Sprawdza duplikaty maila
        $checkresult = mysqli_query($conn,'SELECT * FROM customers WHERE email="'.$email.'"');
        if(mysqli_num_rows($checkresult) < 1)
        {
            echo "<p>Mail o podanej nazwie nie istnieje!</p>";
            $reservationPossible = false;
        }
        
        if($reservationPossible)
        {
            //Pobiera cene dla danej lokalizacji
            $q = mysqli_query($conn,'SELECT * FROM destinations WHERE name = "'.$selectedDest.'"');
            $a = mysqli_fetch_array($q);
            //Oblicza ostateczną cenę
            $finalPrice = $a['price'] * $osoby * $dni;

            //Dodaje rezerwację do bazy
            $q = mysqli_query($conn,'INSERT INTO reservations (destination,people,days,email,price) VALUES ("'.$selectedDest.'","'.$osoby.'","'.$dni.'","'.$email.'","'.$finalPrice.'")');

            //debug
            //echo $email; 

            echo "<p>Poprawnie zarezerwowano wyjazd</p>";
        }
    }
?>