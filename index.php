<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Biuro Podróży</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--Zainicjowanie jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--Skrypt wywołujący calculatePrice.php bez odświeżania strony-->
        <!--Echo z PHP wyświetlane jest w znaczniku o id #result-->
        <script>
        $(document).ready(function(){
            $("#osoby").keyup(function(){oblicz();});
            $("#dni").keyup(function(){oblicz();});
            $("#selectedDest").change(function(){oblicz();});


            function oblicz(){
                //debug
                //alert("cos jest wpisane");

                $.ajax({
                    url: 'calculatePrice.php',
                    type: 'post',
                    data: {osoby: $("#osoby").val(), selectedDest: $("#selectedDest").val(), dni: $("#dni").val()},
                    success: function(result){
                        $("#result").html(result);
                    }
                });
            } 
        });
        </script>
    </head>
    <body>
        <div id="contenner">

            <div id="banner">
                <img src="" alt="banner">
            </div>

            <div id="dest">
                <h2>Dostepne lokalizacje</h2>
                <?php include 'dest.php' ?>
                <br>
            </div>

            <div id="reservation">
                <h2>Rezerwacja<h2>
                <form action="" method="POST">
                    <label>Wybierz lokalizację:</label>
                    <?php include 'reservationList.php'; ?><br>
                    <label>Liczba osób:</label>
                    <input type="number" id="osoby" name="osoby"><br>
                    <label>Liczba dni:</label>
                    <input type="number" id="dni" name="dni"><br>
                    <label>Podaj e-mail:</label>
                    <input type="text" name="email"><br>
                    <button type="submit" name="reservation">Potwierdź</button>
                    <?php include 'reservationSend.php' ?>
                </form>
                <span id="result"></span>
            </div>

            <div id="register">
                <h2>Rejsetsracja</h2>
                <form action="" method="POST">
                    <label>Imię: </label>
                    <input type="text" id="name" name="name"><br>
                    <label>Nazwisko: </label>
                    <input type="text" id="surname" name="surname"><br>
                    <label>E-Mail: </label>
                    <input type="text" id="e-mail" name="email"><br>
                    <button type="submit" name="register">Potwierdź</button>
                    <input type="button" class="button" value="oblicz" onclick="oblicz();">
                </form>
                <?php include 'input.php' ?>
            </div>


            <footer>
                Mateusz Ignaczak, Maciej Kmiecik
            </footer>

        </div>
    </body>
</html>