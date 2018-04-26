<!DOCTYPE html>
<html>
<script>
  <?php
  include "functions.php"
  ?>
</script>
<head>

<meta charset="UTF-8">

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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    })
  </script>

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
    <div class="div-filterfull">
      <form>
        <div class="div-filter1">
          <h2>Stato</h2>
          <label class="container">
            <input type="checkbox" id="daregistrare">Da registrare
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="nuovo">Nuovo
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="registrato">Registrato
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="rifiutato">Rifiutato
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="contabilizzato">Contabilizzato
            <span class="checkmark"></span>
          </label>


        </div>
        <div class="div-filter2">
          <form>
          Ditta: <select name="ditta">
            <?php
              retrieveDitteForDropdown();
            ?>
         </select>
         <br><br>
         Controparte:<input type="text" id="controparte" placeholder="Controparte" title="Controparte">

          <br><br>
          Causale
        </form>
        </div>
        <div class="div-filter3">
          <br><br>
          Numero
          <br><br>
          Protocollo
          <br><br>
          Data da
          <br><br>
          Data a
        </div>
      </form>
    </div>
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
<!DOCTYPE html>
<html>
<script>
  <?php
  include "functions.php"
  ?>
</script>
<head>

<meta charset="UTF-8">

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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    })
  </script>

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
    <div class="div-filterfull">
      <form>
        <div class="div-filter1">
          <h2>Stato</h2>
          <label class="container">
            <input type="checkbox" id="daregistrare">Da registrare
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="nuovo">Nuovo
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="registrato">Registrato
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="rifiutato">Rifiutato
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="contabilizzato">Contabilizzato
            <span class="checkmark"></span>
          </label>


        </div>
        <div class="div-filter2">
          <form>
          Ditta: <select name="ditta">
            <?php
              retrieveDitteForDropdown();
            ?>
         </select>
         Controparte: <input type"text">

          <br><br>
          Causale
        </form>
        </div>
        <div class="div-filter3">
          <br><br>
          Numero
          <br><br>
          Protocollo
          <br><br>
          Data da
          <br><br>
          Data a
        </div>
      </form>
    </div>
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
<!DOCTYPE html>
<html>
<script>
  <?php
  include "functions.php"
  ?>
</script>
<head>

<meta charset="UTF-8">

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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        $(".custom-select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".custom-select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    })
  </script>

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
    <div class="div-filterfull">
      <form>
        <div class="div-filter1">
          <h2>Stato</h2>
          <label class="container">
            <input type="checkbox" id="daregistrare">Da registrare
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="nuovo">Nuovo
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="registrato">Registrato
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="rifiutato">Rifiutato
            <span class="checkmark"></span>
          </label>
          <label class="container">
            <input type="checkbox" id="contabilizzato">Contabilizzato
            <span class="checkmark"></span>
          </label>


        </div>
        <div class="div-filter2">
          <form>
          Ditta: <select name="ditta">
            <?php
              retrieveDitteForDropdown();
            ?>
         </select>
         <input type="text" id="controparte" placeholder="Controparte" title="Controparte">

          <br><br>
          Causale
        </form>
        </div>
        <div class="div-filter3">
          <br><br>
          Numero
          <br><br>
          Protocollo
          <br><br>
          Data da
          <br><br>
          Data a
        </div>
      </form>
    </div>
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
