<!DOCTYPE html>
<html>

<style>
@import url(docs.css);
</style>

<head>

  <title>
    Carica fatture
  </title>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script scr="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="index.js"></script>
  <link rel="icon" type="image/png" href="/acquistiincloud/images/favicon.png">

</head>
<script>

  <?php
    include "functions.php";
  ?>
</script>

<body class="topmarg">

  <div class="navbar">
    <a class="active" href="docs.php"><strong>Acquisti </strong>in <strong>Cloud</strong></a>
    <a class="reg-right" href="registra.php">Registra</a>
    <a class="reg-right" href="downFIC.php">Scarica fatture da FIC</a>
    <a class="reg-right" href="uploadPDF.php">Carica fatture</a>

    <meta name="viewport" content="width=device-width, initial-scale=1">

  </div>

<form class="form-div" action ="<?php uploadPDF(); ?>" method="post" enctype="multipart/form-data">
    <label for="file" class="input_label">
      <i class="fa fa-upload"></i>
      <span id="label_span">Scegli i file da caricare</span>
    </label>
      <input type="file" id="file" name="upload[]" multiple="multiple"><br><br><br>
    Ditta: <select name="ditta">
      <?php
        retrieveDitteForDropdown();
      ?>
    </select><br>
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
