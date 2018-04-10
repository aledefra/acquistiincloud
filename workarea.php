<!DOCTYPE html>
<html>
<script>
<?php
  include "functions.php";
?>
</script>
<style>
@import url(docs.css);
</style>
<head>

<title>
    Modifica documento
  </title>

  <div class="navbar">
    <a class="active" href="docs.php"><strong>Acquisti </strong>in <strong>Cloud</strong></a>
    <a class="reg-right" href="registra.php">Registra</a>
    <a class="reg-right" href="downFIC.php">Scarica fatture da FIC</a>
    <a class="reg-right" href="uploadPDF.php">Carica fatture</a>

    <meta name="viewport" content="width=device-width, initial-scale=1">

  </div>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="index.js"></script>
  <link rel="icon" type="image/png" href="/acquistiincloud/images/favicon.png">

</head>
<body>
  <div class="div-fatt">
    <div class="div-pdffatt">
      <?php
        loadPDF($_GET['idDoc']);
      ?>
    </div>
  <div class="div-datifatt">
  <form action="">
  <h3>Dati Generici</h3>
  Nr. doc: <input name="ndoc" id="ndoc" type="text">
  Data doc: <input name="datadoc" id=" datadoc" type="date">
  <br><br>
  <hr>
  <h3>Fornitore</h3>
  C.F.: <input name="cf" id="cf" type="text" onfocusout="determinaPersFis()">
  P.IVA: <input name="piva" id="piva" type="text" onfocusout="determinaPersFis()">
  <br><br>
  <div id="personaFisica" class="div-inline">
    Nome: <input name="nome" id="nome" type="text">
    Cognome: <input name="cognome" id="cognome" type="text">
  </div>
  <div id="societa" class="div-inline">
    Ragione sociale: <input name="ragsoc" id="ragosoc" type="text">
  </div>
  <br><br>
  Indirizzo: <input name="via" id="via" type="text">
  <input name="nCivico" id="nCivico" type="text" size="6">
  CAP / Città: <input name="cap" id="cap" type="text" size="6">
  <input name="citta" id="citta" type="text">
  Provincia: <input name="provincia" id="provincia" type="text" size="3">
  <br><br>
  <hr>
  <h3>Dati contabili</h3>
  Totale: <input name="totFatt" id="totFatt" type="text" onfocusout="trascriviTotFatt()">
  Ritenuta d'acconto: <input name="ritAcc" id="ritAcc" type="text">
  <br><br>
  Causale: <input name="causale" id="causale" type="text" size="4">
  Sezionale: <input name="sezionale" id="sezionale" type="text" size="4">
  <br><br>
  <table>
    <tr>
      <th>Sottoconto</th>
      <th>Imponibile</th>
      <th>IVA</th>
      <th>IVA11</th>
      <th>Imposta</th>
      <th></th>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
      <td style="width: 35px;">
        <div style="display: inline-block; min-width: 32px;" onclick="scorpora(1)">
          <a class="btn" id="S[1]" data-toggle="tooltip" data-placement="top">
            <i>S</i>
          </a>
        </div>
      </td>
    </tr>
    <tr>
      <td><input name="sottoconto[2]" id="sottoconto[2]" type="text" size="10"></td>
      <td><input name="imponibile[2]" id="imponibile[2]" type="text" size="10"></td>
      <td><input name="iva[2]" id="iva[2]" type="text" size="5"></td>
      <td><input name="iva11[2]" id="iva11[2]" type="text" size="5"></td>
      <td><input name="imposta[2]" id="imposta[2]" type="text" size="10"></td>
      <td style="width: 35px;">
        <div style="display: inline-block; min-width: 32px;" onclick="scorpora(2)">
          <a class="btn" id="S[2]" data-toggle="tooltip" data-placement="top">
            <i>S</i>
          </a>
        </div>
      </td>
    </tr>
    <tr>
      <td><input name="sottoconto[3]" id="sottoconto[3]" type="text" size="10"></td>
      <td><input name="imponibile[3]" id="imponibile[3]" type="text" size="10"></td>
      <td><input name="iva[3]" id="iva[3]" type="text" size="5"></td>
      <td><input name="iva11[3]" id="iva11[3]" type="text" size="5"></td>
      <td><input name="imposta[3]" id="imposta[3]" type="text" size="10"></td>
      <td style="width: 35px;">
        <div style="display: inline-block; min-width: 32px;" onclick="scorpora(3)">
          <a class="btn" id="S[3]" data-toggle="tooltip" data-placement="top">
            <i>S</i>
          </a>
        </div>
      </td>
    </tr>
    <tr>
      <td><input name="sottoconto[4]" id="sottoconto[4]" type="text" size="10"></td>
      <td><input name="imponibile[4]" id="imponibile[4]" type="text" size="10"></td>
      <td><input name="iva[4]" id="iva[4]" type="text" size="5"></td>
      <td><input name="iva11[4]" id="iva11[4]" type="text" size="5"></td>
      <td><input name="imposta[4]" id="imposta[4]" type="text" size="10"></td>
      <td style="width: 35px;">
        <div style="display: inline-block; min-width: 32px;" onclick="scorpora(4)">
          <a class="btn" id="S[4]" data-toggle="tooltip" data-placement="top">
            <i>S</i>
          </a>
        </div>
      </td>
    </tr>
    <tr>
      <td><input name="sottoconto[5]" id="sottoconto[5]" type="text" size="10"></td>
      <td><input name="imponibile[5]" id="imponibile[5]" type="text" size="10"></td>
      <td><input name="iva[5]" id="iva[5]" type="text" size="5"></td>
      <td><input name="iva11[5]" id="iva11[5]" type="text" size="5"></td>
      <td><input name="imposta[5]" id="imposta[5]" type="text" size="10"></td>
      <td style="width: 35px;">
        <div style="display: inline-block; min-width: 32px;" onclick="scorpora(5)">
          <a class="btn" id="S[5]" data-toggle="tooltip" data-placement="top">
            <i>S</i>
          </a>
        </div>
      </td>
    </tr>
  </table>
  <br><br>
  <div id="subapprfatt">
    <input name"savefatt" id="savefatt" type="submit" value="Salva">
    <input name"apprfatt" id="apprfatt" type="submit" value="Approva">
  </div>
  </form>
  </div>
  </div>
</body>
<script>
//script per scorporo IVA per ogni riga
  function scorpora(riga) {
    var totale = document.getElementById("imponibile["+ riga +"]").value;
    var iva = document.getElementById("iva["+ riga +"]").value;
    iva = iva / 100;
    iva += 1;
    var imponibile = totale / iva;
    imponibile = roundNumber(imponibile, 2);
    var imposta = totale - imponibile;
    imposta = roundNumber(imposta, 2);
    document.getElementById("imponibile["+ riga +"]").value = imponibile;
    document.getElementById("imposta["+ riga +"]").value = imposta;
  }

//script per visualizzare Rag.Soc. o Nome e cognome
  function determinaPersFis() {
    var codFisc = document.getElementById("cf").value;
    var PIva = document.getElementById("piva").value;
    if ((!isNaN(codFisc) && !isNaN(PIva))) {
      //mostra solo Ragione Sociale
      $("#personaFisica").hide("fast");
      $("#societa").show("fast");
    } else {
      //mostra Nome e Cognome
      $("#personaFisica").show("fast");
      $("#societa").hide("fast");
    }

  }

//scrive il totale della fattura sulla prima riga se questa non è compilata
  function trascriviTotFatt() {
    if (document.getElementById("imponibile[1]").value == "") {
      var totaleFatt = document.getElementById("totFatt").value;
      document.getElementById("imponibile[1]").value = totaleFatt;
    }
  }

//approssima il numero
  function roundNumber(number, digits) {
    var multiple = Math.pow(10, digits);
    var rndedNum = Math.round(number * multiple) / multiple;
    return rndedNum;
  }

</script>
</html>
