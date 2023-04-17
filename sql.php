<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Formularz</title>
    <link rel="stylesheet" href="mystyle.css" type="text/css"/>
</head>


<body>
        <?php
            $servername = "karolsow-server";
            $username = "sgnvozwkyq";
            $password = "2MW0U33CQ863225I$";
            $dbname = "karolsow-database";


            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
            }
            
            if(isset($_POST['dodaj']))
            {
                $imie = $_POST["imie"];
                $nazwisko = $_POST["nazwisko"];
                $wiek = $_POST["wiek"];

                if(!(empty($imie) || empty($nazwisko) || empty($wiek)))
                {

                    $sql = "INSERT INTO dane (imie, nazwisko, wiek) VALUES ('$imie', '$nazwisko', '$wiek')";
                    if ($conn->query($sql) === TRUE) {
                    echo "Użytkownik został dodany.";
                    }  
                    else {
                    echo "Błąd: " . $sql . "<br>" . $conn->error;
                    }
                }
                else
                {
                    echo "Nie wypełniono danych";
                }
            }
            if(isset($_POST['usun']))
            {
                $id = $_POST["id"];
                $sql = "SELECT id FROM dane WHERE id='$id'";
                $result = mysqli_query($conn, $sql);

                // Sprawdzenie czy użytkownik istnieje
                if (mysqli_num_rows($result) > 0) {
                    $sql = "DELETE FROM dane WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                    echo "Użytkownik został usunięty.";
                    } else {
                    echo "Błąd: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Użytkownik o ID $id nie istnieje w bazie danych";
                }
            }
            if(isset($_POST['edytuj']))
            {
                $id = $_POST["edit_id"];
                $imie = $_POST["edit_imie"];
                $nazwisko = $_POST["edit_nazwisko"];
                $wiek = $_POST["edit_wiek"];
                $sql = "SELECT id FROM dane WHERE id='$id'";
                $result = mysqli_query($conn, $sql);

                if(!(empty($imie) || empty($nazwisko) || empty($id) || empty($wiek)))
                {
                    
        

                    // Sprawdzenie czy użytkownik istnieje
                    if (mysqli_num_rows($result) > 0) {
                        $sql = "UPDATE dane SET imie='$imie',nazwisko='$nazwisko',wiek='$wiek' WHERE id='$id'";
                        if ($conn->query($sql) === TRUE) {
                        echo "Użytkownik został edytowany.";
                        } else {
                        echo "Błąd: " . $sql . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Użytkownik o ID $id nie istnieje w bazie danych";
                    }
                }
                else
                {
                    echo "Nie wypełniono danych";
                }
            }
            $sql = "SELECT * FROM dane";
            $result = mysqli_query($conn, $sql);

            // Wyświetlenie użytkowników w formie tabeli HTML
            echo '<div id="wyswietlanie">';
            echo "<table>";
            echo "<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["imie"] . "</td><td>" . $row["nazwisko"] . "</td><td>" . $row["wiek"] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";


            $conn->close();
        ?>

	<div id="dodawanie">
        Dodaj użytkownika:<br /><br />
        
        <form method="post">
            Imię: <input type="text" name="imie"><br>
            Nazwisko: <input type="text" name="nazwisko"><br>
            Wiek: <input type="text" name="wiek"><br>
            <input type="submit" value="Dodaj" name="dodaj">
        </form>
    </div>
    <div id="usuwanie">
        Usuń użytkownika:<br /><br />
        
        <form method="post">
            Id: <input type="number" name="id"><br>
            <input type="submit" value="Usuń" name="usun">
        </form>
    </div>
    <div id="edytowanie">
        Edytuj użytkownika:<br /><br />
        
        <form method="post">
            Id: <input type="number" name="edit_id"><br>            
            Imię: <input type="text" name="edit_imie"><br>
            Nazwisko: <input type="text" name="edit_nazwisko"><br>
            Wiek: <input type="text" name="edit_wiek"><br>
            <input type="submit" value="Edytuj" name="edytuj">
        </form>
    </div>


</body>
</html>