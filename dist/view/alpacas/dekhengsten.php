<section class="home__grid">
      <article class="artikel headerpiece">
        <h2 class="hidden">Dekhengsten pagina</h2>
        <section><img class="homeimg" src="assets/img/home.jpg" alt="alpacas in de wei"></section>
        <section class="textsection"><h3 class="paginatitelgroot">Dekhengsten</h3>
        <p>Hieronder kan je zien welke dekhengsten we ter beschikking stellen. U kan op de foto klikken en zo meer informatie van de hengst terug vinden. Indien u interesse heeft mag u ons vrijblijvend contacteren.
        </p>
        <button class="button">Contacteer voor interesse</button>
        <p>Of bekijk de showresultaten voor wat inspiratie...</p>
        <button class="button">Bekijk onze showresultaten</button></section>
      </article>
</section>

<section class="home__grid">
      <article class="artikel headerpiece">
        <h2 class="paginatitel">Onze dekhengsten</h2>
        <p>Klik op hun foto om hun profiel te bekijken</p>
      </article>
      <article>
      <?php foreach ($dekhengsten as $dekhengst): ?>
        <div>
          <img src="assets/img/<?PHP echo $dekhengst['naam'];?>.jpg" alt="<?PHP echo $dekhengst['naam'];?>" class="profile_img">
          <p class="profile_naam"><?PHP echo $dekhengst['naam'];?></p>
        </div>
      <?php endforeach?>
      </article>
</section>
