
<?php
   session_start(); 
   include('/xampp/htdocs/config/dbaccess.php'); 
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $password = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT usersUID, usersPwd, usersRole, usersActive FROM users WHERE usersUID = '$username';";
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result)>0)
      {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["usersPwd"]))
        {
            if($row['usersActive']==1)
            {
                $_SESSION['role'] = $row['usersRole'];
                $_SESSION['users'] = $username;  
                header("location: ../index.php");
            }
            else
            {
                header("location = ../pages/login.php?error=userNotActive");
            }
         
          
        
          
        }

      }
      else
      {
        echo("You don't exits! Holy Sh!t!");
      }
   }

  