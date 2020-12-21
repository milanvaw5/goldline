<?php

require_once( __DIR__ . '/DAO.php');

class ProjectDAO extends DAO {

  public function selectAllAlpacas(){

    $sql = "SELECT * FROM `goldline_alpacas` ORDER BY `geboortedatum` ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllPictures(){

    $sql = "SELECT * FROM `goldline_gallerij`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllShowresultaten(){

    $sql = "SELECT * FROM `goldline_gallerij`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAlpacaById($id){

    $sql = "SELECT * FROM `goldline_alpacas` WHERE `alpacasID` = :id ;";
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

  public function selectAllTeKoopMerries(){

    $sql = "SELECT * FROM `goldline_alpacas` WHERE `gender` = 1 AND `tekoop`= 1 ORDER BY `geboortedatum`  ASC";
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

  public function selectAllTeKoopDekhengsten(){

    $sql = "SELECT * FROM `goldline_alpacas` WHERE `gender` = 0 AND `tekoop`= 1 ORDER BY `geboortedatum`  ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllFotosFromAlpaca($id){
    $sql = "SELECT * FROM `goldline_alpacafotos` WHERE `goldline_alpacafotos`.`idalpaca` = :id ;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllShowresultatenFromAlpaca($id){
    $sql = "SELECT * FROM `goldline_showresultaten` WHERE `goldline_showresultaten`.`idalpaca` = :id ;";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

