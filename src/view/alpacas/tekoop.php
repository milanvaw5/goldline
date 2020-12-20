<section class="home__grid">
      <article class="tekoop__artikel">
        <h2 class="paginatitelgroot hidden">Te koop</h2>
        <div class="tekoop__nav">
            <button id="vkbtn1" class="tekoop__nav__button vkbtn1">Merries</button>
            <button id="vkbtn2" class="tekoop__nav__button vkbtn2">Hengsten</button>
            <button id="vkbtn3" class="tekoop__nav__button vkbtn3">Diversen</button>
        </div>
      </article>
</section>

<section class="home__grid 1">
      <article class="tekoop__artikel">
        <h2 class="hidden">Uitleg producten</h2>
        <p class="tekoop__uitleg">Hieronder bieden we voeders aan die m’n ouders (eigenaars van Top-Line Alpaca’s)
          hebben samengesteld speciaal voor alpaca’s. Ook onze wol hebben we laten verwerken
          en kan je kopen bij de Kiekeboe winkel in Oudenaarde.</p>
      </article>
      <article class="productslist">
        <?php foreach ($diversen as $divers): ?>
          <div class="product__card">
            <img src="assets/img/diversen/<?PHP echo $divers['img'];?>" alt="<?PHP echo $divers['naam'];?>" class="prod__img">
            <p class="prod__titel"><?PHP echo $divers['naam'];?></p>
            <p class="prod__beschrijving"><?PHP echo $divers['beschrijving'];?></p>
            <p class="prod__prijs">€ <?PHP echo $divers['prijs'];?></p>
            <button class="button"><a href="">Bezoek de website</a></button>
          </div>
        <?php endforeach?>
      </article>
</section>
