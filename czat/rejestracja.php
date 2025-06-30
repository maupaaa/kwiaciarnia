<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    
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
<form method="POST" ENCTYPE="multipart/form-data" action="#">
        <div><label for="text">imie</label><br><input type="text" name="imie" id="imie" ></div>
        <div><label for="text">nazwisko</label><br><input type="text"name="nazwisko" id="nazwisko"></div>
        <div><label for="text">email</label><br><input type="text"name="email" id="email"></div>
        <div><label for="text">login</label><br><input type="text"name="login" id="login"></div>
        <div><label for="text">haslo</label><br><input type="password" name="haslo" id="haslo"><input type="checkbox" onclick="myFunction()"></div id=czekboks>
        <input type="file" name="plik"/><br/>
        <section class='guziki'>
        <div><label for="reset"></label><input type="reset" value='Wyczyść'></div>
        <div><label for="submit"></label><input type="submit" value='Prześlij'></div>

        </section>
        
    </form>

    <?php   
    error_reporting (0);
            $login = $_POST['login'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $sprawdz = '/^[A-ZĄĘŁŃÓŻŹŚa-ząęółśżźćń]+$/';
            $sprmail = '/^[a-zA-Z0-9\.\-_]+\@[a-zA-Z0-9\.\-_]+\.[a-z]{2,6}$/D';
            $sprhaslo = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/';            
            $haslo =  sha1($_POST['haslo']);
            $rozszerzenia = array("jpg","png","avif","gif");
            $zdjecia = $_FILES['plik']['name']; 
            $rozmiarzdj = $_FILES['plik']['size'];
            $typzdj = $_FILES['plik']['type'];
    if (!empty($imie) && !empty($nazwisko) && !empty($_POST['email'] && !empty($login)&&!empty($_POST['haslo']))){
            if(preg_match ($sprawdz, $_POST['imie'])){
                if(preg_match($sprawdz,$_POST['nazwisko'])){
                    if(preg_match($sprmail, $_POST['email'])){
                        if(preg_match($sprhaslo, $haslo)){
                            // if($_FILES['plik']['error']=0){
                                    $imie = strtolower($_POST['imie']);
                                    $imie = ucfirst($imie);
                                    $nazwisko =strtolower($_POST['nazwisko']);
                                    $nazwisko = ucfirst($nazwisko);
                                    $connect = mysqli_connect("localhost", "root", "", "czat2d2"); 
                                  
                                    $querry="INSERT INTO `uzytkownicy` VALUES ('', '$imie', '$nazwisko','$_POST[email]', '$login','$haslo','$zdjecia')";
                                    
                                    $typzdj = $_FILES['plik']['type'];

                                    echo $_SERVER['DOCUMENT_ROOT'];
                                    echo $typzdj;
                                    $rozszerenia = array("jpg","png","avif","gif");
                                    if(isset($_FILES['plik'])){
                                    move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/zpalinska2d2/czat/zdj/'.$_FILES['plik']['name']);
                                                                    
                                                            }
                                    header("location:logowanie.php");
                                    mysqli_query($connect, $querry);
                                    mysqli_close($connect);
                             
                                
                            // }
                            // else{
                            //     echo "podany niepoprawny format pliku.";
                            // }
                            

                        }
                        else{
                            echo "Błąd hasła- hasło musi zawierać minimum 8 znaków, w tym małe litery, wielkie litery i znaki specjalne.";
                        }
                }
                else{
                    echo "Błędny email";
                }
            }
            else{
                echo "Błędne nazwisko.";
                }
        }
        else{
            echo "Błędne imie.";
            }
       
    }
    else{
        echo "Wszystkie pola w formularzu muszą zostać wypełnione";
    }

         
    ?>
</body>
</html>