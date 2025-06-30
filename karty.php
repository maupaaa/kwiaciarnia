<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
</head>
<body>

    <!-- nawigacja poczatek -->
    <nav class="navbar navbar-expand-sm   navbar-light bg-light" class="sticky">


        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Strona główna <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="galeria.php">Nasze prace</a>
            </li>

     
          </li>
   
    
          <li class="nav-item">
            <a class="nav-link" href="karty.php">Karty podarunkowe</a>
          </li>
    
          </ul>
          <div class="social-part">
          <?php
            session_start();
    if(isset($_SESSION['login'])) {
        echo "<p>Witaj, {$_SESSION['login']}</p> <form action='logout.php' method='post'>
        <input type='submit' value='Wyloguj' class='button-18' name='logout' id='logout' role='button'></p>
    
        </form>"; 
    }
    else
    {
      echo "<p>Nie jesteś zalogowany</p> <a href='login.php'>zaloguj się</a> ";

    }
    
    ?>
          </div>
        </div>
      </nav>
      <div class="header">
        <div class="powitanie">Karty podarunkowe</div> 
        <div class="podgalpow">Nie masz pomysłu na prezent dla najbliższej ci osoby? Nie wiesz jaki bukiet wybrać? Karta podarunkowa to pomysł idealny dla ciebie!</div>
  
    </div>
<section>
<form method="post">
    <div class="">
        <input type="text" id="odbiorca" name="odbiorca" placeholder="Imię odbiorcy (dla kogo)" required>
    </div>
    <div class="input-box">
        <input type="tel" id="nadawca" name="nadawca" placeholder="Imię nadawcy (od kogo)"> 
    </div>
    <div class="input-box">
        Wartość karty podarunkowej: <input type="number" name="kwota"> zł
    </div>
    <div class="button input-box">
        <input type="submit" value="Generuj kartę">
</form>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $odbiorca = $_POST['odbiorca'];
    $nadawca = $_POST['nadawca'];
    $wartosc = $_POST['kwota'];

    if (!empty($odbiorca) && !empty($nadawca) && !empty($wartosc)) {
        $query = "INSERT INTO karty VALUES ('','$nadawca', '$odbiorca', '$wartosc')";
        
        if (mysqli_query($conn, $query)) {
            echo "Dane zostały pomyślnie zapisane do bazy danych.";
        } else {
            echo "Wystąpił błąd podczas zapisywania danych: " . mysqli_error($conn);
        }
    } else {
        echo "Proszę wypełnić wszystkie pola formularza.";
    }
}

mysqli_close($conn);
?>
</section>
<footer class="footer-distributed" id="contact">

			<div class="footer-left">

				<h3>Company<span>logo</span></h3>

				<p class="footer-links">
					<a href="#" class="link-1">Strona główna</a>
					
					<a href="#">O nas</a>
				
					<a href="#">Nasze prace</a>
														
					<a href="#">Kontakt</a>
				</p>

				<p class="footer-company-name">Kwiaciarnia © 2024</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Ul. Świerkowa 64</span> Polska, Chwaszczyno</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+48 690-915-909</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p>superkwiaciarnia@gmail.com</p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>O naszej firmie</span>
					Jesteśmy rodzinną kwiaciarnią oferującą świeże kwiaty i piękne kompozycje na każdą okazję. Gwarantujemy najwyższą jakość i zadowolenie klientów. Zapraszamy!
				</p>

				<div class="footer-icons">

					<a href="#" class="icon"><i class="fa fa-facebook"></i></a>
					<a href="#" class="icon"><i class="fa fa-instagram"></i></a>
					<a href="#" class="icon"><i class="fa fa-whatsapp"></i></a>
					<a href="#" class="icon"><i class="fa fa-telegram"></i></a>

				</div>

			</div>

		</footer>
        <script>
            const navLinks = document.querySelectorAll('nav a');

navLinks.forEach((link) => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    const id = link.getAttribute('href');
    document.querySelector(id).scrollIntoView({ behavior: 'smooth' });
  });
});
        </script>
 




</body>
</html>