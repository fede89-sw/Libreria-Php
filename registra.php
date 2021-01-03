<?php session_start(); //inizia sessione ?>

<html>
    <head>
        <link rel="stylesheet" href=".\\style.css">
    </head>

    <body>
        <table style='width: 100%; height:100%;'>
            <tr>
                <td style='text-align: center; vertical-align: bottom;'>   
                    <form method='POST' action='registra.php' height="100%">
                    <input type='text' name='username' placeholder="username" style='border: 2px solid' required>           
                </td>
            </tr>    
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='password' name='password' placeholder="password" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='nome' placeholder="Nome" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='cognome' placeholder="Cognome" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='email' name='email' placeholder="EMail" style='border: 2px solid' autocompile='on' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='indirizzo' placeholder="Indirizzo" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='citta' placeholder="Città" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='nazione' placeholder="Nazione" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='telefono' placeholder="Telefono" style='border: 2px solid' required>
                </td>
            </tr>
            <tr  style='height:5%;'>
                <td style='text-align: center; vertical-align: top;'>
                <input type='text' name='cap' placeholder="CAP" style='border: 2px solid' required>
                </td>
            </tr>
            <tr>
                <td style='text-align:center; vertical-align:top;'>
                    <input type="submit" id="login" value="Registrati" name="registrati">
                    </form>
                </td>
            </tr>   
        </table>

<?php
 
$conn=mysqli_connect("localhost","root","root","libreria_scuola"); //connessione al DB
if(!$conn){
    echo("Connessione al DataBase fallita!");
}
if (isset($_POST['registrati']) && ($_POST['registrati']) != "") {   //se premo login (ha campi di compilazione obbligatoria tramite REQUIRED)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nome=$_POST['nome'];
    $cognome=$_POST['cognome'];
    $indirizzo=$_POST['indirizzo'];
    $citta=$_POST['citta'];
    $cap=$_POST['cap'];
    $nazione=$_POST['nazione'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $query = " INSERT INTO utente(nome,cognome,username,indirizzo,citta,cap,nazione,telefono,email,pwd) 
            VALUES('$nome','$cognome','$username','$indirizzo','$citta','$cap','$nazione','$telefono','$email','$password')";
    if(mysqli_query($conn,$query)){
        session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $username;
            header('Location: http://localhost/Libreria/Home.php');
            exit;
        } else {echo "Error: " . $query . "" . mysqli_error($conn); }
    }
 ?>
    </body>
 </html>