<!DOCTYPE html>
<html>

<head>
<title>CERCA LIBRO</title>
<link rel="stylesheet" href="style.css">
<h1>RICERCA LIBRO</h1>
<h2>Inserisci il libro da cercare</h2>
<h3><?php echo(date('d/m/y'));echo("<br>");echo(date('H:i'));?></h3>
</head>

<body>
<table height="100%" width="100%" cellspacing="10px">
    <tr>
        <th align="middle">
            <form method="POST" action="CercaLibro.php">
                <input type="text" name="libro">
                <input type="submit" value="Cerca" name="SubmitButton">
            </form>
        </th>
    </tr>   
</table>
<table height="100%" width="100%" cellspacing="10px">
        <tr>
        <th width="50%" align="right">
            <?php
            if(isset($_POST["SubmitButton"]) && $_POST["SubmitButton"]!=""){ 
                $cerca=$_POST["libro"];
                $conn=mysqli_connect("localhost","root","root","libreria_scuola");
                if(!$conn){
                    echo("Connessione al DataBase fallita!");
                }
                $query="SELECT * FROM libro WHERE titolo='$cerca'";
                $risultato=mysqli_query($conn,$query);
                if(mysqli_num_rows($risultato)>0){
                $riga=mysqli_fetch_assoc($risultato);
                echo("<form method='POST' action='Carrello.php'>");
                echo("<label>Titolo:</label> <input type='text' name='titolo' value='".$riga['titolo']."' readonly style='border: none'>");
                echo("<br>");
                echo("<label>Prezzo:</label> <input type='text' name='prezzo' value='".$riga['prezzo']."' readonly style='border: none'>");
                echo("<br>");
                echo("<label>Anno:</label> <input type='text' name='anno' value='".$riga['anno']."' readonly style='border: none'>");
                echo("<br>");
                echo("<label>Editore:</label> <input type='text' name='editore' value='".$riga['editore']."' readonly style='border: none'>");
                echo("<br>");
                echo("<label>Reparto:</label> <input type='text' name='reparto' value='".$riga['reparto']."' readonly style='border: none'>");
                echo("<br>");
                echo("<label>Autore:</label> <input type='text' name='autore' value='".$riga['autore']."' readonly style='border: none'>");
                echo("<br>");
                echo("</th>");
                echo("<th width='50%' align='left'>");
                echo("<input type='checkbox' id='check1' name='check1' unchecked><label for='check1'>Aggiungi al Carrello</label>");
                echo("</th>");
                echo("</tr>");
                echo("<tr>");
                echo("<td colspan='2' align='center'>");
                echo("<input type='submit' value='Carrello' name='carrello'>");
                echo("</form>");
                echo("</td>");
                echo("</tr>");
                }
                else{echo("Libro non trovato!");}
                }

            ?>
        </td>

    </tr>   
</table>

</body>
