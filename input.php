<?php
    //Ten skrypt jest odpowiedzialny za dodawanie użytkowników do bazy danych
    //Rejestracja odbywa się przez formularz znajdujący się w index.php w bloku z rejestracją

    //NIE UŻYWAĆ exit; DO ZAKOŃCZENIA SKRYPTU (PRZERYWA DALSZE ŁADOWANIE STRONY):
    //https://stackoverflow.com/questions/7218467/php-not-loading-rest-of-page-after-exit

    if(isset($_POST['register']))
    {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        if(empty($name) || empty($surname) || empty($email)) {echo "Jedno z pól jest puste";}
        
        $conn = mysqli_connect('localhost','administrator','1357','wczasy');
        //Do połączenia lokalnego
        //$conn = mysqli_connect('localhost','root','','wczasy');

        //Sprawdza duplikaty maila
        $checkresult = mysqli_query($conn,'SELECT * FROM customers WHERE email="'.$email.'"');
        if(mysqli_num_rows($checkresult) > 0)
        {
            echo "<p>Mail o podanej nazwie już istnieje!</p>";
        }
        else
        {
            $q = mysqli_query($conn,'INSERT INTO customers (name,surname,email) VALUES ("'.$name.'","'.$surname.'","'.$email.'")');

            echo $name; 
        
            echo "<p>Poprawnie dodano użytkownika do bazy</p>";
        }
    }

?>