<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post">

<div><label for="text">login</label><br><input type="text"name="login" id="login"></div><br>

 <div><textarea name="wiadomosc" id="wiadomosc" cols="30" rows="10" class="input" placeholder=""></textarea>
 <label class="placeholder">Wiadomość</label></div>

 <section class="guziki">
 <div><label for="reset"></label><input type="reset" value='Wyczyść'></div> 
 <div><label for="submit"></label><input type="submit" value='Prześlij'></div>
</section>
</form>


<?php
    $data = date("Y-m-d");
    $id = 2 ;
    $wiadomosc = $_POST['wiadomosc'];
    $login = $_POST['login'];
    
    if(!empty($login) && !empty($wiadomosc)){       
            $connect = mysqli_connect("localhost", "root", "", "czat2d2");

            $select = "SELECT * FROM `wiadomosci`,`uzytkownicy` where `uzytkownicy`.`id`=`wiadomosci`.`id`";
            $selectlogin = "SELECT `id` FROM `uzytkownicy` WHERE `login`='$login'";

            $result3 = mysqli_query($connect, $selectlogin);


          
            $x = 0; 
            while($row2=mysqli_fetch_array($result3)){
                $x++;
                $id = $row2['id'];
            }
            if($x!=0){
   
                            $querry="INSERT INTO `wiadomosci` VALUES('','$wiadomosc','$id','$data')"; 


            }
            else{
                echo "Nie ma zarejestrowanego użytkownika z takim loginem.";
            }
            $result = mysqli_query($connect, $querry);
            $result2 = mysqli_query($connect, $select);

            while($row=mysqli_fetch_array($result2)){

                echo "<p>$row[login] $row[data]</p><p>$row[wiadomosci]</p>";

            }
    }
    else{
        echo "Wypełnij wszystkie pola!";
    }

    mysqli_close($connect);

?>
</body>
</html>