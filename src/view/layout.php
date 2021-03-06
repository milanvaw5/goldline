<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Goldline Alpaca's</title>

    <?php echo $css;?>
  </head>
  <body>
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>
      <header><h1 class="hidden">Goldline Alpaca's</h1>
      <nav class="navbar" role="navigation">
      <div class="menuToggle">
      <input class="checkbox" type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
          <ul class="navbar__items menu">
            <li class="items__item mobile"><a href="index.php?page=home"><img class="logo" src="assets/img/logo.png" alt="Logo"></a></li>
            <li class="items__item first"><a href="index.php?page=merries">Merries</a></li>
            <li class="items__item"><a href="index.php?page=dekhengsten">Dekhengsten</a></li>
            <li class="items__item"><a href="index.php?page=tekoop">Te koop</a></li>
            <li class="items__item"><a href="index.php?page=dealpaca">De alpaca</a></li>
            <li class="items__item desktop"><a href="index.php?page=home"><img class="logo" src="assets/img/logo.png" alt="Logo"></a></li>
            <li class="items__item middle"><a href="index.php?page=showresultaten">Showresultaten</a></li>
            <li class="items__item"><a href="index.php?page=gallerij">Gallerij</a></li>
            <li class="items__item"><a href="index.php?page=contact">Contact</a></li>
            <li class="items__item"><a href="https://www.instagram.com/goldlinealpacas/" target="_blank"><img class="instaicon" src="assets/img/instaicon.png" alt="Instagram"></a></li>
          </ul>
      </nav>
      </header>
      <main>
        <?php echo $content;?>
      </main>
      <footer class="footer__elements">
        <div class="footer__element">
          <img class="footer__logo" src="assets/img/logo.png" alt="Logo">
        </div>
        <div class="footer__element">
          <p class="footer__tekst"><strong>Adres:</strong> Driesstraat 8, 9690 Kluisbergen</p>
        </div>
        <div class="footer__element">
          <p class="footer__tekst"><strong>E-mailadres:</strong>  gold-line-alpacas@hotmail.com</p>
        </div>
      </footer>
    <?php echo $js; ?>
  </body>
</html>
