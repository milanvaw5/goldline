<section class="gallerij__img">
      <?php foreach ($pictures as $picture): ?>
          <img class="gallerij__img__item" src="assets/img/gallerij/<?PHP echo $picture['naam'];?>" alt="<?PHP echo $picture['naam'];?>" class="gallerij__img">
      <?php endforeach?>
      </article>
</section>
