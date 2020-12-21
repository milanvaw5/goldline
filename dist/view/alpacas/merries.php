<section class="home__grid show">
      <article class="artikel headerpiece">
        <h2 class="hidden">Home pagina</h2>
        <section><img class="homeimg" src="assets/img/merries.jpg" alt="alpacas in de wei"></section>
        <section class="textsection"><h3 class="paginatitelgroot">Merries</h3><button class="button"><a href="index.php?page=contact">Contacteer voor interesse</a></button></section>
      </article>
</section>

<section class="home__grid alpaca">
      <article class="alpaca__artikel">
        <h2 class="paginatitel">Onze merries</h2>
        <p>Klik op hun foto om hun profiel te bekijken</p>
      </article>
      <article class="profilesgrid">
        <?php foreach ($merries as $merrie): ?>
          <a href="index.php?page=detail&id=<?PHP echo $merrie['alpacasID'];?>">
            <div class="profile__card">
              <?PHP if(empty($merrie['profilepic'])) {?>
                <img class="profile__pic" src="assets/img/alpacas/empty.jpg" alt="<?PHP echo $merrie['naam'];?>" class="profile_img">
              <?PHP } else {?>
              <img class="profile__pic" src="assets/img/alpacas/<?PHP echo $merrie['profilepic'];?>" alt="<?PHP echo $merrie['naam'];?>" class="profile_img">
              <?php } ?>
              <p class="profile__naam"><?PHP echo $merrie['naam'];?></p>
            </div>
          </a>
        <?php endforeach?>
      </article>
</section>
