<!DOCTYPE html>
<html>
<script>
  <?php
  include "functions.php"
  ?>
</script>
<head>

  <title>
    Acquisti in Cloud
  </title>

  <style>
  @import url(docs.css);
  </style>

 <!-- Icone tabella -->

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" type="image/png" href="/acquistiincloud/images/favicon.png">

</head>
<body class="topmarg">

  <div class="navbar">
    <a class="active" href="docs.php"><strong>Acquisti </strong>in <strong>Cloud</strong></a>
    <a class="reg-right" href="registra.php">Registra</a>
    <a class="reg-right" href="downFIC.php">Scarica fatture da FIC</a>
    <a class="reg-right" href="uploadPDF.php">Carica fatture</a>

    <meta name="viewport" content="width=device-width, initial-scale=1">

  </div>

<div class="widget-box widget-position"><br>
      <h2 style="text-align:left; margin-left:60px; margin-top:20px;">Stato</h2>
      <form style="text-align:left; margin-left:60px;">
      <input type="checkbox" id="daregistrare">Da registrare<br>
      <input type="checkbox" id="nuovo">Nuovo<br>
      <input type="checkbox" id="registrato">Registrato<br>
      <input type="checkbox" id="rifiutato">Rifiutato<br>
      <input type="checkbox" id="contabilizzato">Contabilizzato

        <select name="ditta">
          <?php
            retrieveDitteForDropdown();
          ?>
        </select>
    </div>


  </form>
  </input>
</div>
  <table>
    <tr>
      <th>Ditta</th>
      <th>Data caricamento</th>
      <th>Causale</th>
      <th>Data documento</th>
      <th>Numero fatt.</th>
      <th>Protocollo</th>
      <th>Controparte</th>
      <th>Totale</th>
      <th>Stato</th>
      <th></th>
      <th></th>
    </tr>
    <?php
      creaRigaFatt();
    ?>
  </table>
</div>
</div>
</body>
</html>
