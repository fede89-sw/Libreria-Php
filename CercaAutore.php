<!DOCTYPE html>
<html>

<head>
<title>CERCA AUTORE</title>
<link rel="stylesheet" href="style.css">
<h1>RICERCA AUTORE</h1>
<h2>Inserisci l'autore da cercare</h2>
</head>

<body>
<table height="100%" width="100%" cellspacing="10px">
    <tr>
        <th colspan="2" align="middle">
            <form method="POST" action="CercaAutore.php">
                <input type="text" name="autore">
                <input type="submit" value="Cerca" name="SubmitButton">
            </form>
        </th>
    </tr>   
        
        <?php
        if(isset($_POST["SubmitButton"]) && $_POST["SubmitButton"]!=""){ 
            $cerca=$_POST["autore"];
            $conn=mysqli_connect("localhost","root","root","libreria_scuola");
            if(!$conn){
                echo("Connessione al DataBase fallita!");
            }
            $query="SELECT * FROM autore INNER JOIN libro ON libro.autore=autore.nome WHERE nome='$cerca'";
            $risultato=mysqli_query($conn,$query);
            echo("<form method='POST' action='Carrello.php'>");
            while($riga=mysqli_fetch_assoc($risultato))
            {  
                echo("<tr>");
                echo("<td widht='50%' align='right'>");
                echo("<label>Titolo:</label><input type='text' name='titolo' value='".$riga['titolo']."' readonly style='border: none'> ");
                echo("<br>");
                echo("<label>Prezzo:</label><input type='text' value='".$riga['prezzo']."' readonly style='border: none'> ");
                echo("<br>");
                echo("<label>Anno:</label><input type='text' value='".$riga['anno']."' readonly style='border: none'> ");
                echo("<br>");
                echo("<label>Editore:</label><input type='text' value='".$riga['editore']."' readonly style='border: none'> ");
                echo("<br>");
                echo("<label>Reparto:</label><input type='text' value='".$riga['reparto']."' readonly style='border: none'> ");
                echo("<br>");
                echo("<label>Autore:</label><input type='text' value='".$riga['nome']."' readonly style='border: none'> ");
                echo("<br>");
                echo("<br>");
                echo("</td>");
                echo("<td width='50%' align='left'>");
                echo("<input type='checkbox' name='check1' id='".$riga['titolo'].$riga['autore']."' unchecked><label for='check1'>Aggiungi al Carrello</label>");
                echo("</td>");
                echo("</tr>");
       }
       echo("</table>");
       if(isset($_POST["SubmitButton"]) && $_POST["SubmitButton"]!=""){ 
       echo("<table width='100%'>");
       echo("<tr>");
       echo("<th align='center' valign='top'>");
       echo("<input type='submit' value='Carrello' name='carrello'>");
       echo("</form>");
       echo("</th>");
       echo("</tr>");
       echo("</table>");
       }
   }
        ?>  
</body>