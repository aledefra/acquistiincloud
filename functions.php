<?php

define('servername', 'localhost');
define('username', 'root');
define('password', 'root');
define('dbname', 'AIC');
/* PER DEBUG
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

  function creaRigaFatt() {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT fatture.idFatt, fatture.ditta, fatture.controparte, fatture.dataCaric, fatture.causale, fatture.dataFatt, fatture.nFatt, fatture.nProtocollo, fatture.totFatt, fatture.stato, ditte.nomeDitta, controparti.nomeForn
    FROM fatture
    JOIN ditte on fatture.ditta = ditte.codiceDitta
    LEFT JOIN controparti on fatture.controparte = controparti.idControp
    ORDER BY fatture.idFatt DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          print("<tr>");  /*inizio riga*/
          print("<td>".$row["nomeDitta"]."</td>"); /* ditta */
          if ($row["dataCaric"]) {
            $sqlDate = strtotime($row["dataCaric"]);  /*rende il formato */
            $formatDate = date("d/m/Y", $sqlDate);   /*della data normale*/
            print("<td>".$formatDate."</td>"); /* data caricamento */
          } else {
            print("<td></td>");
          }
          print("<td>".$row["causale"]."</td>"); /* causale documento */
          if ($row["dataFatt"]) {
            $sqlDate = strtotime($row["dataFatt"]);   /*rende il formato */
            $formatDate = date("d/m/Y", $sqlDate);   /*della data normale*/
            print("<td>".$formatDate."</td>"); /* data documento */
          } else {
            print("<td></td>");
          }
          print("<td>".$row["nFatt"]."</td>"); /* numero fattura */
          print("<td>".$row["nProtocollo"]."</td>"); /* protocollo */
          print("<td>".$row["nomeForn"]."</td>");  /* controparte */
          print("<td>".$row["totFatt"]."€</td>");  /* totale */
          switch ($row["stato"]) {  /* icona di stato */
            case "Da registrare": {
              print("<td class=\"text-center\" style=\"width: 30px;\">");
                print("<i class=\"red fa fa-times\"></i> Da registrare");
              print("</td>");
              print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
                print("<div style=\"display: inline-block; min-width: 32px;\">");
                  print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"/acquistiincloud/workarea.php?idDoc=".$row["idFatt"]."\">");
                    print("<i class=\"ace-icon fa fa-pencil bigger-120\"></i>");
                  print("</a>");
                print("</div>");
              print("</td>");
              break;
            }
            case "Nuovo": {
              print("<td class=\"text-center\" style=\"width: 30px;\">");
                print("<i class=\"red fa fa-times\"></i> Nuovo");
              print("</td>");
              print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
                print("<div style=\"display: inline-block; min-width: 32px;\">");
                  print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"/acquistiincloud/workarea.php?idDoc=".$row["idFatt"]."\">");
                    print("<i class=\"ace-icon fa fa-pencil bigger-120\"></i>");
                  print("</a>");
                print("</div>");
              print("</td>");
              break;
            }
            case "Registrato": {
              print("<td class=\"text-center\" style=\"width: 30px;\">");
                print("<i class=\"red fa fa-times\"></i> Registrato");
              print("</td>");
              print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
                print("<div style=\"display: inline-block; min-width: 32px;\">");
                  print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"/acquistiincloud/workarea.php?idDoc=".$row["idFatt"]."\">");
                    print("<i class=\"ace-icon fa fa-pencil bigger-120\"></i>");
                  print("</a>");
                print("</div>");
              print("</td>");
              break;
            }
            case "Rifiutato": {
              print("<td class=\"text-center\" style=\"width: 30px;\">");
                print("<i class=\"red fa fa-times\"></i> Rifiutato");
              print("</td>");
              print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
                print("<div style=\"display: inline-block; min-width: 32px;\">");
                  print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"/acquistiincloud/workarea.php?idDoc=".$row["idFatt"]."\">");
                    print("<i class=\"ace-icon fa fa-pencil bigger-120\"></i>");
                  print("</a>");
                print("</div>");
              print("</td>");
              break;
            }
          }
          print("</tr>");
        }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function loadPDF($docID) {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT fatture.idFatt, ditte.codiceDitta
        FROM fatture, ditte
        WHERE fatture.ditta = ditte.codiceDitta AND fatture.idFatt = $docID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          print("<iframe src=\"documents/".$row["codiceDitta"]."/".$row["idFatt"].".pdf\" style=\"width:50%; height:100%\"></iframe>");
        }
    } else {
      print("nessun risultato");
    }

  }

  function uploadPDF() {
    if ($_POST["submit"]) {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //filtra i file prelevati
    $files = array_filter($_FILES['upload']['tmp_name']);

    foreach ($files as $file) {
      // Inserisce una nuova riga per fattura nel DB
      $sql = "INSERT INTO fatture (ditta, stato)
              VALUES (14, \"Nuovo\")";
      $result = $conn->query($sql);
      $result = $conn->query("SELECT LAST_INSERT_ID()"); //ottiene l'ID dell'ultima fattura
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            // inserisce il file nella cartella corretta
            if ($file) {
              move_uploaded_file($file, "documents/14/".$row["LAST_INSERT_ID()"].".pdf");
            }
          }
      } else {
        print("errore");
      }
    }
    header("location: /acquistiincloud/docs.php");
  }
  }

?>
