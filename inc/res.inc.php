<?php

$vorname = $nachname = $username = $email = $username = $password = $rolle = "";

function test_input($data)
{
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    
    return $data;
}

 if(isset($_POST['submit']))
 {
     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
        $vorname = test_input($_POST["vorname"]);
        $nachname = ($_POST["nachname"]); 
        $email = ($_POST["mail"]);
        $username = ($_POST["username"]); 
        $password = ($_POST["passwort"]);
        $rolle = ($_POST["rolle"]);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        include('/xampp/htdocs/config/dbaccess.php'); 

        $stmt = $con->prepare("INSERT INTO users(usersVorname, usersNachname, usersEmail, usersUID, usersPwd, usersRole) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$vorname,$nachname,$email,$username,$hashed_password,$rolle);
        mysqli_stmt_execute($stmt); 
        header("location: ../index.php");
        
     }
 }            
    
    
    
