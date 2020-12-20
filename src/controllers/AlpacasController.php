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
    $merries = $this->ProjectDAO->selectAllMerries();
    $dekhengsten = $this->ProjectDAO->selectAllDekhengsten();
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
    } else {
      header('Location:index.php');
      exit();
    }

    $this->set('fotos',$fotos);
    $this->set('alpaca',$alpaca);
    $this->set('title','Details');
  }

  public function merdetail() {
    if(!empty($_GET['id'])){
      $alpaca = $this->ProjectDAO->getAlpacaById($_GET['id']);
    }

    if(empty($_GET['id'])){
      $_SESSION['message']['negative'] = 'Deze alpaca was niet teruggevonden, gelieve opnieuw te proberen of contact op te nemen.';
      header('Location:index.php');
      exit();
    }

    /*$fotos = $this->ProjectDAO->selectAllFotosFromAlpaca();
    $this->set('fotos',$fotos);*/
    $this->set('alpaca',$alpaca);
    $this->set('title','Details');
  }

  public function addproject () {

    if(!empty($_POST['action'])){
      if($_POST['action'] === 'insertProject'){
        $insertedProject = $this->ProjectDAO->insertProject($_POST);

        if(!isset($insertedProject["generalColors"]) && !isset($insertedProject["generalMaterials"]) && !isset($insertedProject["generalDelivery"])){
          if(!empty($insertedProject)){
            $this->set('data', $_POST);
            $errors = $insertedProject;
            $this->set('errors',$insertedProject);
          }
          else{
            header('Location:index.php?page=home&state=success');
            exit();
          }
        }else {
          $_SESSION["message"] = $insertedProject;
          header('Location:index.php?page=home&state=fail');
        }
      }else if($_POST['action'] === 'prepareUpdate') {
        $project = $this->ProjectDAO->selectProjectById($_POST['commissionID']);
        $data = $this->createDataArray($project);
        $this->set('data', $data);
      }else if($_POST['action'] === 'update'){
        $updatedProject = $this->ProjectDAO->updateProject($_POST);

        if(!isset($updatedProject["generalColors"]) && !isset($updatedProject["generalMaterials"]) && !isset($updatedProject["generalDelivery"])){

          if(!empty($updatedProject)){
            $this->set('data', $_POST);
            $errors = $updatedProject;
            $this->set('errors',$updatedProject);
          }
          else{
            header('Location:index.php?page=home&state=success');
            exit();
          }
        }else {
          $_SESSION["message"] = $insertedProject;
          header('Location:index.php?page=home&state=fail');
        }

      }
    }

    if(isset($errors)){
      $Oldstring = [];
      $errorString = [];
      foreach($errors as $key => $error){
        $errorString = array_merge_recursive($Oldstring, $this->GetPage($key));
        $Oldstring = $errorString;
      }

      $WarningString = "<span>";
      $currentTitle = "";
      $previousTitle = "";
      if((sizeOf($errorString) === 1))$WarningString .=  ("<br> On the form part about <span class='bold'>".array_keys($errorString)[0]." </span> The following fields have errors: <span class='bold'>".$errorString[array_keys($errorString)[0]]."</span>");
      else {
          foreach($errorString as $key => $title){
            $WarningString .= "<br> On the form part about <span class='bold'>".$key." </span> The following fields have errors: ";

            if(is_array($errorString[$key])){
              foreach($errorString[$key] as $field){
                $WarningString .= "<span class='bold'>".$field."</span>, ";
              }
            }else $WarningString .= "<span class='bold'>".$errorString[$key]."</span>, ";
              $WarningString = substr_replace($WarningString ,"",-2).'</span><span>';
          }
          $WarningString = substr_replace($WarningString ,"",-6);
        }
        $this->set('WarningString', $WarningString);
      }

    $colors = $this->ProjectDAO->selectAllColors();
    $types = $this->ProjectDAO->selectAllArtworkTypes();
    $mats = $this->ProjectDAO->SelectAllMaterials();
    $deliverytypes = $this->ProjectDAO->selectAllDeliveryTypes();

    $this->set('colors', $colors);
    $this->set('types', $types);
    $this->set('materials', $mats);
    $this->set('deliverytypes', $deliverytypes);
    $this->set('title', 'Add a project');
  }

  public function GetPage ($item) {

    switch($item){

      case $item === 'fname':
        return array("personal information (1)"=>"Surname");
        break;
      case $item === 'lname':
        return array("personal information (1)"=>"Name");
        break;
      case $item === 'country':
        return array("contact information (2)"=>"Country");
        break;
      case $item === 'state':
        return array("contact information (2)"=>"State");
        break;
      case $item === 'postal':
        return array("contact information (2)"=>"Postal code");
        break;
      case $item === 'city':
        return array("contact information (2)"=>"City");
        break;
      case $item === 'street':
        return array("contact information (2)"=>"Street");
        break;
      case $item === 'housenumber':
        return array("contact information (2)"=>"House number");
        break;
      case $item === 'emailaddress':
        return array("contact information (2)"=>"E-mail adress");
        break;
      case $item === 'phone':
        return array("contact information (2)"=>"Phone");
        break;

      case $item === "projectname":
        return array("project information (3)"=>"Projectname");
        break;
      case $item === "type":
        return array("project information (3)"=>"Artworktype");
        break;
      case $item === "color":
        return array("project information (3)"=>"Colors");
        break;
      case $item === "description":
        return array("project information (3)"=>"Description");
        break;
      case $item === "deliverytype":
        return array("project settings (4)"=>"Deliverytype");
        break;
      case $item === "deadline":
        return array("project settings (4)"=>"Deadline date");
        break;
      case $item === "workhours":
        return array("project settings (4)"=>"Estimated work hours");
        break;
      case $item === "insurance":
        return array("project settings (4)"=>"Insurance");
        break;
    }

  }

  public function createDataArray($result) {

    $data = [];
    foreach($result as $key => $res){
      $data[$this->returnDataName($key)] = strval($res);
    }
    $data['deadline'] = str_replace ( " ", "T", substr($data['deadline'], 0, -3) );
    $data['action'] = 'update';


    $colors = $this->ProjectDAO->selectColorByCommission($data['commissionID']);
    $materials = $this->ProjectDAO->selectMaterialsByCommission($data['commissionID']);
    $deliveries = $this->ProjectDAO->selectDeliveriesByCommission($data['commissionID']);

    foreach($colors as $key => $color) $data['color'][$color['colorID']] = $color['colorID'];
    foreach($materials as $key => $material) $data['material'][$material['materialID']] = $material['materialID'];
    foreach($deliveries as $key => $delivery) $data['deliverytype'][$delivery['deliveryID']] = $delivery['deliveryID'];
    return $data;
  }

  public function returnDataName($item){


    switch($item){

      case $item === 'name':
        return 'fname';
        break;

      case $item === 'commissionID':
        return 'commissionID';
        break;

      case $item === 'surname':
        return 'lname';
        break;

      case $item === 'company':
        return 'company';
        break;

      case $item === 'street':
        return 'street';
        break;

      case $item === 'housenumber':
        return 'housenumber';
        break;

      case $item === 'bus':
        return 'bus';
        break;

      case $item === 'postal':
        return 'postal';
        break;

      case $item === 'city':
        return 'city';
        break;

      case $item === 'country':
        return 'country';
        break;

      case $item === 'mail':
        return 'emailaddress';
        break;

      case $item === 'phone':
        return 'phone';
        break;

      case $item === 'project':
        return 'projectname';
        break;

      case $item === 'type':
        return 'type';
        break;

      case $item === 'description':
        return 'description';
        break;

      case $item === 'deadline':
        return 'deadline';
        break;

      case $item === 'workhours':
        return 'workhours';
        break;

      case $item === 'insurance':
        return 'insurance';
        break;
      default:
        return $item;
        break;
    }

  }
}
