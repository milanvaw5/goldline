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
      document.querySelector(".tekoop__uitleg").innerHTML = "Momenteel hebben we geen merries te koop.";
      document.querySelector(".productslist").style.display = 'none';
    }

    function getDekhengstenTekst() {
      document.querySelector(".tekoop__uitleg").innerHTML = "Momenteel hebben we geen hengsten te koop.";
      document.querySelector(".productslist").style.display = 'none';
    }

    function getDiversenTekst() {
      document.querySelector(".tekoop__uitleg").innerHTML = `Hieronder bieden we voeders aan die m’n ouders (eigenaars van Top-Line Alpaca’s)
      hebben samengesteld speciaal voor alpaca’s. Ook onze wol hebben we laten verwerken en kan je kopen bij de Kiekeboe winkel in Oudenaarde.`;
      document.querySelector(".productslist").style.display = 'block';
    }
  }

  else {
    console.log("empty");
  }


    const init = () => {

    };

  init();

}
