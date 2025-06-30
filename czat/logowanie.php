<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
                function myFunction() {
                var x = document.getElementById("haslo");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
} 
    </script>
</head>
<body>  
    <form method="post">
    <div><label for="login">login: </label><br><input type="text"name="login" id="login"></div>
    <div><label for="haslo">haslo: </label><br><input type="password" name="haslo" id="haslo"><input type="checkbox" id="czekboks" onclick="myFunction()"></div>

        <br><input type="submit" value="zaloguj">
    </form>
</body>
</html>
<?php
session_start();
    $login = $_POST['login'];
    $haslo =  sha1($_POST['haslo']);
   
echo("$login $_POST[haslo]");

 if(!empty($login) && !empty($_POST['haslo'])){
            $connect = mysqli_connect("localhost", "root", "", "czat2d2"); 
            $sql = "SELECT * from `uzytkownicy` where `login` = '$_POST[login]' AND `haslo` = '$haslo'";  
            echo $sql;
            $result = mysqli_query($connect, $sql);  
            $row = mysqli_fetch_array($result );
            $_SESSION['login']= $row['login'];
            $result = mysqli_query($connect, $sql);  
            $row = mysqli_fetch_array($result);  
            if(!empty($row['login'])){
                $_SESSION['login']= $row['login'];
                echo "ZALOGOWANO";

            }  else{
                echo "nieprawidłowy login lub hasło.";
            }
        }
         else{
    echo "wszystkie pola musza zostac wypelnione";
 }

 ?>