<?php
  include "functions.php";
  if (isset($_GET["piva"])) {
    getAnagraficaFromPIVA();
  } else {
    getAnagraficaFromCF();
  }

?>
