<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Kwiaciarnia</title>
  <link rel="stylesheet" href="loginregistration.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="zdjecia/veronika-bykovich--umXNG5C544-unsplash.jpg" alt="Cover Image">
        <div class="text">
          <span class="text-1">Twoje Kwiaty<br> Nasza Pasja</span>
          <span class="text-2">Rozkwitnij z nami</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Zaloguj się</div>
          <form method="post" action="">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="login" placeholder="Podaj nazwę użytkownika" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="haslo" placeholder="Podaj hasło" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Prześlij">
              </div>
              <div class="text sign-up-text">Nie masz konta?<a href="registration.php"> Zarejestruj się</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php
session_start();
error_reporting(0);
$login = $_POST['login'];
$haslo = sha1($_POST['haslo']);
if($login!="admin"&& $haslo!="ADMIN"){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login']) && isset($_POST['haslo'])) {

        if (!empty($login) && !empty($haslo)) {
            $connect = mysqli_connect("localhost", "root", "", "kwiaciarnia");

            if ($connect === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM `klienci` WHERE `login` = '$login' AND `haslo` = '$haslo'";
            $result = mysqli_query($connect, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                if (!empty($row['login'])) {
                    $_SESSION['login'] = $row['login'];
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Nieprawidłowy login lub hasło.";
                }
            } else {
                echo "Błąd zapytania: " . mysqli_error($connect);
            }

            mysqli_close($connect);
        } else {
            echo "Wszystkie pola muszą zostać wypełnione.";
        }
    } else {
        echo "Brak danych logowania.";
    }
}
}
else{
  header("Location: admin.php");
}
?>
</body>
</html>
