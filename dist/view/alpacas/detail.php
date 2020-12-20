
<article class="detail__article__top">
  <div class="detail__article__content">
  <div class="detail__wrapper">
    <h2 class="detail__titel"><?php echo $project['project'];?></h2>
    <p class="detail__clientname"><?php echo "{$project['name']} {$project['surname']}";?></p>
    <div class="detail__type--wrapper">
    <p class="detail__type"><span class="detail__subtitel">Type: </span><?php echo $artworkType['type'];?></p>
      <p class="detail__type--description"><?php echo $artworkType['description'];?></p>
    </div>
  </div>
  <div class="detail__wrapper">

<?PHP if($project["completed"] === 0) { ?>
    <?PHP
                  date_default_timezone_set('Europe/Brussels');
                  $deadline = new DateTime($project['deadline']);
                  $currentDate = new DateTime("now");
                  $totalHours = (($deadline->diff($currentDate)->format('%h'))+($deadline->diff($currentDate)->format('%a'))*24);
                  $remainingDays = floor($totalHours/24);
                  $totalMinutes = $totalHours * 60;
                  $string = "";
    ?>
    <p class="detail__deadlinedate"><?php $deadline = new DateTime($project['deadline']); $currentDate = new DateTime("now"); echo $deadline->format('d m Y')?></p>
    <p class="detail__daysleft"><?PHP ; if($totalMinutes <= 60){
                    $string = $totalMinutes.' minutes';
                  }else if($totalHours <= 72){
                    $string =  $totalHours.' hours';
                  }else $string = $remainingDays.' days';
                  if($currentDate > $deadline)echo 'You are '.$string.' overtime';
                  else echo $string.' remaining';
                  ?></p>
                <?PHP } else { ?>
    <p class="detail__deadlinedate bold">Completed</p> <?php } ?>
</div>
                </div>

</article>
<article class="detail__article__bottom">
    <div class="detail__info__part detail__info__part--primary">
      <div>
        <p class="detail__titel"><?php echo $project['project'];?></p>
        <p class="detail__subtitel">Description:</p>
        <p class="detail__projectinfo"><?php echo $project['description'];?></p>

        <p class="detail__subtitel">Materials:</p>
        <?PHP if(!empty($colors)){?>
          <ul class="details--list detail__materials__list">
        <?PHP foreach($materials as $material): ?>
                    <li class="detail__materials__list--item"><?PHP echo $material['material'] ?></li>
                  <?PHP endforeach;} else { ?> <p class="detail__materials">No materials specified</p> <?PHP } ?>
          </ul>

        <p class="detail__subtitel">Color choise:</p>
        <?PHP if(!empty($colors)){?>
          <ul class="details--list detail__colors__list">
                  <?PHP foreach($colors as $color): ?>
                    <li class="detail__colors__list--item"><?PHP echo $color['name']?> <span class="detail__colors__list--item--hex"><?PHP echo $color['hex']?></span>
                    <span style="background-color: <?PHP echo $color['hex']?>" class="detail__colors__list--item--box"></span>
                    </li>
                  <?PHP endforeach;} else {?> <p class="detail__colors">No colors specified</p> <?PHP } ?>
          </ul>


          <p class="detail__subtitel">Delivery choise:</p>
        <?PHP if(!empty($deliveries)){?>
          <ul class="details--list detail__deliveries__list">
                  <?PHP foreach($deliveries as $deliv): ?>
                    <li class="detail__deliveries__list--item"><?PHP echo $deliv['deliveryType'] ?></li>
                  <?PHP endforeach;} else {?> <p class="detail__deliveries">No deliveries specified</p> <?PHP } ?>
          </ul>



        <p class="detail__subtitel">Has insurance:</p>
        <p class="detail__insurance"><?php if($project['insurance'] === 1) echo 'Yes'; else echo 'No';?></p>
        </div>
        <div class="detail__CRUDMenu">
        <form method="POST" action="index.php?page=addproject">
          <input type="hidden" name="action" value="prepareUpdate">
          <input type="hidden" name="commissionID" value="<?PHP echo $project['commissionID']?>">
        <button type="submit" class="edit detail__edit detail__button" value="submit">Edit</button>
        </form>
        <form method="POST" action="index.php?detail&id=<?PHP echo $project['commissionID']?>">
          <input type="hidden" name="action" id="deleteProject" value="deleteProject">
          <input type="hidden" name="commissionID" value="<?PHP echo $project['commissionID']?>">
        <button type="submit" class="edit detail__remove detail__button" value="submit">Remove</button>
        </form>
        </div>
    </div>

    <div class="detail__info__part">
        <p class="detail__titel"><?php echo "{$project['name']} {$project['surname']}";?> <span class="detail__titel--extra"><?PHP if(!empty($project['company'])) echo $project['company']; ?> </span></p>
        <p class="detail__subtitel">Adress:</p>
        <ol class="detail__adres">
          <li><?PHP echo $project['street'].'  '.$project['housenumber']; if(!empty($project['bus']))echo '   Bus: '.$project['bus'];?></li>
          <li><?PHP echo $project['postal'].'   '.$project['city'] ?></li>
          <li><?PHP echo $project['country'] ?></li>
        </ol>

        <p class="detail__subtitel">Email:</p>
        <p class="detail__email"><a href="mailto:<?php echo $project['mail'].'?Subject=Project%20'.(str_replace(' ','%20',$project['project']));?>"><?php echo $project['mail'];?></a></p>

        <p class="detail__subtitel">Phone number:</p>
        <p class="detail__phonenumber"><a href="tel:<?PHP echo $project['phone']; ?>"><?php echo $project['phone'];?></a></p>
    </div>
<a class="detail__returnButton active__link" href="index.php">Return to overview</a>
</article>
