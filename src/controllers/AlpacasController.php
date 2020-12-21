<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProjectDAO.php';

class AlpacasController extends Controller {

  private $ProjectDAO;

  function __construct() {
    $this->ProjectDAO = new ProjectDAO();
  }

  public function index() {
    $this->set('title', 'Intro');
  }

  public function home() {
    $this->set('title', 'Goldline Alpacas');
  }

  public function merries() {
    $merries = $this->ProjectDAO->selectAllMerries();
    $this->set('merries',$merries);
    $this->set('title', 'Merries');
  }

  public function dekhengsten() {
    $dekhengsten = $this->ProjectDAO->selectAllDekhengsten();
    $this->set('dekhengsten',$dekhengsten);
    $this->set('title', 'Dekhengsten');
  }

  public function tekoop() {
    $merries = $this->ProjectDAO->selectAllTeKoopMerries();
    $dekhengsten = $this->ProjectDAO->selectAllTeKoopDekhengsten();
    $diversen = $this->ProjectDAO->selectAllDiversen();
    $this->set('dekhengsten',$dekhengsten);
    $this->set('merries',$merries);
    $this->set('diversen',$diversen);
    $this->set('title', 'Te Koop');
  }

  public function dealpaca() {
    $this->set('title', 'De Alpaca');
  }

  public function contact() {
    $this->set('title', 'Contact');
  }

  public function gallerij() {
    $pictures = $this->ProjectDAO->selectAllPictures();
    $this->set('pictures',$pictures);
    $this->set('title', 'Gallerij');
  }

  public function showresultaten() {
    $showresultaten = $this->ProjectDAO->selectAllShowresultaten();
    $this->set('showresultaten',$showresultaten);
    $this->set('title', 'Showresultaten');
  }

  public function detail() {
    if(!empty($_GET['id'])){
      $alpaca = $this->ProjectDAO->selectAlpacaById($_GET['id']);
      $fotos = $this->ProjectDAO->selectAllFotosFromAlpaca($_GET['id']);
      $showresultaten = $this->ProjectDAO->selectAllShowresultatenFromAlpaca($_GET['id']);
    } else {
      header('Location:index.php');
      exit();
    }

    $this->set('fotos',$fotos);
    $this->set('alpaca',$alpaca);
    $this->set('showresultaten',$showresultaten);
    $this->set('title','Details');
  }

}
