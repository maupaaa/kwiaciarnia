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
          <div class="title">Zarejestruj się</div>
          <form method="post" action="">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="imie" id="imie" placeholder="Imię" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="login" id="login" placeholder="Login" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="email" id="email" placeholder="Email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="tel" name="tel" id="tel" placeholder="Nr. telefonu" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="haslo" id="haslo" placeholder="Haslo" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="haslocheck" id="haslocheck" placeholder="Powtorz haslo" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Prześlij">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  
  // $login = $_POST['login'];
  // $imie = $_POST['imie'];
  // $nazwisko = $_POST['nazwisko'];
  // $email = $_POST['email'];
  // $haslo =  sha1($_POST['haslo']);
  // $tel = $_POST['tel'];
  // $haslocheck = $_POST['haslocheck'];
  $sprawdz = '/^[A-ZĄĘŁŃÓŻŹŚa-ząęółśżźćń]+$/';
  $sprmail = '/^[a-zA-Z0-9\.\-_]+\@[a-zA-Z0-9\.\-_]+\.[a-z]{2,6}$/D';
  $sprhaslo = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/';            
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $imie = $_POST['imie'] ?? '';
      $nazwisko = $_POST['nazwisko'] ?? '';
      $email = $_POST['email'] ?? '';
      $login = $_POST['login'] ?? '';
      $haslo = sha1($_POST['haslo'] ?? '');
      $tel = $_POST['tel'] ?? '';
      $haslocheck = sha1($_POST['haslocheck'] ?? '');
  
      if (!empty($imie) && !empty($nazwisko) && !empty($email) && !empty($login) && !empty($haslo) && !empty($tel) && !empty($haslocheck)) {
          if(preg_match ($sprawdz, $imie)) {
              if(preg_match($sprawdz, $nazwisko)) {
                  if(preg_match($sprmail, $email)) {
                      if(preg_match($sprhaslo, $haslo)) {
                          if($haslo == $haslocheck) {
                              // if($_FILES['plik']['error']=0){
                              $imie = strtolower($_POST['imie']);
                              $imie = ucfirst($imie);
                              $nazwisko = strtolower($_POST['nazwisko']);
                              $nazwisko = ucfirst($nazwisko);
                              $connect = mysqli_connect("localhost", "root", "", "kwiaciarnia"); 
                              $querry="INSERT INTO `klienci` VALUES ('', '$imie', '$nazwisko','$login', '$email','$tel','$haslo')";
                              header("location:logowanie.php");
                              mysqli_query($connect, $querry);
                              mysqli_close($connect);
                          } else {
                              echo "Błąd hasła - hasła muszą być takie same." ;
                          }
                      } else {
                          echo "Błąd hasła - hasło musi zawierać minimum 8 znaków, w tym małe litery, wielkie litery i znaki specjalne.";
                      }
                  } else {
                      echo "Błędny email.";
                  }
              } else {
                  echo "Błędne nazwisko.";
              }
          } else {
              echo "Błędne imię.";
          }
      } else {
          echo "Wszystkie pola w formularzu muszą zostać wypełnione.";
      }
  } else {
      echo "Formularz nie został przesłany. Wypełnij formularz i spróbuj ponownie.";
  }
  ?>
  
</body>
</html>
