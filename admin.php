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
<?php
error_reporting(0);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['last_review_time']) || time() - $_SESSION['last_review_time'] >= 60) {
        if (isset($_FILES['plik'])) {
            $connect = mysqli_connect("localhost", "root", "", "kwiaciarnia");
            $rozszerzenia = array("jpg", "png", "avif", "gif");

            $zdjecia = $_FILES['plik']['name'];
            $rozmiarzdj = $_FILES['plik']['size'];
            $typzdj = $_FILES['plik']['type'];

            move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/kwiaciarnia/zdjecia/' . $_FILES['plik']['name']);

            $tresc = $_POST['tresc'];
            $login = $_SESSION['login'];
            $query = "INSERT INTO recenzje (login_uzytkownika, tresc, zdjecie) VALUES ('$login', '$tresc', '$zdjecia')";
            mysqli_query($connect, $query);

            mysqli_close($connect);

            $_SESSION['last_review_time'] = time();
        }
    } else {
        echo "<script>alert('Możesz wysłać recenzję tylko raz na minutę. Poczekaj i spróbuj ponownie.');</script>";
    }
}

?>
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
      echo "<p>Jesteś zalogowany jako administrator</p> <a href='login.php'>zaloguj się</a> ";

    }
    
    ?>
          </div>
        </div>
      </nav>
      <div class="header">
        <div class="powitanie">Nasze prace</div> 
        <div class="podgalpow">Od lat wyróżniamy sie naszym profesjonalizmem. Poniżej zamieszczone są zdjęcia gotowych bukietów, które wysłali nam nasi klienci.</div>
  
    </div>
    <?php
$connect = mysqli_connect("localhost", "root", "", "kwiaciarnia");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dous = $_POST['dous'];
    if(isset($dous)){
        $usun = "DELETE FROM recenzje WHERE id='$dous'";
        mysqli_query($connect, $usun);
        mysqli_close($connect);
    }
}

echo "
<p class='hgaleria'>Wybierz ID recenzji, którą chcesz usunąć:</p>
<form method='post'>
    <input type='number' name='dous' id='dous' class='textgaleria'>
    <input type='submit' value='Usuń'>
</form>
";
?>

</section>
<section class="galsekcja" id="galeria">
<div class="galeria">
  <figure>
      <img src="zdjecia/meng-he-hPcxvCecdPI-unsplash (1).jpg" alt="x" class="zdj">
      <figcaption>"super"</figcaption>
      </figure>
      <figure>
      <img src="zdjecia/markus-clemens-mibjbNoS1XA-unsplash.jpg" alt="x" class="zdj">
        <figcaption>"super duper"</figcaption>
      </figure>
      <figure>
      <img src="zdjecia/christie-kim-0IsBu45B3T8-unsplash.jpg" alt="x" class="zdj">
      <figcaption>"superdupermega"</figcaption>  
    </figure>
    <figure>
      <img src="zdjecia/carrie-beth-williams-s3AFTBZ3cnc-unsplash.jpg" alt="x" class="zdj">
      <figcaption>"yayyy"</figcaption>
    </figure>
    <figure>
      <img src="zdjecia/angelina-jollivet-mNEpmNiFdXs-unsplash.jpg" alt="x" class="zdj">
      <figcaption>"supermega"</figcaption>  
    </figure>
    <?php
        $connect = mysqli_connect("localhost", "root", "", "kwiaciarnia");

        $query = "SELECT * FROM recenzje";
        $result = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo "<figure>";
            echo "<img src='zdjecia/" . $row['zdjecie'] . "' alt='x' class='zdj'>";
            echo "<figcaption>'" . $row['tresc'] . "' - " . $row['login_uzytkownika'] . "</figcaption>";
            echo "</figure>";
        }
 
        mysqli_close($connect);
        ?>

    </section>
</section>
    <!-- galeria koniec -->
 
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
    const id = link.getAttribute('href');
    if (id.startsWith('#')) { 
      e.preventDefault();
      document.querySelector(id).scrollIntoView({ behavior: 'smooth' });
    }
  });
});

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script>
</body>
</html>