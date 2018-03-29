<!DOCTYPE html>
<html>
<script>
  <?php
  include "functions.php"
  ?>
</script>
<head>

  <title>
    Acquisti in Cloud
  </title>

  <style>
  @import url(docs.css);
  </style>

 <!-- Icone tabella -->

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="icon" type="image/png" href="/images/favicon.png">

  <div class="navbar">
    <a class="active"><strong>Acquisti </strong>in <strong>Cloud</strong></a>
    <a class="reg-right" href="#">Registra</a>
    <a class="reg-right" href="#">Scarica fatture da FIC</a>
    <a class="reg-right" href="#">Carica fatture</a>

    <meta name="viewport" content="width=device-width, initial-scale=1">

  </div>

</head>
<body>

  <table>
    <tr>
      <th>Ditta</th>
      <th>Data caricamento</th>
      <th>Causale</th>
      <th>Data documento</th>
      <th>Numero fatt.</th>
      <th>Protocollo</th>
      <th>Controparte</th>
      <th>Totale</th>
      <th>Stato</th>
      <th></th>
    </tr>

  <!-- riga 1 -->
<!--
    <tr>
      <td>Centro Dentale</td>
      <td>27/03/2018</td>
      <td>01/03/2018</td>
      <td>Atena</td>
      <td>01</td>
      <td>01</td>
      <td>Fattura ricevuta</td>
      <td>100,00€</td>
      <td class="text-center" style="width: 30px;">
          <i class="green fa fa-check"></i>
      </td>
      <td>Ricevuta</td>
      <td style="width: 50px;">

            <div style="display: inline-block; min-width: 32px;">

                <a class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" data-title="Modifica" href="#">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                </a>
            </div>


        </td>
    </tr>
-->
    <!-- riga 2 -->
<!--
    <tr>
      <td>Centro Dentale</td>
      <td>27/03/2018</td>
      <td>01/03/2018</td>
      <td>Atena</td>
      <td>01</td>
      <td>01</td>
      <td>Fattura ricevuta</td>
      <td>100,00€</td>
      <td class="text-center" style="width: 30px;">
        <i class="fa fa-circle doc-status-icon" style="color: #f89406"></i>
      </td>
      <td>In attesa</td>
      <td style="width: 50px;">
            <div style="display: inline-block; min-width: 32px;">
                <a class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" data-title="Modifica" href="#">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                </a>
            </div>
        </td>
    </tr>
-->
    <!--riga 3-->
<!--
    <tr>
      <td>Centro Dentale</td>
      <td>27/03/2018</td>
      <td>01/03/2018</td>
      <td>Atena</td>
      <td>01</td>
      <td>01</td>
      <td>Fattura ricevuta</td>
      <td>100,00€</td>
      <td class="text-center" style="width: 30px;">
          <i class="red fa fa-times"></i>
      </td>
      <td>Da completare</td>
      <td style="width: 50px;">
            <div style="display: inline-block; min-width: 32px;">
                <a class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" data-title="Modifica" href="#">
                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                </a>
            </div>


        </td>
    </tr>
-->
    <?php
      creaRigaFatt()
    ?>

  </table>
</body>
</html>
