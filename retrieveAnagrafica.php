<?php
  include "functions.php";
  if (isset($_GET["piva"])) {
    retrieveAnagraficaFromPIVA();
  } else {
    retrieveAnagraficaFromCF();
  }

?>
