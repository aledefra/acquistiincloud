<?php
  function creaRigaFatt() {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "AIC";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT fatture.*, ditte.nomeDitta, controparti.nome
    FROM fatture, ditte, controparti
    WHERE fatture.ditta = ditte.codiceDitta AND fatture.controparte=controparti.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          print("<tr>");  /*inizio riga*/
          print("<td>".$row["nomeDitta"]."</td>"); /* ditta */
          $sqlDate = strtotime($row["dataCaric"]);  /*rende il formato */
          $formatDate = date("d/m/Y", $sqlDate);   /*della data normale*/
          print("<td>".$formatDate."</td>"); /* data caricamento */
          print("<td>Fattura ricevuta</td>"); /* tipo documento */
          $sqlDate = strtotime($row["dataFatt"]);   /*rende il formato */
          $formatDate = date("d/m/Y", $sqlDate);   /*della data normale*/
          print("<td>".$formatDate."</td>"); /* data documento */
          print("<td>".$row["nFatt"]."</td>"); /* numero fattura */
          print("<td>".$row["nProtocollo"]."</td>"); /* protocollo */
          print("<td>".$row["nome"]."</td>");  /* controparte */
          print("<td>".$row["totFatt"]."€</td>");  /* totale */
          print("<td class=\"text-center\" style=\"width: 30px;\">"); /* icona di stato */
            print("<i class=\"red fa fa-times\"></i> Da completare");
          print("</td>");
          print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
            print("<div style=\"display: inline-block; min-width: 32px;\">");
              print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"#\">");
                print("<i class=\"ace-icon fa fa-pencil bigger-120\"></i>");
              print("</a>");
            print("</div>");
          print("</td>");
          print("</tr>");
        }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

?>
