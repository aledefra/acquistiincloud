<!DOCTYPE html>
<html>
<script>
  <?php
    include "functions.php";
  ?>
</script>
<body>

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
