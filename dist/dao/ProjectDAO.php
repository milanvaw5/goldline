<?php

require_once( __DIR__ . '/DAO.php');

class ProjectDAO extends DAO {

  public function selectAllAlpacas(){

    $sql = "SELECT * FROM `goldline_alpacas` ORDER BY `geboortedatum` ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function removeAlpacaById($id){

    $sql = "DELETE FROM `goldline_alpacas` WHERE `goldline_alpacas`.`alpacaID` = :id ;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllDiversen(){

    $sql = "SELECT * FROM `goldline_diversen`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllMerries(){

    $sql = "SELECT * FROM `goldline_alpacas` WHERE `gender` = 1 ORDER BY `geboortedatum`  ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllDekhengsten(){

    $sql = "SELECT * FROM `goldline_alpacas` WHERE `gender` = 0 ORDER BY `geboortedatum`  ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
/*
  public function selectMaterialByProjectid($id){
    $materialids = "SELECT `materialID` FROM `dev3_planit_materialsPeralpaca` WHERE `alpacaID` = :id";
    $sql = "SELECT * FROM `dev3_planit_materials` WHERE `materialID` = :materialids";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':materialids',$materialids);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectProjectById($id){
    $sql = "SELECT * FROM `goldline_alpacas` WHERE `alpacaID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function filterProjects($keyword = false, $selectedtype = false, $status = false){

    $sql = "SELECT *
    FROM `goldline_alpacas`
    WHERE 1";
      $bindValues = array();
      if (!empty($selectedtype)) {
          $sql .= " AND `goldline_alpacas`.`type` = :selectedtype";
          $bindValues[':selectedtype'] = $selectedtype;
      }
      if (!empty($status) && $status !== 0) {
          $sql .= " AND `goldline_alpacas`.`completed` = :status";
          $bindValues[':status'] = $status;
      }else $sql .= " AND `goldline_alpacas`.`completed` = 0";
      if (!empty($keyword)) {
              $sql .= " AND `goldline_alpacas`.`project` LIKE :keyword ";
              $bindValues[':keyword'] =  '%'.$keyword.'%';
      }
      $sql .= " ORDER BY `deadline` ASC";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($bindValues);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insertProject($data){

    $errors = $this->validate($data);

    if(empty($errors)){
      $sql = "INSERT INTO `goldline_alpacas` (`alpacaID`, `name`, `surname`, `company`, `street`, `housenumber`, `bus`, `postal`, `city`, `country`, `mail`, `phone`, `project`, `type`, `description`, `deadline`, `workhours`, `insurance`, `completed`, `datecreated`)
      VALUES (NULL, :fname, :surname, :company, :street, :housenumber, :bus, :postal, :city, :country, :mail, :phone, :project, :types, :descriptions , :deadline, :workhours, :insurance, '0', CURRENT_TIMESTAMP);";
      $stmt = $this->pdo->prepare($sql);

      $stmt->bindValue(':fname',$data['fname']);
      $stmt->bindValue(':surname',$data['lname']);
      $stmt->bindValue(':company',$data['company']);
      $stmt->bindValue(':street',$data['street']);
      $stmt->bindValue(':housenumber',$data['housenumber']);
      $stmt->bindValue(':bus',$data['bus']);
      $stmt->bindValue(':postal',$data['postal']);
      $stmt->bindValue(':city',$data['city']);
      $stmt->bindValue(':country',$data['country']);
      $stmt->bindValue(':mail',$data['emailaddress']);
      $stmt->bindValue(':phone',$data['phone']);
      $stmt->bindValue(':project',$data['projectname']);
      $stmt->bindValue(':types',$data['type']);
      $stmt->bindValue(':descriptions',$data['description']);
      $stmt->bindValue(':deadline',(str_replace('T', ' ', $data['deadline'] ).':00'));
      $stmt->bindValue(':workhours',$data['workhours']);
      $stmt->bindValue(':insurance',$data['insurance']);
      if($stmt->execute()){
        $NewId = ($this->pdo->lastInsertId());
        if(!empty($data['material'])) $res1 = $this->dynamicInsert('dev3_planit_materialsPeralpaca', 'materialID', $NewId, $data['material']);
        else $res1 = true;
        $res2 = $this->dynamicInsert('dev3_planit_colorsPeralpaca', 'colorID', $NewId, $data['color']);
        $res3 = $this->dynamicInsert('dev3_planit_deliveriesPeralpaca', 'deliveryID', $NewId, $data['deliverytype']);
        if($res1 !== NULL){$errors["generalColors"] = "Something went wrong, your item has been added but there was an issue with the colors"; return $errors;}
        if($res2 !== NULL){$errors["generalMaterials"] = "Something went wrong, your item has been added but there was an issue with the materials"; return $errors;}
        if($res3 !== NULL){$errors["generalDelivery"] = "Something went wrong, your item has been added but there was an issue with the delivery option"; return $errors;}
        if($res3 !== NULL && $res3 !== NULL&& $res3 !== NULL) return true;
        else return $errors;
      }
    }else return $errors;
  }

  public function validate($data){
    $errors = [];

    if(strlen($data['lname']) > 50 ) $errors['lname'] = 'Oh, this name is too long!';
    if (empty($data['lname'])) {
      $errors['lname'] = 'Oops, you forgot to fill this in.';
    }
    if (empty($data['fname'])) {
      $errors['fname'] = 'Oops, you forgot to fill this in.';
    }
    if (empty($data['country'])) {
      $errors['country'] = 'Oh no, you forgot to fill in their country.';
    }
    if (empty($data['postal'])) {
      $errors['postal'] = 'Oops, you forgot to fill this in.';
    }
    if (empty($data['city'])) {
      $errors['city'] = 'It\'s important to know where to deliver so be sure to fill this in';
    }
    if (empty($data['street'])) {
      $errors['street'] = 'Looks like you forgot to fill in their street.';
    }
    if (empty($data['housenumber'])) {
      $errors['housenumber'] = 'Oh no, you forgot their house number!';
    }
    if (empty($data['emailaddress'])) {
      $errors['emailaddress'] = 'You\'ll need to contact your client later on. Be sure to fill in this field.';
    }else if(!strpos($data['emailaddress'], '@') || !strpos($data['emailaddress'], '.')){
      $errors['emailaddress'] = 'Looks like the email adress you entered is not valid.';
    }
    if (empty($data['phone'])) {
      $errors['phone'] = 'Oops, you forgot to fill this in.';
    }
    if (empty($data['projectname'])) {
      $errors['projectname'] = 'Oh no, you forgot to name your project!';
    }
    if (empty($data['type'])) {
      $errors['type'] = 'Seems that you forgot to select the artwork type';
    }
    if (empty($data['color'])) {
      $errors['color'] = 'Be sure to select some colors.';
    }
    if (empty($data['description'])) {
      $errors['description'] = 'It will be usefull to have some kind of description for later on';
    }
    if (empty($data['deliverytype'])) {
      $errors['deliverytype'] = 'Oh seems that you forgot to select a delivery option.';
    }
    if (empty($data['deadline'])) {
      $errors['deadline'] = 'Be sure to have a date so you know when to deliver your project.';
    }
    if (!empty($data['workhours'])) {
      if(!is_numeric($data["workhours"])) $errors['workhours'] = 'Seems like this is not a valid number';
    }else $errors['workhours'] = 'It seems that you forgot to fill in this field.';

    if (!isset($data['insurance']) || strlen($data['insurance']) !== 1) {
      $errors['insurance'] = 'There was an issue with this selection';
    }else if((int)$data['insurance'] !== 0 && (int)$data['insurance'] !== 1)$errors['insurance'] = (int)$data['insurance'];

    // https://i.redd.it/af4eme6bvj141.jpg
    return $errors;
  }

  public function completealpaca($id){

    $sql = "UPDATE `goldline_alpacas` SET `completed` = '1' WHERE `goldline_alpacas`.`alpacaID` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
  }

  public function dynamicInsert($tablename, $fieldname, $alpacaID, $items) {

    $sql = "INSERT INTO `".$tablename."` (`ID`, `alpacaID`, `".$fieldname."` ) VALUES";

    foreach ($items as $key => $item) {
      $sql .= ' (NULL, :'.$key.'alpaca , :'.$key.'item ),';
    }
    $sql = substr_replace($sql ,";",-1);
    $stmt = $this->pdo->prepare($sql);

    foreach ($items as $key => $item) {
      $stmt->bindValue( ':'.$key.'alpaca' , $alpacaID);
      $stmt->bindValue( ':'.$key.'item' ,$item);
    }
    $stmt->execute();
  }

  public function selectColorByalpaca($id){
    $sql = "SELECT * FROM `dev3_planit_colors` AS col JOIN `dev3_planit_colorsPeralpaca` AS com ON com.`colorID` = col.`colorID` WHERE alpacaID = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectMaterialsByalpaca($id){
    $sql = "SELECT * FROM `dev3_planit_materials` AS col JOIN `dev3_planit_materialsPeralpaca` AS com ON com.`materialID` = col.`materialID` WHERE alpacaID = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectDeliveriesByalpaca($id){
    $sql = "SELECT * FROM `dev3_planit_deliveryTypes` AS devt JOIN `dev3_planit_deliveriesPeralpaca` AS dev ON dev.`deliveryID` = devt.`deliveryID` WHERE alpacaID = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getArtworkType($id){
    $sql = "SELECT awt.type, awt.description FROM `dev3_planit_artworkTypes` as awt WHERE awt.artworkTypeID = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function DeletionsPeralpacaID($id){

    $tables = ["dev3_planit_colorsPeralpaca", "dev3_planit_deliveriesPeralpaca", "dev3_planit_materialsPeralpaca"];
    foreach($tables as $table){
      $sql = 'DELETE FROM `'.$table.'` WHERE alpacaID = :commissID;';
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':commissID',$id);
      $stmt->execute();
    }

  }

  public function updateProject($data){
    $errors = $this->validate($data);
    if(empty($errors)){
      $this->DeletionsPeralpacaID($data['alpacaID']);
      $sql = "UPDATE `goldline_alpacas`
      SET
      `name` = :fname ,
      `surname` = :surname ,
      `company` = :company ,
      `street` = :street ,
      `housenumber` = :housenumber ,
      `bus` = :bus ,
      `postal` = :postal ,
      `city` = :city ,
      `country` = :country ,
      `phone` = :phone ,
      `project` = :project ,
      `type` = :types ,
      `description` = :descriptions ,
      `deadline` = :deadline ,
      `workhours` = :workhours ,
      `mail` = :mail ,
      `insurance` = :insurance
      WHERE `goldline_alpacas`.`alpacaID` = :id ;";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':fname',$data['fname']);
      $stmt->bindValue(':surname',$data['lname']);
      $stmt->bindValue(':company',$data['company']);
      $stmt->bindValue(':street',$data['street']);
      $stmt->bindValue(':housenumber',$data['housenumber']);
      $stmt->bindValue(':bus',$data['bus']);
      $stmt->bindValue(':postal',$data['postal']);
      $stmt->bindValue(':city',$data['city']);
      $stmt->bindValue(':country',$data['country']);
      $stmt->bindValue(':mail',$data['emailaddress']);
      $stmt->bindValue(':phone',$data['phone']);
      $stmt->bindValue(':project',$data['projectname']);
      $stmt->bindValue(':types',$data['type']);
      $stmt->bindValue(':descriptions',$data['description']);
      $stmt->bindValue(':deadline',(str_replace('T', ' ', $data['deadline'] ).':00'));
      $stmt->bindValue(':workhours',$data['workhours']);
      $stmt->bindValue(':insurance',$data['insurance']);
      $stmt->bindValue(':id',$data['alpacaID']);
      if($stmt->execute()){
        if(!empty($data['material'])) $res1 = $this->dynamicInsert('dev3_planit_materialsPeralpaca', 'materialID', $data['alpacaID'], $data['material']);
        else $res1 = true;
        $res2 = $this->dynamicInsert('dev3_planit_colorsPeralpaca', 'colorID', $data['alpacaID'], $data['color']);
        $res3 = $this->dynamicInsert('dev3_planit_deliveriesPeralpaca', 'deliveryID', $data['alpacaID'], $data['deliverytype']);
        if($res1 !== NULL){$errors["generalColors"] = "Something went wrong, your item has been updated but there was an issue with the colors"; return $errors;}
        if($res2 !== NULL){$errors["generalMaterials"] = "Something went wrong, your item has been updated but there was an issue with the materials"; return $errors;}
        if($res3 !== NULL){$errors["generalDelivery"] = "Something went wrong, your item has been updated but there was an issue with the delivery option"; return $errors;}
        if($res3 !== NULL && $res3 !== NULL&& $res3 !== NULL) return true;
        else return $errors;
      }
    }
    else return $errors;*/
  }

