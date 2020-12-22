<section class="home__grid">
      <article class="artikel headerpiece detailtop">
        <h2 class="hidden">Alpaca detail pagina</h2>
        <section class="detail__profile__top">
        <?PHP if(empty($alpaca[0]['profilepic'])) {?>
                <img class="detail__profile__pic" src="assets/img/alpacas/empty.jpg" alt="<?PHP echo $alpaca[0]['naam'];?>">
              <?PHP } else {?>
            <img class="detail__profile__pic" src="assets/img/alpacas/<?PHP echo $alpaca[0]['profilepic'];?>" alt="<?PHP echo $alpaca[0]['naam'];?>">
           <?php } ?>
          <p class="detail__profile__naam"><?PHP echo $alpaca[0]['naam'];?></p>
        </section>
        <section class="detail__textsection"><h3 class="paginatitelgroot hidden">Dekhengst <?PHP echo $alpaca[0]['naam'];?></h3>
          <p class="detail__gender"><?php
          if ($alpaca[0]['gender'] === 0)
          {
            echo "hengst";
          } else {
            echo "merrie";
          };?></p>
          <p><?PHP echo $alpaca[0]['geboortedatum'];?></p>
          <p><?PHP echo $alpaca[0]['beschrijving'];?></p>
          <button class="button"><a href="<?PHP echo $alpaca[0]['stamboom'];?>">Ontdek de stamboom</a></button>
          <button class="button"><a href="index.php?page=contact">Contacteer voor interesse</a></button>
        </section>
      </article>
</section>

<section class="home__grid alpaca">
      <article class="alpaca__artikel">
        <h2 class="paginatitel">Vacht</h2>
        <p><?PHP echo $alpaca[0]['vacht'];?></p>
      </article>
      <article class="alpaca__artikel">
        <h2 class="paginatitel">Showresultaten</h2>

        <?php if(!empty($showresultaten)) {?>
          <?php foreach ($showresultaten as $showresultaat): ?>
          <div class="showresult">
            <p class="showresult__titel"><?PHP echo $showresultaat['titel'];?></p>
            <p class="showresult__uitleg"><?PHP echo $showresultaat['uitleg'];?></p>
            <button class="button"><a href="<?PHP echo $showresultaat['url'];?>" target="_blank">Meer info</a></button>
          </div>
          <?php endforeach?>

        <?php } else { ?>
          <p>Geen showresultaten te vinden voor <?PHP echo $alpaca[0]['naam'];?>.</p>
        <?php } ?>
      </article>
      <article class="alpaca__artikel__images">
        <h2 class="hidden">Alpaca Images</h2>
        <?php foreach ($fotos as $foto): ?>
          <img class="detail__alpacaimg" src="assets/img/alpacas/<?PHP echo $foto['naam'];?>" alt="<?PHP echo $foto['naam'];?>">
        <?php endforeach?>
      </article>
</section>
