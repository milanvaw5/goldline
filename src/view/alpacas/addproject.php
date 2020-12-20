
  <div class="message">
  <?php
  if(isset($WarningString)){ ?>
 <p class="message--item message--negative">An error has occured on the following fields: <br><?php echo $WarningString ?></p>
  <?PHP
} ?>

</div>
<a class="active__link" href="index.php">Return to overview</a>
<div class="addform__progressbar__wrapper">
        <ul class="addform__progressbar__wrapper__list">
            <li class="formProgressone addform__progressbar__wrapper__list--item">Personal information</li>
            <li class="formProgresstwo addform__progressbar__wrapper__list--item">Contact information</li>
            <li class="formProgresstree addform__progressbar__wrapper__list--item">Project information</li>
            <li class="formProgressfour addform__progressbar__wrapper__list--item">Project settings</li>
        </ul>
    </div>
<form id="insertProject" class="addform" method="post" action="index.php?page=addproject">
  <input type="hidden" name="action" value="<?PHP if(!empty($data["action"]))echo $data["action"]; else echo 'insertProject'; ?>" />
<?PHP if(!empty($data['commissionID'])) {?>
  <input type="hidden" name="commissionID" value="<?PHP echo $data['commissionID']; ?>" />
   <?PHP } ?>
  <article class="formArticle one activeForm" id="1">
    <h2 class="form__article__titel">Personal information</h2>
      <div class="form__div">
        <label class="form__label" for="lname">Surname:</label>
        <?php if(!empty($errors["lname"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["lname"]; ?></p>
        <?php } ?>
        <input type="text" id="lname" name="lname" value="<?PHP if(!empty($data["lname"])) echo $data["lname"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="fname">Name:</label>
        <?php if(!empty($errors["lname"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["fname"]; ?></p>
        <?php } ?>
        <input type="text" id="fname" name="fname" value="<?PHP if(!empty($data["fname"])) echo $data["fname"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="company">Company:</label>
        <input type="text" id="company" name="company" value="<?PHP if(!empty($data["company"])) echo $data["company"]; ?>" class="input"/>
        <p class="error"></p>
      </div>
  </article>
  <article class="formArticle two activeForm" id="2">
    <h2 class="form__article__titel">Contact information</h2>
      <div class="form__div">
        <label class="form__label" for="country">Country:</label>
        <?php if(!empty($errors["country"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["country"]; ?></p>
        <?php } ?>
        <input type="text" id="country" name="country" value="<?PHP if(!empty($data["country"])) echo $data["country"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="postal">Postal code:</label>
        <?php if(!empty($errors["postal"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["postal"]; ?></p>
        <?php } ?>
        <input type="text" id="postal" name="postal" value="<?PHP if(!empty($data["postal"])) echo $data["postal"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="city">City:</label>
        <?php if(!empty($errors["city"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["city"]; ?></p>
        <?php } ?>
        <input type="text" id="city" name="city" value="<?PHP if(!empty($data["city"])) echo $data["city"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="street">Street:</label>
        <?php if(!empty($errors["street"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["street"]; ?></p>
        <?php } ?>
        <input type="text" id="street" name="street" value="<?PHP if(!empty($data["street"])) echo $data["street"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>

      <div class="form__div">
        <label class="form__label" for="housenumber">House number:</label>
        <?php if(!empty($errors["housenumber"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["housenumber"]; ?></p>
        <?php } ?>
        <input type="text" id="housenumber" name="housenumber" value="<?PHP if(!empty($data["housenumber"])) echo $data["housenumber"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="bus">Bus:</label>
        <input type="text" id="bus" name="bus" value="<?PHP if(!empty($data["bus"])) echo $data["bus"]; ?>" />
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="emailaddress">E-mail address:</label>
        <?php if(!empty($errors["emailaddress"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["emailaddress"]; ?></p>
        <?php } ?>
        <input type="email" id="emailaddress" name="emailaddress" value="<?PHP if(!empty($data["emailaddress"])) echo $data["emailaddress"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="phone">Phone number:</label>
        <?php if(!empty($errors["phone"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["phone"]; ?></p>
        <?php } ?>
        <input type="tel" id="phone" name="phone" value="<?PHP if(!empty($data["phone"])) echo $data["phone"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
  </article>
  <article class="formArticle tree activeForm" id="3">
    <h2 class="form__article__titel">Project information</h2>
      <div class="form__div">
        <label class="form__label" for="projectname">Project name:</label>
        <?php if(!empty($errors["projectname"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["projectname"]; ?></p>
        <?php } ?>
        <input type="text" id="projectname" name="projectname" value="<?PHP if(!empty($data["projectname"])) echo $data["projectname"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="type">Artwork type:</label>
        <?php if(!empty($errors["type"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["type"]; ?></p>
        <?php } ?>
        <div class="form__type">
          <select name="type" class="form__type__select">
          <?PHP foreach ($types as $type): ?>
              <option <?PHP
                if(!empty($data["type"])){
                  if($data["type"] === (string)$type['artworkTypeID'])
                    echo 'selected'; }?> value="<?PHP echo $type['artworkTypeID']; ?>">
              <?PHP echo $type['type'];?>
              </option>
          <?PHP endforeach?>
          </select>
        </div>

      </div>
      <div class="form__div">
        <label class="form__label" for="checkbox">Material:</label>
        <div class="color__wrapper">
          <?PHP foreach ($materials as $material): ?>
            <label class="container__colors tooltip" data-toggle="tooltip">
              <input type="checkbox" class="checkboxcolors" <?PHP if(!empty($data["material"])) if(!empty($data["material"][$material['materialID']]))echo 'checked'; ?> name="material[<?PHP echo $material['materialID'];?>]" value="<?PHP echo $material['materialID'];?>" id="<?PHP echo $material['materialID'];?>">
              <span class="checkmark__colors"  style="background-image: url('../assets/img/materials/<?PHP echo $material['img'];?>'); background-size: 2rem 2rem;"></span>
              <span class="tooltiptext"><?PHP echo $material['material'];?> <p><?PHP echo $material['description'];?></p></span>
            </label>
          <?PHP endforeach?>
        </div>
      </div>
      <div class="form__div">
        <label class="form__label" for="checkbox">Prefered colours:</label>
        <?php if(!empty($errors["color"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["color"]; ?></p>
        <?php } ?>
        <div class="color__wrapper">
          <?PHP foreach ($colors as $color): ?>
            <label class="container__colors">
              <input type="checkbox" class="checkboxcolors input" <?PHP if(!empty($data["color"])) if(!empty($data["color"][$color['colorID']]))echo 'checked'; ?>  name="color[<?PHP echo $color['colorID'];?>]" value="<?PHP echo $color['colorID'];?>" id="<?PHP echo $color['colorID'];?>">
              <span class="checkmark__colors"  style="background-color: <?PHP echo $color['hex'];?>;" ></span>
            </label>
          <?PHP endforeach?>
        </div>

      </div>
      <div class="form__div">
        <label class="form__label" for="description">Description and important notes:</label>
        <?php if(!empty($errors["description"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["description"]; ?></p>
        <?php } ?>
        <textarea class="form__description__textarea input" cols="40" rows="5"id="description" name="description" required><?PHP if(!empty($data["description"])) echo $data["description"]; ?></textarea>
        <p class="error"></p>
      </div>
  </article>
  <article class="formArticle four activeForm" id="4">
    <h2 class="form__article__titel">Project settings</h2>
      <div class="form__div">
        <label class="form__label" for="deliverytypes">Delivery type:</label>
        <?php if(!empty($errors["deliverytype"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["deliverytype"]; ?></p>
        <?php } ?>
        <?php foreach ($deliverytypes as $deliverytype): ?>

        <label for="deliverytype[<?php echo $deliverytype['deliveryID'];?>]" class="container"><img class="deliverytype__icons" src="../assets/img/<?php echo $deliverytype['deliveryType'];?>.png" alt="icon">
        <p><?php echo $deliverytype['deliveryType'];?></p>
        <input class="deliverytype__titel hidden" <?PHP if(!empty($data["deliverytype"])) if(!empty($data["deliverytype"][$deliverytype['deliveryID']]))echo 'checked'; ?> name="deliverytype[<?php echo $deliverytype['deliveryID'];?>]" value="<?php echo $deliverytype['deliveryID'];?>" type="checkbox" id="deliverytype[<?php echo $deliverytype['deliveryID'];?>]">
          <span class="checkmark"></span>
        </label>

        <?PHP endforeach?>

      </div>
      <div class="form__div">
        <label class="form__label" for="deadline"><img class="icons" src="../assets/img/ic3.png" alt="icon">Deadline:</label>
        <?php if(!empty($errors["deadline"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["deadline"]; ?></p>
        <?php } ?>
        <?PHP $datetime = new DateTime("now"); ?>
        <input min="<?PHP echo $datetime->format('Y-m-d\TH:i'); ?>" type="datetime-local" id="deadline" name="deadline" value="<?PHP
        if(!empty($data["deadline"])) echo $data["deadline"];
        else echo $datetime->format('Y-m-d\TH:i');
        ?>" class="input" required/>
      <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="workhours"><img class="icons" src="../assets/img/ic4.png" alt="icon">Estimated workhours:</label>
        <?php if(!empty($errors["workhours"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["workhours"]; ?></p>
        <?php } ?>
        <input type="number" id="workhours" name="workhours" min="1" value="<?php if(!empty($data["workhours"])) echo $data["workhours"]; ?>" class="input" required/>
        <p class="error"></p>
      </div>
      <div class="form__div">
        <label class="form__label" for="insurance">Insurance:</label>
        <?php if(!empty($errors["insurance"])) {?>
        <p class="addform--errorMessage"><?php echo $errors["insurance"]; ?></p>
        <?php } ?>
        <div class="form__type">
          <select name="insurance" class="form__type__select">

          <option <?php if(isset($data["insurance"])){if($data["insurance"] === '1') echo 'selected';} else echo 'selected' ?> value="1">Yes</option>
          <option <?php if(isset($data["insurance"])){if($data["insurance"] === '0') echo 'selected';} ?> value="0">No</option>
          </select>
        </div>
      </div>
      <div class="form__div">
        <button type="submit" class="active__link submit" value="submit">Submit</button>
      </div>
  </article>
  <div class="footer__buttons">
    <ul>
      <li class="formArticle--buttons button__left active__link noJavaScript">Go Back</li>
      <li class="formArticle--buttons button__right active__link noJavaScript">Next Page</li>
    </ul>
  </div>
</form>

