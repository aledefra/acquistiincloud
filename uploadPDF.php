<!DOCTYPE html>
<html>
<script>
  <?php
    include "functions.php";
  ?>
</script>
<body>

<form action ="<?php uploadPDF(); ?>" method="post" enctype="multipart/form-data">
    Scegli i file da caricare:
    <input type="file" name="upload[]" multiple="multiple"><br>
    <input type="submit" value="Upload File" name="submit"><br>
    Ditta: <select name="ditta">
      <?php
        retrieveDitteForDropdown();
      ?>
    </select>
</form>

</body>
</html>
