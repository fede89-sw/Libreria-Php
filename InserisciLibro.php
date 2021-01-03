<!DOCTYPE html>
<html>

<head>
<title>Inserisci Libro</title>
<link rel="stylesheet" href=".\\style.css">
<h1>INSERISCI LIBRO</h1>
<h2>Inserisci i dati del libro</h2>
</head>

<body>
<script src=".\\script.js"></script>
<table width="100%" cellspacing="10px">

<form method="POST" action="InserisciLibro.php">
<tr align="center">
<td>
<input type="text" name="titolo" placeholder="Titolo" required>
</td>
        </tr>    
        <tr align="center">
            <td>
            <input type="text" name="prezzo" placeholder="Prezzo" required>
</td>
        </tr>    
        <tr align="center">
            <td>
            <input type="text" name="anno" placeholder="Anno">
</td>
        </tr>    
        <tr align="center">
            <td>
            <input type="text" name="editore" placeholder="Editore">
</td>
        </tr>   
        <tr align="center">
            <td>
            <input type="text" name="reparto" placeholder="Reparto">
</td>
        </tr>   
        <tr align="center">
            <td colspan="2">
            <select name="autore" value="autori"> 
                <?php   // COMBOBOX DEGLI AUTORI    
                $conn=mysqli_connect("localhost","root","root","libreria_scuola");
                if(!$conn){
                    echo("Errore nella connessione al DataBase");
                }
                $query="SELECT * FROM autore";
                $risultato=mysqli_query($conn,$query);
                $riga=mysqli_fetch_assoc($risultato);
                while($riga=mysqli_fetch_assoc($risultato)){
                    echo("<option name='autore' value='".$riga["nome"]."'>").$riga['nome'];echo("</option>");
                } 
                ?>
            </select>
</td>
        </tr>   
        <tr>
        <td width="20%" align="center"><input type="submit" value="Salva" name="SubmitButton"></td>
        </tr>  </form>
        <tr align="center">
        <td>
        <input type="button" name="AutoreButton" value="Inserisci Autore" onclick="show()">
        </td>
        </tr>
        <form method="POST" action="InserisciLibro.php">
        <tr align="center">
        <td>
        <input type='text' name="nome_autore" placeholder="Nome Autore" required>
        </td>
        </tr>
        <tr align="center">
        <td>
        <input type="text" name="data_autore" placeholder="Data di Nascita">
        </td>
        </tr>
        <tr align="center">
        <td>
        <input type="submit" name="SalvaAutoreButton" value="Salva Autore">
            </form>
        </td>
        </tr>
    </table>
    <?php
        $conn=mysqli_connect("localhost","root","root","libreria_scuola"); // Database connection establishment
        if(mysqli_connect_errno($conn)){        // Check connection
            echo "Errore di connessione al DataBase: " . mysqli_connect_error();
        }
          //CHECKING SUBMIT BUTTON PRESS or NOT.
        if(isset($_POST["SubmitButton"]) && $_POST["SubmitButton"]!=""){ 
            $titolo=$_POST['titolo'];
            $prezzo=$_POST['prezzo'];
            $anno=$_POST['anno'];
            $editore=$_POST['editore'];
            $data_inserimento=date('d/m/y');
            $reparto=$_POST['reparto'];  
            $autore=$_POST['autore'];
            //INSERT QUERY
            $libro="INSERT INTO libro (titolo,prezzo,anno,editore,data_archiviazione,reparto,autore) VALUES ('$titolo','$prezzo','$anno','$editore','$data_inserimento','$reparto','$autore')";
            if(mysqli_query($conn,$libro)){
            echo "Libro salvato con successo";
            }else{echo "Error: " . $libro . "" . mysqli_error($conn);}
           }
            if(isset($_POST["SalvaAutoreButton"]) && $_POST["SalvaAutoreButton"] != ""){
            $nomeautore=$_POST['nome_autore'];
            $dataautore=$_POST['data_autore'];
            $Qautore="INSERT INTO autore VALUES ('$nomeautore','$dataautore')";
            if(mysqli_query($conn,$Qautore)){
                echo "Autore salvato con successo";
                header("Refresh:0"); //ricarica pagina. Se vuoi andare in altra pag: header("Refresh:0; url=page2.php");
            }else{echo "Error: " . $Qautore . "" . mysqli_error($conn);}
            }
        ?>
</body>
</html>