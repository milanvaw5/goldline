require('./style.css');
{
 if(document.querySelector(".paginatitelgroot").innerHTML === "De alpaca") {
    document.getElementById("btn1").addEventListener("click", getWrongResult);
    document.getElementById("btn2").addEventListener("click", getWrongResult);
    document.getElementById("btn3").addEventListener("click", getResult);

    function getResult() {
      document.querySelector(".dealpaca__gameresult").innerHTML = "Correct! In Australië produceren de alpaca’s 8 tot 12 kilo wol!";
    }

    function getWrongResult() {
      document.querySelector(".dealpaca__gameresult").innerHTML = "Hmmm, dat klopt niet. Probeer nog eens!";
    }
  }

/*----------------------------------------------------------------------------------------*/

  else if (document.querySelector(".paginatitelgroot").innerHTML === "Te koop") {
    document.querySelector(".vkbtn1").addEventListener("click", getMerriesTekst);
    document.querySelector(".vkbtn2").addEventListener("click", getDekhengstenTekst);
    document.querySelector(".vkbtn3").addEventListener("click", getDiversenTekst);

    function getMerriesTekst() {
      document.querySelector(".tekoop__uitleg").innerHTML = "Onze merries.";
      document.getElementById("dekhengsten").style.display = 'none';
      document.getElementById("diversen").style.display = 'none';
      document.getElementById("merries").style.display = 'block';
    }

    function getDekhengstenTekst() {
      document.querySelector(".tekoop__uitleg").innerHTML = "Onze dekhengsten.";
      document.getElementById("merries").style.display = 'none';
      document.getElementById("diversen").style.display = 'none';
      document.getElementById("dekhengsten").style.display = 'block';
    }

    function getDiversenTekst() {
      document.querySelector(".tekoop__uitleg").innerHTML = `Hieronder bieden we voeders aan die m’n ouders (eigenaars van Top-Line Alpaca’s)
      hebben samengesteld speciaal voor alpaca’s. Ook onze wol hebben we laten verwerken en kan je kopen bij de Kiekeboe winkel in Oudenaarde.`;
      document.getElementById("diversen").style.display = 'block';
      document.getElementById("dekhengsten").style.display = 'none';
      document.getElementById("merries").style.display = 'none';
    }
  }

  else {
    console.log("empty");
  }


    const init = () => {

    };

  init();

}
