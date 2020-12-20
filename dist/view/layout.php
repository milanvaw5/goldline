<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
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
      <nav class="navbar">
          <ul class="navbar__items">
            <li class="items__item"><a class="active" href="#home">Logo</a></li>
            <li class="items__item"><a href="#merries">Merries</a></li>
            <li class="items__item"><a href="#dekhengsten">Dekhengsten</a></li>
            <li class="items__item"><a href="#tekoop">Te koop</a></li>
            <li class="items__item"><a href="#dealpaca">De alpaca</a></li>
            <li class="items__item"><a href="#showresultaten">Showresultaten</a></li>
            <li class="items__item"><a href="#gallerij">Gallerij</a></li>
            <li class="items__item"><a href="#contact">Contact</a></li>
            <li class="items__item"><a href="#insta">iconinsta</a></li>
          </ul>
      </nav>
      </header>
      <main>
        <?php echo $content;?>
      </main>
    <?php echo $js; ?>
  </body>
</html>
