<section class="home__grid show">
      <article class="artikel headerpiece">
        <h2 class="hidden">Dekhengsten pagina</h2>
        <section class="dekhengstentopimg">
          <img class="homeimg" src="assets/img/home3.jpg" alt="dekhengsten">
        </section>
        <section class="textsection dekhengstentoptext"><h3 class="paginatitelgroot">Dekhengsten</h3>
        <p>Hieronder kan je zien welke dekhengsten we ter beschikking stellen. U kan op de foto klikken en zo meer informatie van de hengst terug vinden. Indien u interesse heeft mag u ons vrijblijvend contacteren.
        </p>
        <button class="button"><a href="index.php?page=contact">Contacteer voor interesse</a></button>
        <p>Of bekijk de showresultaten voor wat inspiratie...</p>
        <button class="button"><a href="index.php?page=showresultaten">Bekijk onze showresultaten</a></button></section>
      </article>
</section>
<section class="home__grid alpaca">
      <article class="alpaca__artikel">
        <h2 class="paginatitel">Onze dekhengsten</h2>
        <p>Klik op hun foto om hun profiel te bekijken</p>
      </article>
      <article class="profilesgrid">
        <?php foreach ($dekhengsten as $dekhengst): ?>
          <a href="index.php?page=detail&id=<?PHP echo $dekhengst['alpacasID'];?>">
          <div class="profile__card">
          <?PHP if(empty($dekhengst['profilepic'])) {?>
                <img class="profile__pic" src="assets/img/alpacas/empty.jpg" alt="<?PHP echo $dekhengst['naam'];?>" class="profile_img">
              <?PHP } else {?>
            <img class="profile__pic" src="assets/img/alpacas/<?PHP echo $dekhengst['profilepic'];?>" alt="<?PHP echo $dekhengst['naam'];?>" class="profile_img">
           <?php } ?>
            <p class="profile__naam"><?PHP echo $dekhengst['naam'];?></p>
          </div>
        </a>
        <?php endforeach?>
      </article>
</section>
