<?php

define('servername', 'localhost');
define('username', 'root');
define('password', 'root');
define('dbname', 'AIC');
/* PER DEBUG */
ini_set('display_errors', 'On');
error_reporting(E_ALL);


  /*FUNZIONI PER LE STRINGHE*/
  function left($str,$len){
    return substr($str, 0, $len);
  }
  function right($str,$len){
    $len=$len*-1;
    return substr($str, $len);
  }
  function spaces($num){
    return str_repeat(' ', $num);
  }
  function sign($num){
    switch ($num) {
      case '1':
        return "+";
        break;
      case '-1':
        return "-";
        break;
    }
  }
  /* / FUNZIONI PER LE STRINGHE*/

  function creaRigaFatt() {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT fatture.idFatt, fatture.ditta, fatture.controparte, fatture.dataCaric, fatture.causale, fatture.dataFatt, fatture.nFatt, fatture.nProtocollo, fatture.totFatt, fatture.stato, ditte.nomeDitta, controparti.ragSocControp, controparti.nomeControp, controparti.cognControp, controparti.personaFisica
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
          if ($row["personaFisica"]) {
            print("<td>".$row["nomeControp"]." ".$row["cognControp"]."</td>");  /* controparte nome cognome*/
          } else {
            print("<td>".$row["ragSocControp"]."</td>");  /* controparte ragSoc*/
          }
          print("<td>".$row["totFatt"]."€</td>");  /* totale */
          switch ($row["stato"]) {  /* icona di stato */
            case "Da registrare": {
              print("<td class=\"text-center\" style=\"width: 30px;\">");
                print("<i class=\"orange fa fa-circle\"></i> Da registrare");
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
                print("<i class=\"fa fa-circle\" style=\"color: blue;\"></i> Nuovo");
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
                print("<i class=\"green fa fa-check\"></i> Registrato");
              print("</td>");
              print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
                print("<div style=\"display: inline-block; min-width: 32px;\">");
                  print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"/acquistiincloud/workarea.php?idDoc=".$row["idFatt"]."\">");
                    print("<i class=\"ace-icon fa fa-search\"></i>");
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
                    print("<i class=\"ace-icon fa fa-search\"></i>");
                  print("</a>");
                print("</div>");
              print("</td>");
              break;
            }
            case "Contabilizzato": {
              print("<td class=\"text-center\" style=\"width: 30px;\">");
                print("<i class=\"fa fa-archive\"></i> Contabilizzato");
              print("</td>");
              print("<td style=\"width: 50px;\">");  /* icona modifica/visualizza */
                print("<div style=\"display: inline-block; min-width: 32px;\">");
                  print("<a class=\"btn btn-xs btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Modifica\" href=\"/acquistiincloud/workarea.php?idDoc=".$row["idFatt"]."\">");
                    print("<i class=\"ace-icon fa fa-search\"></i>");
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
    $sql = "SELECT * FROM fatture
            JOIN ditte on fatture.ditta = ditte.codiceDitta
            LEFT JOIN controparti on fatture.controparte = controparti.idControp
            LEFT JOIN ditteSez on fatture.sezionale = ditteSez.idSez
            WHERE fatture.ditta = ditte.codiceDitta AND fatture.idFatt = $docID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          print("<iframe src=\"documents/".$row["codiceDitta"]."/".$row["idFatt"].".pdf\"class=\"pdfstyle\"></iframe>");
        }
    } else {
      print("nessun risultato");
    }
    $conn->close();
  }

  function uploadPDF() {
    if (isset($_POST['submit'])) {
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
              VALUES (".$_POST["ditta"].", \"Nuovo\")";
      $result = $conn->query($sql);
      $result = $conn->query("SELECT LAST_INSERT_ID()"); //ottiene l'ID dell'ultima fattura
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            // inserisce il file nella cartella corretta
            if ($file) {
              move_uploaded_file($file, "documents/".$_POST["ditta"]."/".$row["LAST_INSERT_ID()"].".pdf");
            }
          }
      } else {
        print("errore");
      }
    }
    $conn->close();
    header("location: /acquistiincloud/docs.php");
    }
  }

  function retrieveDitteForDropdown() {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT nomeDitta, codiceDitta
            FROM ditte";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          // inserisce il file nella cartella corretta
          print("<option value=\"".$row["codiceDitta"]."\">".$row["nomeDitta"]."</option>");
        }
    } else {
      print("errore");
    }
    $conn->close();
  }

  function registraFatt() {

    if (isset($_POST['submit'])) {
    /* I N S E R I R E
    COME VARIABILE PASSATA A FUNZIONE
    R E G I S T R A  F A T T */
    $dataReg = "31/01/2018";


    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM fatture
            JOIN ditte on fatture.ditta = ditte.codiceDitta
            JOIN controparti on fatture.controparte = controparti.idControp
            JOIN ditteSez on fatture.sezionale = ditteSez.idSez
            WHERE fatture.stato = \"Registrato\"
            ORDER BY dataFatt";
    $result = $conn->query($sql);
    $TRAF2000 = "";
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $TRAF2000 .= right("00000".$row["ditta"],5);
        $TRAF2000 .= "30";
        //D A T I  C L I F O R
        $TRAF2000 .= "00000";
        if ($row["personaFisica"]) {
          $TRAF2000 .= left($row["cognControp"]." ".$row["nomeControp"].spaces(32),32);
        } else {
          $TRAF2000 .= left($row["ragSocControp"].spaces(32),32);
        }
        $TRAF2000 .= left($row["via"]." ".$row["nCivico"].spaces(30),30);
        $TRAF2000 .= left($row["CAP"].spaces(5),5);
        $TRAF2000 .= left($row["città"].spaces(25),25);
        $TRAF2000 .= left($row["prov"].spaces(2),2);
        $TRAF2000 .= left($row["codFisc"].spaces(16),16);
        $TRAF2000 .= left($row["pIva"].spaces(11),11);
        if ($row["personaFisica"]) {
          $TRAF2000 .= "S";
          $TRAF2000 .= right("00".strlen($row["cognome"])+1,2);
        } else {
          $TRAF2000 .= "N";
          $TRAF2000 .= "00";
        }
        $TRAF2000 .= spaces(131);
        //D A T I  F A T T U R A
        $TRAF2000 .= right("000".$row["causale"],3);
        $TRAF2000 .= spaces(101);
          $sqlDate = strtotime($dataReg);         /*  rende il formato  */
          $formatDate = date("dmY", $sqlDate);   /*della data richiesto*/
        $TRAF2000 .= $formatDate;
          $sqlDate = strtotime($row["dataFatt"]); /*  rende il formato  */
          $formatDate = date("dmY", $sqlDate);   /*della data richiesto*/
        $TRAF2000 .= $formatDate;
        $TRAF2000 .= left($row["nFatt"].spaces(8),8);
          $protocollo = $row["ultimoProt"] + 1;
          $sql = "UPDATE fatture
                  SET nProtocollo = ".$protocollo."
                  WHERE idFatt = ".$row["idFatt"];
          $conn->query($sql); //assegna il protocollo alla fattura
          $sql = "UPDATE ditteSez
                  SET ultimoProt = ".$protocollo."
                  WHERE idSez = ".$row["idSez"];
          $conn->query($sql); //aggiorna l'ultimo protocollo del sez.
        $TRAF2000 .= right(str_repeat('0',5).$protocollo,5);
        $TRAF2000 .= right(str_repeat('0',2).$row["codSezionale"],2);
        $TRAF2000 .= spaces(72);
        //D A T I  I V A
        for ($i = 1; $i <= 8; $i++) { //crea una riga per ognuna delle 8 righe di fatture
          if ($row["imponibile[$i]"]) {
            $TRAF2000 .= right("00000000000".abs($row["imponibile[$i]"] * 100),11);
            $TRAF2000 .= sign($row["imponibile[$i]"]);
            $TRAF2000 .= right("000".$row["aliquota_iva[$i]"],3);
            $TRAF2000 .= spaces(3);
            $TRAF2000 .= right("00".$row["iva11[$i]"],2);
            $TRAF2000 .= right("00000000000".abs($row["imposta[$i]"] * 100),11);
            $TRAF2000 .= sign($row["imposta[$i]"]);
          } else {
            $TRAF2000 .= spaces(31);
          }
        }
        //T O T A L E  F A T T U R A
        $TRAF2000 .= right("000000000000".abs($row["totFatt"] * 100),12);
        //C O N T I  C O S T O / R I C A V O
        for ($i = 1; $i <= 8; $i++) { //crea una riga per ognuna delle 8 righe di fatture
          if ($row["conto[$i]"]) {
            $TRAF2000 .= right("0000000".$row["conto[$i]"],7);
            $TRAF2000 .= right("000000000000".abs($row["importo_conto[$i]"] * 100),12);
          } else {
            $TRAF2000 .= spaces(19);
          }
        }
        $TRAF2000 .= "\n";
        $sql = "UPDATE fatture
                SET stato = \"Contabilizzato\"
                WHERE idFatt = ".$row["idFatt"];
        $conn->query($sql); //modifica lo stato della fattura
      }
    } else {
      print("Nessun documento da contabilizzare");
    }
    $file = fopen("TRAF2000", "w");
    fwrite($file, $TRAF2000);
    fclose($file);
    $conn->close();
    }
  }

  function downloadFromFIC() {
    if (isset($_POST['submit'])) {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM ditte WHERE codiceDitta = ".$_POST["ditta"];
    $resultSQL = $conn->query($sql);
    if ($resultSQL->num_rows > 0) {
      // output data of each row
      while($row = $resultSQL->fetch_assoc()) {
        if ($row["apiUid"]) {
          $url = "https://api.fattureincloud.it/v1/acquisti/lista";
           $request = array("api_uid" => $row["apiUid"], "api_key" => $row["apiKey"], "anno" => "2018", "mostra_link_allegato" => "true");
           $options = array(
               "http" => array(
                   "header"  => "Content-type: text/json\r\n",
                   "method"  => "POST",
                   "content" => json_encode($request)
               ),
           );
           $context  = stream_context_create($options);
           $resultJSON = json_decode(file_get_contents($url, false, $context), true);
           print($resultJSON);
           if ($resultJSON["success"]) {
             //filtra i documenti prelevati
             $fatture = array_filter($resultJSON["lista_documenti"]);
             foreach ($fatture as $doc) {
               // Inserisce una nuova riga per fattura nel DB
               $sql = "INSERT INTO fatture (ditta, stato, dataFatt, totFatt, idFIC)
                       SELECT * FROM (SELECT ".$_POST["ditta"].", \"Nuovo\", STR_TO_DATE(\"".$doc['data']."\", \"%d/%m/%Y\"), ".$doc["importo_totale"].", ".$doc["id"].") AS tmp
                       WHERE NOT EXISTS (
                         SELECT idFIC FROM fatture WHERE idFIC = ".$doc["id"]."
                       )";
               $result = $conn->query($sql);
               if (mysqli_affected_rows($conn)) {
                 $result = $conn->query("SELECT LAST_INSERT_ID()"); //ottiene l'ID dell'ultima fattura
                 if ($result->num_rows > 0) {
                     // output data of each row
                     while($row = $result->fetch_assoc()) {
                       // inserisce il file nella cartella corretta
                       copy($doc["link_allegato"], "documents/".$_POST["ditta"]."/".$row["LAST_INSERT_ID()"].".pdf");
                     }
                 } else {
                   print("errore");
                 }
               }
             }
           }
        }
      }
    } else {
      print("errore");
    }
    $conn->close();
    header("location: /acquistiincloud/docs.php");
   }
  }

  function loadWorkArea($docID) {
    // Create connection
    $conn = new mysqli(servername, username, password, dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM fatture
            JOIN ditte on fatture.ditta = ditte.codiceDitta
            LEFT JOIN controparti on fatture.controparte = controparti.idControp
            LEFT JOIN ditteSez on fatture.sezionale = ditteSez.idSez
            WHERE fatture.idFatt = $docID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          error_log($row["ragSocControp"]);
          echo("
          <div class=\"div-fatt\">
            <div class=\"div-pdffatt\">
              <iframe src=\"documents/".$row["codiceDitta"]."/".$row["idFatt"].".pdf\"class=\"pdfstyle\"></iframe>
            </div>
            <div class=\"div-datifatt\">
              <form action=\"\">
<h3>Dati Generici</h3>
Nr. doc: <input name=\"ndoc\" id=\"ndoc\" type=\"text\" placeholder=\"Numero documento\" value=\"".$row["nFatt"]."\">
Data doc: <input name=\"datadoc\" id=\" datadoc\" type=\"date\" placeholder=\"Data documento\" value=".$row["dataFatt"].">
<br><br>
<hr>
<h3>Fornitore</h3>
<input name=\"persFis\" id=\"persFis\" type=\"hidden\" value=".$row["personaFisica"].">
C.F.: <input name=\"cf\" id=\"cf\" type=\"text\" placeholder=\"Codice Fiscale\" value=\"".$row["codFisc"]."\">
P.IVA: <input name=\"piva\" id=\"piva\" type=\"text\" placeholder=\"Partita IVA\" value=\"".$row["pIva"]."\">
<br><br>
<div id=\"personaFisica\" class=\"div-inline\">
  Nome: <input name=\"nome\" id=\"nome\" type=\"text\" placeholder=\"Nome\" value=\"".$row["nomeControp"]."\">
  Cognome: <input name=\"cognome\" id=\"cognome\" type=\"text\" placeholder=\"Cognome\" value=\"".$row["cognControp"]."\">
</div>
<div id=\"societa\" class=\"div-inline\">
  Ragione sociale: <input name=\"ragsoc\" id=\"ragsoc\" type=\"text\" placeholder=\"Ragione Sociale\" size=33 value=\"".$row["ragSocControp"]."\">
</div>
<br><br>
Indirizzo: <input name=\"via\" id=\"via\" type=\"text\" placeholder=\"Indirizzo\" value=\"".$row["via"]."\">
<input name=\"nCivico\" id=\"nCivico\" type=\"text\" size=\"6\" placeholder=\"Civico\" value=\"".$row["nCivico"]."\">
CAP / Città: <input name=\"cap\" id=\"cap\" type=\"text\" size=\"6\" placeholder=\"CAP\" value=\"".$row["CAP"]."\">
<input name=\"citta\" id=\"citta\" type=\"text\" placeholder=\"Città\" value=\"".$row["città"]."\">
Provincia: <input name=\"provincia\" id=\"provincia\" type=\"text\" size=\"3\" placeholder=\"Provincia\" value=\"".$row["prov"]."\">
<br><br>
<hr>
<h3>Dati contabili</h3>
Totale: <input name=\"totFatt\" id=\"totFatt\" type=\"text\" onfocusout=\"trascriviTotFatt()\" placeholder=\"Importo totale\" value=\"".$row["totFatt"]."\">
Ritenuta d'acconto: <input name=\"ritAcc\" id=\"ritAcc\" type=\"text\" placeholder=\"Ritenuta d'acconto\" value=\"".$row["importo_rit"]."\">
<br><br>
Causale: <input name=\"causale\" id=\"causale\" type=\"text\" size=\"4\" placeholder=\"Caus.\" value=\"".$row["causale"]."\">
Sezionale: <input name=\"sezionale\" id=\"sezionale\" type=\"text\" size=\"4\" placeholder=\"Sez.\" value=\"".$row["codSezionale"]."\">
<br><br>
<table>
  <tr>
    <th>Sottoconto</th>
    <th>Imponibile</th>
    <th>IVA</th>
    <th>IVA11</th>
    <th>Imposta</th>
    <th></th>
  </tr>
  <tr>
    <td><input name=\"sottoconto[1]\" id=\"sottoconto[1]\" type=\"text\" size=\"10\" value=\"".$row["conto[1]"]."\"></td>
    <td><input name=\"imponibile[1]\" id=\"imponibile[1]\" type=\"text\" size=\"10\" value=\"".$row["imponibile[1]"]."\"></td>
    <td><input name=\"iva[1]\" id=\"iva[1]\" type=\"text\" size=\"5\" value=\"".$row["aliquota_iva[1]"]."\"></td>
    <td><input name=\"iva11[1]\" id=\"iva11[1]\" type=\"text\" size=\"5\" value=\"".$row["iva11[1]"]."\"></td>
    <td><input name=\"imposta[1]\" id=\"imposta[1]\" type=\"text\" size=\"10\" value=\"".$row["imposta[1]"]."\"></td>
    <td style=\"width: 35px;\">
      <div style=\"display: inline-block; min-width: 32px;\" id=\"S[1]\">
        <a class=\"btn\"data-toggle=\"tooltip\" data-placement=\"top\">
          <i>S</i>
        </a>
      </div>
    </td>
  </tr>
  <tr>
    <td><input name=\"sottoconto[2]\" id=\"sottoconto[2]\" type=\"text\" size=\"10\" value=\"".$row["conto[2]"]."\"></td>
    <td><input name=\"imponibile[2]\" id=\"imponibile[2]\" type=\"text\" size=\"10\" value=\"".$row["imponibile[2]"]."\"></td>
    <td><input name=\"iva[2]\" id=\"iva[2]\" type=\"text\" size=\"5\" value=\"".$row["aliquota_iva[2]"]."\"></td>
    <td><input name=\"iva11[2]\" id=\"iva11[2]\" type=\"text\" size=\"5\" value=\"".$row["iva11[2]"]."\"></td>
    <td><input name=\"imposta[2]\" id=\"imposta[2]\" type=\"text\" size=\"10\" value=\"".$row["imposta[2]"]."\"></td>
    <td style=\"width: 35px;\">
      <div style=\"display: inline-block; min-width: 32px;\" id=\"S[2]\">
        <a class=\"btn\" data-toggle=\"tooltip\" data-placement=\"top\">
          <i>S</i>
        </a>
      </div>
    </td>
  </tr>
  <tr>
    <td><input name=\"sottoconto[3]\" id=\"sottoconto[3]\" type=\"text\" size=\"10\" value=\"".$row["conto[3]"]."\"></td>
    <td><input name=\"imponibile[3]\" id=\"imponibile[3]\" type=\"text\" size=\"10\" value=\"".$row["imponibile[3]"]."\"></td>
    <td><input name=\"iva[3]\" id=\"iva[3]\" type=\"text\" size=\"5\" value=\"".$row["aliquota_iva[3]"]."\"></td>
    <td><input name=\"iva11[3]\" id=\"iva11[3]\" type=\"text\" size=\"5\" value=\"".$row["iva11[3]"]."\"></td>
    <td><input name=\"imposta[3]\" id=\"imposta[3]\" type=\"text\" size=\"10\" value=\"".$row["imposta[3]"]."\"></td>
    <td style=\"width: 35px;\">
      <div style=\"display: inline-block; min-width: 32px;\" id=\"S[3]\">
        <a class=\"btn\" data-toggle=\"tooltip\" data-placement=\"top\">
          <i>S</i>
        </a>
      </div>
    </td>
  </tr>
  <tr>
    <td><input name=\"sottoconto[4]\" id=\"sottoconto[4]\" type=\"text\" size=\"10\" value=\"".$row["conto[4]"]."\"></td>
    <td><input name=\"imponibile[4]\" id=\"imponibile[4]\" type=\"text\" size=\"10\" value=\"".$row["imponibile[4]"]."\"></td>
    <td><input name=\"iva[4]\" id=\"iva[4]\" type=\"text\" size=\"5\" value=\"".$row["aliquota_iva[4]"]."\"></td>
    <td><input name=\"iva11[4]\" id=\"iva11[4]\" type=\"text\" size=\"5\" value=\"".$row["iva11[4]"]."\"></td>
    <td><input name=\"imposta[4]\" id=\"imposta[4]\" type=\"text\" size=\"10\" value=\"".$row["imposta[4]"]."\"></td>
    <td style=\"width: 35px;\">
      <div style=\"display: inline-block; min-width: 32px;\" id=\"S[4]\">
        <a class=\"btn\" data-toggle=\"tooltip\" data-placement=\"top\">
          <i>S</i>
        </a>
      </div>
    </td>
  </tr>
  <tr>
    <td><input name=\"sottoconto[5]\" id=\"sottoconto[5]\" type=\"text\" size=\"10\" value=\"".$row["conto[5]"]."\"></td>
    <td><input name=\"imponibile[5]\" id=\"imponibile[5]\" type=\"text\" size=\"10\" value=\"".$row["imponibile[5]"]."\"></td>
    <td><input name=\"iva[5]\" id=\"iva[5]\" type=\"text\" size=\"5\" value=\"".$row["aliquota_iva[5]"]."\"></td>
    <td><input name=\"iva11[5]\" id=\"iva11[5]\" type=\"text\" size=\"5\" value=\"".$row["iva11[5]"]."\"></td>
    <td><input name=\"imposta[5]\" id=\"imposta[5]\" type=\"text\" size=\"10\" value=\"".$row["imposta[5]"]."\"></td>
    <td style=\"width: 35px;\">
      <div style=\"display: inline-block; min-width: 32px;\" id=\"S[5]\">
        <a class=\"btn\" data-toggle=\"tooltip\" data-placement=\"top\">
          <i>S</i>
        </a>
      </div>
    </td>
  </tr>
</table>
<br><br>
<div id=\"subapprfatt\">
  <input name\"savefatt\" id=\"savefatt\" type=\"submit\" value=\"Salva\">
  <input name\"apprfatt\" id=\"apprfatt\" type=\"submit\" value=\"Approva\">
</div>
</form>
</div>
</div>
");
}
    } else {
      print("nessun risultato");
    }
    $conn->close();



  }




?>
