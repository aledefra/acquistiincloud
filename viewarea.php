<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/iziModal.js"></script>
  <script src="js/iziModal.min.js"></script>
  <style>
  @import url(docs.css);
  @import url(css/iziModal.css);
  </style>
  <script src="index.js"></script>
  <link rel="icon" type="image/png" href="/acquistiincloud/images/favicon.png">

</head>
<script>
<?php
  include "functions.php";
?>
</script>
<body>
  <?php
    loadViewArea($_GET['idDoc']);
  ?>
  <?php
    if (isset($_GET['error'])) {
      print("<script>alert(\"".$_GET['error']."\");</script>");
    }
  ?>

  <div id="popupSez" data-izimodal-group="grupo1" data-izimodal-fullscreen="true" aria-hidden="false" aria-labelledby="modal-large" role="dialog" class="iziModal hasScroll hasShadow isAttached overlay" style="z-index: 999; border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-width: 3px; border-bottom-style: solid; border-bottom-color: rgb(136, 160, 185); overflow: hidden; max-width: 700px; display: block; height: 40vh;">
  <div class="iziModal-header iziModal-noSubtitle" style="background-color: rgb(136, 160, 185); padding-right: 70px; background-position: initial initial; background-repeat: initial initial;">
    <i class="iziModal-header-icon icon-chat" style="color: white;"></i>
    <h2 class="iziModal-header-title">Sezionali</h2>
    <p class="iziModal-header-subtitle"></p>
    <div class="iziModal-header-buttons">
      <a href="#" class="iziModal-button iziModal-button-close" data-izimodal-close=""></a>
    </div>
  </div>
  <div class="iziModal-wrap" style="height: 35vh;">
    <div class="iziModal-content" style="padding: 20px;">
      <table id="tableSezionali">
      <tr>
        <th>Codice</th>
        <th>Descrizione</th>
        <th></th>
      </tr>
        <?php
          sezionaliToTable($_GET["ditta"]);
        ?>
      </table>
      </div>
    </div>
  </div>

  <div id="popupIva" data-izimodal-group="grupo1" data-izimodal-fullscreen="true" aria-hidden="false" aria-labelledby="modal-large" role="dialog" class="iziModal hasScroll hasShadow isAttached overlay" style="z-index: 999; border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-width: 3px; border-bottom-style: solid; border-bottom-color: rgb(136, 160, 185); overflow: hidden; max-width: 700px; display: block; height: 80vh;">
  <div class="iziModal-header iziModal-noSubtitle" style="background-color: rgb(136, 160, 185); padding-right: 70px; background-position: initial initial; background-repeat: initial initial;">
    <i class="iziModal-header-icon icon-chat" style="color: white;"></i>
    <h2 class="iziModal-header-title">Codici IVA</h2>
    <p class="iziModal-header-subtitle"></p>
    <div class="iziModal-header-buttons">
      <a href="#" class="iziModal-button iziModal-button-close" data-izimodal-close=""></a>
    </div>
  </div>
  <div class="iziModal-wrap" style="height: 75vh;">
    <div class="iziModal-content" style="padding: 20px; background: #fff;">
      <input type="text" id="filterIVA" placeholder="Cerca l'aliquota IVA" title="Cerca l'aliquota IVA">
      <table id="tableIva">
        <tr>
          <th>Codice</th>
          <th>Descrizione</th>
          <th></th>
        </tr>
          <?php
            IVAToTable();
          ?>
      </table>
      </div>
    </div>
  </div>

  <div id="popupConto" data-izimodal-group="grupo1" data-izimodal-fullscreen="true" aria-hidden="false" aria-labelledby="modal-large" role="dialog" class="iziModal hasScroll hasShadow isAttached overlay" style="z-index: 999; border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-width: 3px; border-bottom-style: solid; border-bottom-color: rgb(136, 160, 185); overflow: hidden; max-width: 700px; display: block; height: 80vh;">
  <div class="iziModal-header iziModal-noSubtitle" style="background-color: rgb(136, 160, 185); padding-right: 70px; background-position: initial initial; background-repeat: initial initial;">
    <i class="iziModal-header-icon icon-chat" style="color: white;"></i>
    <h2 class="iziModal-header-title">Sottoconto</h2>
    <p class="iziModal-header-subtitle"></p>
    <div class="iziModal-header-buttons">
      <a href="#" class="iziModal-button iziModal-button-close" data-izimodal-close=""></a>
    </div>
  </div>
  <div class="iziModal-wrap" style="height: 75vh;">
    <div class="iziModal-content" style="padding: 20px; background: #fff;">
      <input type="text" id="sottoconti" placeholder="Cerca il sottoconto" title="Cerca il sottoconto">
        <table id="tableSottoconti">
        <tr>
          <th>Codice</th>
          <th>Descrizione</th>
          <th></th>
        </tr>
          <?php
            sottocontiToTable();
          ?>
        </table>
      </div>
    </div>
  </div>


</body>
<script>
    $(document).ready(function () { determinaPersFis(); })


//script per visualizzare Rag.Soc. o Nome e cognome
  function determinaPersFis() {
    var codFisc = document.getElementById("cf").textContent;
    var PIva = document.getElementById("piva").textContent;
    if (!(codFisc == "" && PIva == "")) {
      if ((!isNaN(codFisc) && !isNaN(PIva))) {
        //mostra solo Ragione Sociale
        $("#personaFisica").hide("fast");
        $("#societa").show("fast");
        document.getElementById("persFis").value = 0;
      } else {
        //mostra Nome e Cognome
        $("#personaFisica").show("fast");
        $("#societa").hide("fast");
        document.getElementById("persFis").value = 1;
      }
    } else {
      $("#personaFisica").show("fast");
      $("#societa").show("fast");
      document.getElementById("persFis").value = "";
    }
  }

</script>
</html>
