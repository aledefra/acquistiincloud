<!DOCTYPE html>
<html>
<script>
<?php
  include "functions.php";
?>
</script>
<style>
@import url(docs.css);
</style>
<head>

<title>
    Modifica documento
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="index.js"></script>
  <link rel="icon" type="image/png" href="/acquistiincloud/images/favicon.png">

</head>
<body>
  <?php
    loadWorkArea($_GET['idDoc']);
  ?>
</body>
<script>
//observer per i campi
  //imponibile e imposta per calcolo residuo fattura
    document.getElementById("imponibile[1]").addEventListener("focusout", residuo);
    document.getElementById("imponibile[2]").addEventListener("focusout", residuo);
    document.getElementById("imponibile[3]").addEventListener("focusout", residuo);
    document.getElementById("imponibile[4]").addEventListener("focusout", residuo);
    document.getElementById("imponibile[5]").addEventListener("focusout", residuo);
    document.getElementById("imposta[1]").addEventListener("focusout", residuo);
    document.getElementById("imposta[2]").addEventListener("focusout", residuo);
    document.getElementById("imposta[3]").addEventListener("focusout", residuo);
    document.getElementById("imposta[4]").addEventListener("focusout", residuo);
    document.getElementById("imposta[5]").addEventListener("focusout", residuo);
  //pulsanti per scorporo
    document.getElementById("S[1]").addEventListener("click", function() { scorpora(1) });
    document.getElementById("S[2]").addEventListener("click", function() { scorpora(2) });
    document.getElementById("S[3]").addEventListener("click", function() { scorpora(3) });
    document.getElementById("S[4]").addEventListener("click", function() { scorpora(4) });
    document.getElementById("S[5]").addEventListener("click", function() { scorpora(5) });
  //codice fiscale e P.IVA per determinare se è persona persona fisica
    document.getElementById("cf").addEventListener("focusout", function() { determinaPersFis(); checkCF() });
    document.getElementById("piva").addEventListener("focusout", function() { determinaPersFis(); checkPIVA() });
  //quando la pagina viene caricata viene determinato se il fornitore è persona fisica
    document.getElementById("body").addEventListener("load", function() { determinaPersFis() });


//script per scorporo IVA per ogni riga
  function scorpora(riga) {
    var totale = document.getElementById("imponibile["+ riga +"]").value;
    var iva = document.getElementById("iva["+ riga +"]").value;
    iva = iva / 100;
    iva += 1;
    var imponibile = totale / iva;
    imponibile = roundNumber(imponibile, 2);
    var imposta = totale - imponibile;
    imposta = roundNumber(imposta, 2);
    document.getElementById("imponibile["+ riga +"]").value = imponibile;
    document.getElementById("imposta["+ riga +"]").value = imposta;
  }

//script per visualizzare Rag.Soc. o Nome e cognome
  function determinaPersFis() {
    var codFisc = document.getElementById("cf").value;
    var PIva = document.getElementById("piva").value;
    if ((!isNaN(codFisc) && !isNaN(PIva))) {
      //mostra solo Ragione Sociale
      $("#personaFisica").hide("fast");
      $("#societa").show("fast");
      document.getElementById("persFis").value = 0;
    } else {
      //mostra Nome e Cognome
      $("#personaFisica").show("fast");
      $("#societa").hide("fast");
      document.getElementById("persFis").value = 1;
    }

  }

//scrive il totale della fattura sulla prima riga se questa non è compilata
  function trascriviTotFatt() {
    if (document.getElementById("imponibile[1]").value == "") {
      var totaleFatt = document.getElementById("totFatt").value;
      document.getElementById("imponibile[1]").value = totaleFatt;
    }
  }

//calcola il residuo della fattura
  function residuo() {
    var totFatt = parseFloat(document.getElementById("totFatt").value);
    if (!isNaN(totFatt)) {
      var imponibile = new Array();
      imponibile[0] = document.getElementById("imponibile[1]");
      imponibile[1] = document.getElementById("imponibile[2]");
      imponibile[2] = document.getElementById("imponibile[3]");
      imponibile[3] = document.getElementById("imponibile[4]");
      imponibile[4] = document.getElementById("imponibile[5]");
      var imposta = new Array();
      imposta[0] = document.getElementById("imposta[1]");
      imposta[1] = document.getElementById("imposta[2]");
      imposta[2] = document.getElementById("imposta[3]");
      imposta[3] = document.getElementById("imposta[4]");
      imposta[4] = document.getElementById("imposta[5]");
      var totaleCalc = 0.00;
      var i;
      var n;
      for (i=0; i <= 4; i++) {
        if (imponibile[i].value == "") {
          for (n=0; n < i; n++) {
            totaleCalc += imponibile[n].value - imposta[n].value;
          }
          var residuo = totFatt - totaleCalc;
          if (residuo != 0.00) {
            imponibile[i].value = roundNumber(residuo, 2);
          }
          break;
          }
        }
      }
    }

//controlla la correttezza del codice fiscale
  function checkCF() {
    var cf = document.getElementById("cf").value;
    var validi, i, s, set1, set2, setpari, setdisp, pos_omocodia, sost_omocodia;
  	if( cf == '' )  return '';
    if (document.getElementById("persFis").value == 1) {
  	cf = cf.toUpperCase();
  	if( cf.length != 16 )
  		alert("La lunghezza del codice fiscale non è\n"
  		+"corretta: il codice fiscale dovrebbe essere lungo\n"
  		+"esattamente 16 caratteri.\n");
  	validi = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  	for( i = 0; i < 16; i++ ){
  		if( validi.indexOf( cf.charAt(i) ) == -1 )
  			alert("Il codice fiscale contiene un carattere non valido `" +
  				cf.charAt(i) +
  				"'.\nI caratteri validi sono le lettere e le cifre.\n");
  	}
  	set1 = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  	set2 = "ABCDEFGHIJABCDEFGHIJKLMNOPQRSTUVWXYZ";
  	setpari = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  	setdisp = "BAKPLCQDREVOSFTGUHMINJWZYX";
  	pos_numeri = [6, 7, 9, 10, 12, 13, 14];
  	pos_lettere = [0, 1, 2, 3, 4, 5, 8, 11, 15];
  	sost_omocodia = {
  		"L": "0",
  		"M": "1",
  		"N": "2",
  		"P": "3",
  		"Q": "4",
  		"R": "5",
  		"S": "6",
  		"T": "7",
  		"U": "8",
  		"V": "9"
  	};
  	for( i = 0; i < pos_numeri.length; i++ ) {
  		var pos = pos_numeri[i];
  		var c = cf.charAt(pos);
  		if(!isNumericChar(c) && sost_omocodia.hasOwnProperty(c)) {
  			cf = replaceCharAt(cf, pos, sost_omocodia[c]);
  		}
  	}
  	for( i = 0; i < pos_numeri.length; i++ ) {
  		if(!isNumericChar(cf.charAt(pos_numeri[i])))
  			alert("Il codice fiscale è formalmente errato.");
  	}
  	for( i = 0; i < pos_lettere.length; i++ ) {
  		if(!isLetterChar(cf.charAt(pos_lettere[i])))
  			alert("Il codice fiscale è formalmente errato.");
  	}
  	s = 0;
  	for( i = 1; i <= 13; i += 2 )
  		s += setpari.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));
  	for( i = 0; i <= 14; i += 2 )
  		s += setdisp.indexOf( set2.charAt( set1.indexOf( cf.charAt(i) )));
  	if( s%26 != cf.charCodeAt(15)-'A'.charCodeAt(0) )
  		alert("Il codice fiscale non è corretto:\n"+
  			"il codice di controllo non corrisponde.\n");
  	return "";
    }
  }

//controlla la correttezza della partita iva
  function checkPIVA() {
    var pi = document.getElementById("piva").value;
    var allowPrefix = false;
    if( pi == '' )  return '';
  	pi = pi.toUpperCase();
  	if( allowPrefix && pi.indexOf("IT")===0 )
  		pi = pi.substring(2);
  	if( pi.length != 11 )
  		alert("La lunghezza della partita IVA non è\n" +
  			"corretta: la partita IVA dovrebbe essere lunga\n" +
  			"esattamente 11 caratteri.\n");
  	validi = "0123456789";
  	for( i = 0; i < 11; i++ ){
  		if( validi.indexOf( pi.charAt(i) ) == -1 )
  			alert("La partita IVA contiene un carattere non valido `" +
  				pi.charAt(i) + "'.\nI caratteri validi sono le cifre.\n");
  	}
  	s = 0;
  	for( i = 0; i <= 9; i += 2 )
  		s += pi.charCodeAt(i) - '0'.charCodeAt(0);
  	for( i = 1; i <= 9; i += 2 ){
  		c = 2*( pi.charCodeAt(i) - '0'.charCodeAt(0) );
  		if( c > 9 )  c = c - 9;
  		s += c;
  	}
  	if( ( 10 - s%10 )%10 != pi.charCodeAt(10) - '0'.charCodeAt(0) )
  		alert("La partita IVA non è valida:\n" +
  			"il codice di controllo non corrisponde.\n");
  	return '';
  }

//approssima il numero
  function roundNumber(number, digits) {
    var multiple = Math.pow(10, digits);
    var rndedNum = Math.round(number * multiple) / multiple;
    return rndedNum;
  }



//funzioni per controllo CF e pIva
function replaceCharAt(s, index, replacement) {
    return s.substr(0, index) + replacement+ s.substr(index + replacement.length);
}

function isNumericChar(c) {
    return (c >= '0' && c <= '9');
}

function isLetterChar(c) {
  return (c >= 'A' && c <= 'Z');
}

function cleanPIVA(cod, allowPrefix) {
  if(!cod) return "";
  var newCod = cod.toUpperCase();
  var prefix = allowPrefix && newCod.indexOf("IT")===0 ? "IT" : "";
  return prefix + newCod.replace(/\D/g,'');
}

function cleanCF(cod, allowPrefix) {
  if(!cod) return "";
  var newCod = cod.toUpperCase();
  var prefix = allowPrefix && newCod.indexOf("IT")===0 ? "IT" : "";
  return prefix + newCod.replace(/\W/g,'');
}


</script>
</html>
