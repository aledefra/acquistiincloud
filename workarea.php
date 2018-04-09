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

          <h3>Dati Generici</h3>

  <form action="">
  Nr. doc: <input name="ndoc" id="ndoc" type="text">
  Data doc: <input name="datadoc" id=" datadoc" type="date">
  <br><br>
  <hr>
  <h3>Fornitore</h3>
  C.F.: <input name="cf" id="cf" type="text">
  P.IVA: <input name="piva" id="piva" type="text">
  <br><br>
  Nome: <input name="nome" id="nome" type="text">
  Cognome: <input name="cognome" id="cognome" type="text">
  Ragione sociale: <input name="ragsoc" id="ragosoc" type="text">
  <br><br>
  Indirizzo: <input name="via" id="via" type="text">
  <input name="nCivico" id="nCivico" type="text" size="6">
  CAP / Città: <input name="cap" id="cap" type="text" size="6">
  <input name="citta" id="citta" type="text">
  Provincia: <input name="provincia" id="provincia" type="text" size="3">
  <br><br>
  <hr>
  <h3>Dati contabili</h3>
  Totale: <input name="totFatt" id="totFatt" type="text">
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
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>
    <tr>
      <td><input name="sottoconto[1]" id="sottoconto[1]" type="text" size="10"></td>
      <td><input name="imponibile[1]" id="imponibile[1]" type="text" size="10"></td>
      <td><input name="iva[1]" id="iva[1]" type="text" size="5"></td>
      <td><input name="iva11[1]" id="iva11[1]" type="text" size="5"></td>
      <td><input name="imposta[1]" id="imposta[1]" type="text" size="10"></td>
    </tr>

  </table>
  <br><br>
<div id="subapprfatt">
<input name"savefatt" id="savefatt" type="submit" value="Salva" >
<input name"apprfatt" id="apprfatt" type="submit" value="Approva" >
</div>

  <script language="Javascript">
function controllaCF()
{
  // Definisco un pattern per il confronto
  var pattern = /^[a-zA-Z]{6}[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{3}[a-zA-Z]$/;

  // creo una variabile per richiamare con facilità il nostro campo di input
  var CodiceFiscale = document.getElementById("cf");

  // utilizzo il metodo search per verificare che il valore inserito nel campo
  // di input rispetti la stringa di verifica (pattern)
  if (CodiceFiscale.value.search(pattern) == -1)
  {
    // In caso di errore stampo un avviso e pulisco il campo...
    alert("Il valore inserito non è un codice fiscale!");
    CodiceFiscale.value = "";
    CodiceFiscale.focus();
  }else{
     // ...in caso contrario stampo un avviso di successo!
     alert("Il codice fiscale è corretto!");
  }
}
var focus = 0,
  blur = 0;
$( "input[name='cf']" )
  .focusout(function() {
    focus++;

  })
function showragsoc()
{
  if (isNaN(document.getElementById("cf")))
  {
    var nome = document.createElement("input");
    nome.setAttribute('type', 'text'  )
  }
}
</script>

  </form>
        </div>
    </div>
</body>
</html>
controllaCF()
