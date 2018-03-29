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
    <input type="file" name="upload[]" multiple="multiple">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
