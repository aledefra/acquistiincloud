<!DOCTYPE html>
<html>
<script>
  <?php
    include "functions.php";
  ?>
</script>
<body>

<form action ="<?php uploadPDF(14,array('file.pdf')); ?>" method="post" enctype="multipart/form-data">
    Scegli i file da caricare:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
