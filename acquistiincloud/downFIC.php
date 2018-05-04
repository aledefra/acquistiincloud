<!DOCTYPE html>
<html>
<style>
@import url(docs.css);
</style>
<script>
  <?php
    include "functions.php";
  ?>
</script>
<head>

  <meta charset="UTF-8">

  <title>
    Scarica da fatture in cloud
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

  <link rel="icon" type="image/png" href="/acquistiincloud/images/favicon.png">

</head>
<body class="topmarg">


  <form action ="<?php downloadFromFIC(); ?>" method="post" enctype="multipart/form-data">
      Ditta: <select name="ditta">
        <?php
          retrieveDitteForDropdown();
        ?>
      </select><br>
      <input type="submit" value="Download Fatture" name="submit">
  </form>

</body>
</html>