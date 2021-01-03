<?php session_start(); //inizia sessione ?>

<html>
    <head>
        <link rel="stylesheet" href=".\\style.css">
    </head>

    <body>
        <table style='width: 100%; height:100%;'>
            <tr>
                <td style='text-align:center; vertical-align:bottom;'>   
                    <form method='POST' action='LogIn.php' height="100%">
                    <input type='text' name='username' placeholder="username" style='border: 2px solid' required>           
                </td>
            </tr>    
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='password' name='password' placeholder="password" style='border: 2px solid' required>
                </td>
            </tr>
            <tr>
                <td style='text-align:center; vertical-align:top;'>
                    <input type="submit" id="login" value="Log In" name="login">
                    </form>
                </td>
            </tr>   
            <tr>
                <td style='text-align:center; vertical-align:top;'>
                    <p>Non sei Registrato?</a>
                    <br>
                    <a href="registra.php">Registrati</a>
                    </form>
                </td>
            </tr>   
        </table>

<?php
 
$conn=mysqli_connect("localhost","root","root","libreria_scuola"); //connessione al DB
if(!$conn){
    echo("Connessione al DataBase fallita!");
}
if (isset($_SESSION['session_id'])) {       //se c'è un login attivo rimango in home.php
    header('Location: http://localhost/libreria/Home.php');
    exit;
}
if (isset($_POST['login'])) {   //se premo login (ha campi di compilazione obbligatoria tramite REQUIRED)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "  SELECT username, pwd    #query per cercare l'utente nel DB
                FROM utente
                WHERE username = '$username' AND pwd = '$password'";
    $risultato=mysqli_query($conn,$query);
    $user=mysqli_fetch_assoc($risultato);
    if (!$user) {  //se la query non ha avuto risultato o la password è diversa
        $msg = 'Credenziali utente errate %s';  // da quella del DB
        printf($msg, '<a href="http://localhost/libreria/Home.php">torna indietro</a>');
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];

            header('Location: http://localhost/libreria/Home.php');
            exit;
        }
    }
 ?>
    </body>
 </html>