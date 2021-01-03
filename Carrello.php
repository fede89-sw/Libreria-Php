<?php
session_start();

if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user']);
    $session_id = htmlspecialchars($_SESSION['session_id']);
    
    printf("Benvenuto\a %s", $session_user);
    echo "<br>";
    echo('<a href="logout.php">logout</a>');
    echo "<br>";
    echo('<a href="home.php">Home</a>');
    echo("<br>");

    if(isset($_POST['carrello']) && $_POST['carrello']!= ""){
        $conn=mysqli_connect("localhost","root","root","libreria_scuola");
        if(mysqli_connect_errno($conn)){
            echo("Errore nella connessione al DataBase".mysqli_connect_error());
            }
            else{
                $titolo=$_POST['titolo'];
                $query="SELECT idlibro FROM libro WHERE titolo='$titolo'";
                $risultato=mysqli_query($conn,$query);
                $riga=mysqli_fetch_assoc($risultato);
                $id_libro=$riga['idlibro'];
                $query2="SELECT idutente FROM utente WHERE username='$session_user'";
                $risultato2=mysqli_query($conn,$query2);
                $riga=mysqli_fetch_assoc($risultato2);
                $id_utente=$riga['idutente'];
                if(isset($_POST['check1'])){
                    $inserisci="INSERT INTO carrello (idutente,idlibro) VALUES ('$id_utente','$id_libro')";
                    if(mysqli_query($conn,$inserisci)){
                        echo "Libro aggiunto al carrello!";
                        echo "<br>";
                    }else{echo "Error: " . $inserisci . "" . mysqli_error($conn);}
                }
            $query_carrello="SELECT DISTINCT idlibro FROM carrello WHERE idutente='$id_utente'";
            $carrello=mysqli_query($conn,$query_carrello);
            while($row=mysqli_fetch_assoc($carrello))
            {  
                echo("<tr>");
                echo("<td widht='50%' align='right'>");
                echo("ID Libro: ".$row["idlibro"]);
                echo("<br>");
                echo("</tr>");
            }
        }   
    }
} else {
    printf("Effettua il %s per accedere all'area riservata", '<a href="http://localhost/libreria/LogIn.php">login</a>');
}

?>