<section class="home__grid">
      <article class="artikel headerpiece">
        <h2 class="hidden">Home pagina</h2>
        <section><img class="homeimg" src="assets/img/home.jpg" alt="alpacas in de wei"></section>
        <section class="textsection"><h3 class="paginatitelgroot">Merries</h3><button class="button">Contacteer voor interesse</button></section>
      </article>
</section>

<section class="home__grid">
      <article class="artikel headerpiece">
        <h2 class="paginatitel">Onze merries</h2>
        <p>Klik op hun foto om hun profiel te bekijken</p>
      </article>
      <article>
      <?php foreach ($merries as $merrie): ?>
        <div>
          <img src="assets/img/<?PHP echo $merrie['naam'];?>.jpg" alt="<?PHP echo $merrie['naam'];?>" class="profile_img">
          <p class="profile_naam"><?PHP echo $merrie['naam'];?></p>
        </div>
      <?php endforeach?>
      </article>
</section>
