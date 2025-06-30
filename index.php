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
              <a class="nav-link" href="index.php">Strona główna </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about-us">O nas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="galeria.php">Nasze prace</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="karty.php">Karty podarunkowe</a>
            </li>

     
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Kontakt</a>
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
      <!-- nawigacja koniec -->

      <!-- header poczatek -->
      <div class="header">
        <div class="powitanie">Kwiaciarnia</div>   
        <div class="podgalpow">Kwiaty, które mówią więcej niż słowa.</div>

    </div>
    <!-- header koniec -->
    <section class="about-us" id="about-us">
        <div class="about">
          <img src="https://images.unsplash.com/photo-1703883710038-7496bf846897?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="pic">
          <div class="text">
            <h2>O nas</h2>
              <p>Witamy w Naszej Kwiaciarni! Jesteśmy pasjonatami kwiatów i piękna natury. Nasza kwiaciarnia to miejsce, gdzie magia kwiatów łączy się z profesjonalną obsługą i kreatywnością. Oferujemy szeroki wybór świeżych kwiatów, bukietów, kompozycji oraz dekoracji na różne okazje.</p>
            <div class="data">
            </div>
          </div>
        </div>
      </section>

<
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
        <?php
if(isset($_POST['logout']))
{
    unset($_SESSION['id']);
    session_unset();
    session_destroy();
    header('Location: index.php');
}
        ?>
</body>
</html>