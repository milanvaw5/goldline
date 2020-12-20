<div class="header">
  <div class="header__top">
  <a href="index.php?page=home"><img src="./assets/img/logo.png" alt="logo"></a>
    <a class="header__top__addprojectbutton" href="index.php?page=addproject">+</a>
  </div>
  <section class="commission__filter">
    <h1 class="commission__filter--title hidden">Filter</h1>
    <form id="filterProjects" class="commission__filter__form" method="get" action="index.php?page=index">
      <input type="hidden" name="action" value="filterProjects"/>
      <div class="commission__filter__form__itemWrapper">
        <label class="commission__filter__form--projectname commission__filter__form--label" for="keyword">Projectname:</label>
            <input type="text" id="keyword" name="keyword" class="commissionFilterInput input" value="<?PHP if(!empty($_GET["keyword"]))echo $_GET["keyword"] ?>" placeholder="">
      </div>
      <div class="commission__filter__form__itemWrapper">
        <label class="commission__filter__form--type commission__filter__form--label" for="selectedtype">Type: </label>

        <div class="commission__filter__form__itemWrapper--inputs">
        <label class="container__types type__group__omhuls" for="selectedtypeALL">
                  <input type="radio" class="type__group commissionFilterInput"  id="selectedtypeALL" name="selectedtype" value="ALL" <?PHP if(!empty($_GET["selectedtype"])){if($_GET["selectedtype"] === 'ALL') echo 'checked';} ?>>
                  <span class="type__group__button">All</span>
          </label>
           <?php foreach ($types as $type): ?>
              <label class="container__types type__group__omhuls" for="selectedtype<?PHP echo $type['artworkTypeID'];?>">
                <input type="radio" class="type__group commissionFilterInput"  id="selectedtype<?PHP echo $type['artworkTypeID'];?>" name="selectedtype" value="<?PHP echo $type['artworkTypeID'];?>" <?PHP if(!empty($_GET["selectedtype"])){if($_GET["selectedtype"] === (string)$type['artworkTypeID']) echo 'checked';} ?>>
                <span class="type__group__button"><?PHP echo $type['type'];?></span>
              </label>
            <?php endforeach?>
            </div>
</div>
<div class="commission__filter__form__itemWrapper">

        <label class="commission__filter__form--projectname commission__filter__form--label" for="selectedstate">Project status: </label>
        <div class="commission__filter__form__itemWrapper--inputs">
          <label class="container__types type__group__omhuls" for="current">
                <input type="radio" class="type__group commissionFilterInput"  id="current"  name="selectStatus" value="current" <?PHP if(!empty($_GET["selectStatus"])){if($_GET["selectStatus"] === 'current') echo 'checked';}else echo 'checked'?> >
                <span class="type__group__button">Current projects</span>
          </label>
          <label class="container__types type__group__omhuls" for="completed">
                <input type="radio" class="type__group commissionFilterInput" id="completed"  name="selectStatus" value="completed" <?PHP if(!empty($_GET["selectStatus"])){if($_GET["selectStatus"] === 'completed') echo 'checked';} ?> >
                <span class="type__group__button">Completed projects</span>
          </label>
           </div>
</div>
      <input class="commission__filter__form--submit" type="submit" value="Filter">
    </form>
  </section>
</div>

<section class="commission__cards">
  <h1 class="commission__cards--title hidden">Commissions</h1>
  <?php if(!empty($projects)){ foreach ($projects as $project): ?>
    <?php
              date_default_timezone_set('Europe/Brussels');
              $date = strtotime($project['deadline']);

              $deadline = new DateTime($project['deadline']);
              $currentDate = new DateTime("now");
              $prefix = "";

              $totalHours = (($deadline->diff($currentDate)->format('%h'))+($deadline->diff($currentDate)->format('%a'))*24);
              $remainingDays = floor($totalHours/24);
              $remainingHours = $totalHours % 24;
    ?>
    <article class="commission__cards--item <?php if($currentDate > $deadline) {echo 'red'; $prefix='- ';}?>">
      <div class="commission__cards--wrapper <?PHP if($project['completed'] === 1) echo 'commission__cards--wrapper--small' ?>">
        <h2 class="hidden">Projectdisplay</h2>
          <form class="commission__cards__item__form" action="index.php?page=home" method="POST">
            <input class="commission__cards__item__form--ID hidden" value="<?PHP echo $project['commissionID']?>" name="ID">
            <input class="commission__cards__item__form--checkmark" type="image" width="35" height="35" value="submit" src="./assets/check.svg" alt="submit Button">
          </form>
        <div class="commission__cards__item--wrapper">
          <p class="commission__cards__item--title bold"><?php echo $project['project'];?></p>
          <p class="commission__cards__item--client medium"><?php echo $project['surname'].' '.$project['name'];?></p>
          <ul class="commission__cards__item--contactList">
            <li class="commission__cards__item__contactList--item"><a href="tel:<?php echo $project['phone'];?>" class="commission__cards__item__contactList--link commission__cards__item__contactList--call">Call</a></li>
            <li class="commission__cards__item__contactList--item"><a href="mailto:<?php echo $project['mail'].'?Subject=Project%20'.(str_replace(' ','%20',$project['project']));?>" class="commission__cards__item__contactList--link commission__cards__item__contactList--mail">Send mail</a></li>
          </ul>
        </div>
        <p class="commission__cards__item--description"><?php if(strlen($project['description'])  < 255 )echo $project['description']; else echo (substr($project['description'], 0, 255).'...')?> <br> <a href="index.php?page=detail&id=<?php echo $project['commissionID'];?>" class="commission__cards__item--description--details">Read more details...</a></p>
        <div class="commission__cards__item--dates">
            <ul class="commission__cards__item__dateList">
              <li class="commission__cards__item__dateList--item commission__cards__item__dateList--day"><?PHP echo $deadline->format('d') ?></li>
              <li class="commission__cards__item__dateList--item commission__cards__item__dateList--month commission__cards__item__dateList--smalldate"><?PHP echo $deadline->format('m') ?></li>
              <li class="commission__cards__item__dateList--item commission__cards__item__dateList--year commission__cards__item__dateList--smalldate"><?PHP echo $deadline->format('y') ?></li>
            </ul>
            <?PHP if($project['completed'] === 0) { ?>
            <ul class="commission__cards__item__remaining">
              <?php if ((($deadline->diff($currentDate)->format('%h'))+($deadline->diff($currentDate)->format('%a'))*24) >= 72) { ?>
                <li class="commission__cards__item__remaining--item"><?php echo $prefix ?><span class="days"><?PHP echo $remainingDays; ?></span> Days</li>
                <li class="commission__cards__item__remaining--item"><?php echo $prefix ?><span class="hours"><?PHP echo $remainingHours; ?></span> Hours</li>
                <li class="commission__cards__item__remaining--item"><?php echo $prefix ?><span class="minutes"><?PHP echo ($deadline->diff($currentDate)->format('%i'))?></span> Minutes</li>
                <li class="commission__cards__item__remaining--item hidden"><?php echo $prefix ?><span class="seconds"><?PHP echo ($deadline->diff($currentDate)->format('%s'))?></span> Seconds</li>
              <?php }
              else {?>
                <li class="commission__cards__item__remaining--item"><?php echo $prefix ?><span class="hours"><?PHP echo (($deadline->diff($currentDate)->format('%h'))+($deadline->diff($currentDate)->format('%a'))*24); ?></span> Hours</li>
                <li class="commission__cards__item__remaining--item"><?php echo $prefix ?><span class="minutes"><?PHP echo ($deadline->diff($currentDate)->format('%i'))?></span> Minutes</li>
                <li class="commission__cards__item__remaining--item"><?php echo $prefix ?><span class="seconds"><?PHP echo ($deadline->diff($currentDate)->format('%s'))?></span> Seconds</li>
              <?php } ?>
            </ul>
              <?PHP } ?>
        </div>
      </div>
    </article>
              <?PHP endforeach; } else { ?>

                <p class="commission__cards--noResult">No commissions found</p>


              <?PHP }?>
</section>
