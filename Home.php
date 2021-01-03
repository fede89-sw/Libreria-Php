<!DOCTYPE html>
<html>

<head>
<title>LIBRERIA</title>
<link rel="stylesheet" href="style.css">
<h1>BENVENUTO NELLA LIBRERIA</h1>
<h2>La Tua Libreria Online</h2>
<?php
session_start();
//$str="<input type='text'>";  HTMLSPECIALCHARS impedisce al browser di creare l'input box text ma stampa 
//echo htmlspecialchars($str);  solo il testo raw di $str,che appunto altrimento diverrebbe una textBox
echo("<h3>");
if (isset($_SESSION['session_id'])) {
    $session_user = htmlspecialchars($_SESSION['session_user']);
    $session_id = htmlspecialchars($_SESSION['session_id']);
    
    printf("Benvenuto\a %s", $session_user);
    echo "<br>";
    echo('<a href="logout.php">logout</a>');
    echo "<br>";
    echo("<form method='POST' action='Carrello.php'>");
    echo("<input type='submit' value='Visualizza Carrello' name='carrello'>");
    echo("</form>");

} else {
    printf("Effettua il %s per accedere all'area riservata", '<a href="http://localhost/libreria/LogIn.php?">login</a>');
}
echo("</h3>");
?>
</head>

<body>
<table height="100%" width="100%" cellspacing="10px">
    <tr><td align="middle">
        <form action="CercaLibro.php">
            <input type="submit" value="Cerca Libro" name="CercaLibro">
        </form>
        </td>
    </tr>   
    <tr><td align="middle">
        <form action="CercaAutore.php">
            <input type="submit" value="Cerca Autore" name="CercaAutore">
        </form>
        </td>
    </tr>
    <tr><td align="middle">
        <form action="InserisciLibro.php">
            <input type="submit" value="Inserisci Libro" name="InserisciLibro">
        </form>
        </td>
    </tr>
</table>

</body>

</html>
