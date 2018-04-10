<!DOCTYPE html>
<html>


<style>
    @import url(acquistiincloud.css);
</style>


<head>


    <title>
        Acquisti in cloud
    </title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="/images/favicon.png">

</head>

<body class="no-skin consultant-docs">






    <div id="navbar" class="navbar navbar-default navbar-fixed-top">


        <div class="navbar-container" id="navbar-container">
            <!-- #sect

            <!-- /section:basics/sidebar.mobile.toggle -->
            <div class="navbar-header pull-left">
                <!-- #section:basics/navbar.layout.brand -->
                <a href="#" class="navbar-brand">
                    <small>
              <i class="fa fa-paper-plane-o"></i>&NonBreakingSpace;
              <!--<i class="fa fa-leaf"></i>-->
              <strong>Acquisti </strong>in <strong>cloud</strong>
            </small>
                </a>

            </div>

        </div>
        <!-- /.navbar-container -->
    </div>

    <div class="main-container" id="main-container">


        <div class="main-content">


            <div class="page-content">
                <div class="page-contet-area">


                    <div id="index_title" class="col-xs-12 filters">


                        <div class="widget-box pull-right">

                            <div class="widget-header">
                                <h4 class="widget-title">
                                    Chiudi
                                </h4>

                                <a href="/consultant/docs?clear=true" data-action="collapse" class="widget-icon-link">
                                    <div class="widget-toolbar">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </div>
                                </a>

                            </div>

                            <div class="widget-body docs">
                                <div class="widget-main">

                                    <div class="row text-right col-sm-12"><a class="btn btn-xs btn-primary reset" href="#" data-disable-with="Attendere...">Reset</a></div>

                                    <form class="doc_search" id="doc_search" action="/consultant/docs" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />

                                        <div class="row" style="">

                                            <div class="col-sm-4 sequence">
                                                <h3>Stato</h3>
                                                <label class="col-sm-10">da elaborare</label>
                                                <input type="checkbox" name="q[stato_eq_any][]" id="q_stato_eq_any_" value="-1" class="col-sm-2 checkbox" checked="checked" />
                                                <br />
                                                <label class="col-sm-10">in attesa</label>
                                                <input type="checkbox" name="q[stato_eq_any][]" id="q_stato_eq_any_" value="1" class="col-sm-2 checkbox" checked="checked" />
                                                <br />
                                                <label class="col-sm-10">da completare</label>
                                                <input type="checkbox" name="q[stato_eq_any][]" id="q_stato_eq_any_" value="0" class="col-sm-2 checkbox" checked="checked" />
                                                <br />
                                                <label class="col-sm-10">approvato</label>
                                                <input type="checkbox" name="q[stato_eq_any][]" id="q_stato_eq_any_" value="2" class="col-sm-2 checkbox approved" checked="checked" />
                                                <br />
                                                <label class="col-sm-10">respinto</label>
                                                <input type="checkbox" name="q[stato_eq_any][]" id="q_stato_eq_any_" value="3" class="col-sm-2 checkbox" checked="checked" />
                                            </div>

                                            <div class="col-sm-4 sequence">
                                                <h3>Tipo</h3>
                                                <select name="q[typology_code_eq]" id="q_typology_code_eq" style="width: 200px;"><option value="">Tutti</option><option value="T1">Fattura Ricevuta</option>
<option value="T3">Nota di Accredito Ricevuta</option>
<option value="T2">Fattura Emessa</option>
<option value="T4">Nota di Accredito Emessa</option>
<option value="T0">Altro Documento</option>
<option value="T6">Corrispettivi</option>
<option value="T7">Fattura Intra Ricevuta</option>
<option value="T8">Fattura Intra Emessa</option>
<option value="T9">Reverse Charge Ricevuta</option>
<option value="T10">Reverse Charge Emessa</option>
<option value="T5">Ricevuta fiscale</option>
<option value="T11">Corrispettivi a calendario</option>
<option value="T12">Documento senza IVA esposta Ricevuto</option>
<option value="T13">Documento senza IVA esposta Emesso</option></select>
                                            </div>

                                            <div class="col-sm-4 sequence">
                                                <h3>Approvati</h3>
                                                <label class="col-xs-8">registrati</label>
                                                <input type="checkbox" name="q[registered_eq" id="q_registered_eq" value="1" class="col-xs-1 checkbox registered" />
                                                <label class="col-xs-8">archiviati</label>
                                                <input type="checkbox" name="q[archived_eq" id="q_archived_eq" value="1" class="col-xs-1 checkbox archived" />
                                            </div>
                                        </div>

                                        <div class="row filters-row">
                                            <div class="col-sm-6">
                                                <div class="form-group string optional q_customer_company_name_cont"><label class="string optional control-label col-sm-3 control-label" for="q_customer_company_name_cont">ditta</label>
                                                    <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[customer_company_name_cont]" id="q_customer_company_name_cont" /></div>
                                                </div>
                                                <div class="base_types_filters">
                                                    <div class="form-group string optional q_ragione_sociale_cont"><label class="string optional control-label col-sm-3 control-label" for="q_ragione_sociale_cont">controparte</label>
                                                        <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[ragione_sociale_cont]" id="q_ragione_sociale_cont" /></div>
                                                    </div>
                                                    <div class="form-group string optional q_numero_doc_eq"><label class="string optional control-label col-sm-3 control-label" for="q_numero_doc_eq">numero</label>
                                                        <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[numero_doc_eq]" id="q_numero_doc_eq" /></div>
                                                    </div>
                                                    <div class="form-group string optional q_protocollo_eq"><label class="string optional control-label col-sm-3 control-label" for="q_protocollo_eq">protocollo</label>
                                                        <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[protocollo_eq]" id="q_protocollo_eq" /></div>
                                                    </div>
                                                    <div class="form-group string optional q_data_doc_gteq"><label class="string optional control-label col-sm-3 control-label" for="q_data_doc_gteq">Dal</label>
                                                        <div class="col-sm-9"><input class="string optional date-picker form-control input-sm" type="text" name="q[data_doc_gteq]" id="q_data_doc_gteq" /></div>
                                                    </div>
                                                    <div class="form-group string optional q_data_doc_lteq"><label class="string optional control-label col-sm-3 control-label" for="q_data_doc_lteq">Al</label>
                                                        <div class="col-sm-9"><input class="string optional date-picker form-control input-sm" type="text" name="q[data_doc_lteq]" id="q_data_doc_lteq" /></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 base_types_filters">
                                                <div class="form-group string optional q_sectional_code_cont"><label class="string optional control-label col-sm-3 control-label" for="q_sectional_code_cont">sezionale</label>
                                                    <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[sectional_code_cont]" id="q_sectional_code_cont" /></div>
                                                </div>

                                                <div class="form-group string optional q_doc_accounts_account_name_or_doc_accounts_account_description_or_doc_accounts_account_extension_code_cont"><label class="string optional control-label col-sm-3 control-label" for="q_doc_accounts_account_name_or_doc_accounts_account_description_or_doc_accounts_account_extension_code_cont">conto</label>
                                                    <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[doc_accounts_account_name_or_doc_accounts_account_description_or_doc_accounts_account_extension_code_cont]" id="q_doc_accounts_account_name_or_doc_accounts_account_description_or_doc_accounts_account_extension_code_cont"
                                                        /></div>
                                                </div>

                                                <div class="form-group string optional q_totale_confermato_gteq"><label class="string optional control-label col-sm-3 control-label" for="q_totale_confermato_gteq">Totale da</label>
                                                    <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[totale_confermato_gteq]" id="q_totale_confermato_gteq" /></div>
                                                </div>
                                                <div class="form-group string optional q_totale_confermato_lteq"><label class="string optional control-label col-sm-3 control-label" for="q_totale_confermato_lteq">Totale fino a</label>
                                                    <div class="col-sm-9"><input class="string optional form-control input-sm" type="text" name="q[totale_confermato_lteq]" id="q_totale_confermato_lteq" /></div>
                                                </div>
                                                <div class="form-group select optional q_more_info_kind_id_eq"><label class="select optional control-label col-sm-3 control-label" for="q_more_info_kind_id_eq">tipo memo</label>
                                                    <div class="col-sm-9"><select class="select optional form-control input-sm" name="q[more_info_kind_id_eq]" id="q_more_info_kind_id_eq"><option value="">Tutti</option>
<option value="66">prova</option>
<option value="91">Margine</option>
<option value="92">Mista</option>
<option value="159">Cespiti</option>
<option value="160">Pubblicità</option></select></div>
                                                </div>


                                                <p class="col-sm-12">
                                                    <br />
                                                    <input type="checkbox" name="q[only_mine]" id="q_only_mine" value="-1" class="checkbox" />
                                                    <label for="q_only_mine">Mostra solo i miei</label>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="row filters-row">


                                        </div>

                                        <div class="col-sm-12 text-right">
                                            <div class="actions">
                                                <input type="submit" name="commit" value="Cerca" class="btn btn-warning" data-disable-with="Attendere..." />

                                            </div>
                                        </div>

                                </div>

                                </form>

                            </div>
                        </div>


                        <script>
                            $(document).ready(function() {
                                $("a.widget-icon-link").click(function() {
                                    if ($(this).find(".ace-icon").hasClass("fa-chevron-down")) {
                                        $("h4.widget-title").html("Chiudi");
                                    } else {
                                        $("h4.widget-title").html("Filtri");
                                        $("div.filters input[type='text']").val("");
                                        $("div.filters input[type='checkbox']").prop('checked', true);
                                        window.location.replace("/consultant/docs?clear=true");
                                    }
                                });

                                $("#q_typology_code_eq").val("");


                                // Show/Hide filter fields based on document type
                                manageTypologyFilters();
                                $("#q_typology_code_eq").change(function() {
                                    manageTypologyFilters();
                                });

                                manageApproved();
                                $("input.approved").change(function() {
                                    manageApproved();
                                });


                            });

                            function manageApproved() {
                                // abilito le check dei documenti registrati/archiviati solo se sono selezionati quelli approvati
                                if ($("input.approved").is(":checked")) {
                                    $("input.registered").removeAttr("disabled");
                                    $("input.archived").removeAttr("disabled");
                                } else {
                                    $("input.registered").removeAttr("checked");
                                    $("input.archived").removeAttr("checked");
                                    $("input.registered").attr("disabled", "disabled");
                                    $("input.archived").attr("disabled", "disabled");
                                }
                            }

                            function manageTypologyFilters() {
                                if ($("#q_typology_code_eq").val() == "T0") {
                                    $(".base_types_filters input").val("");
                                    $(".base_types_filters div").hide();
                                    $(".other_types_filters").show();
                                } else {
                                    $(".other_types_filters input").val("");
                                    $(".other_types_filters").hide();
                                    $(".base_types_filters div").show();
                                }
                            }


                            $("a.reset").click(function() {
                                window.location.replace("/consultant/docs?clear=true");
                            });
                        </script>
                    </div>



                    <div class="page-header">
                        <h1>
                            <small>
      Documenti
      <i class="ace-icon fa fa-angle-double-right"></i>
      tutti
    </small>
                        </h1>
                    </div>

                    <div class="js-docs-index">
                        <div class="row">

                            <div class="col-xs-12">

                                <table id="sample-table-1" class="table table-striped table-bordered table-hover table-cardtable">
                                    <thead>
                                        <tr>

                                            <th class="center">
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=customer_company_name+asc">Ditta</a>
                                            </th>

                                            <th class="center">
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=created_at+desc">Data Caricamento</a>
                                            </th>

                                            <th class="center">
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=data_doc+asc">Data Doc</a>
                                            </th>

                                            <th class="center">
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=ragione_sociale+asc">Controparte</a>
                                            </th>

                                            <th class="center">
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=padded_numero_doc+asc">Numero</a>
                                            </th>

                                            <th class="center">
                                                Protocollo
                                            </th>

                                            <th class="center">
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=typology_description+asc">Tipo Doc.</a>
                                            </th>

                                            <th class="center">
                                                Conto
                                            </th>

                                            <th class="center">
                                                IVA
                                            </th>

                                            <th class="center">
                                                Totale
                                            </th>

                                            <th>
                                                <a class="sort_link" href="/consultant/docs?page=1&amp;q%5Bs%5D=payment_date+asc">Data Scad.</a>
                                            </th>

                                            <th class="center">
                                                Stato
                                            </th>

                                            <th class="center">
                                                Info
                                            </th>

                                            <th class="center">
                                                <!-- -->
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <td style="max-width: 150px; overflow: hidden;">
                                                SPILIMBERGO DENTALE S.R.L.
                                            </td>

                                            <td style="width: 100px;">
                                                26/03/2018
                                            </td>

                                            <td>
                                                22/03/2018
                                            </td>

                                            <td style="max-width: 150px; overflow: hidden;">

                                                PNG SRL
                                            </td>

                                            <td style="width: 100px;">
                                                572
                                            </td>

                                            <td style="width: 100px;">

                                            </td>

                                            <td style="width: 100px;">
                                                Fattura Ricevuta
                                            </td>

                                            <td class="text-center" style="width: 30px;">

                                                <i class="red fa fa-times"></i>

                                            </td>

                                            <td class="text-center" style="width: 30px;">

                                                <i class="red fa fa-times"></i>
                                            </td>

                                            <!--<th class="right" style="text-align:right;">-->
                                            <!---->
                                            <!--</th>-->

                                            <td class="right" style="text-align:right;">
                                                183,00
                                            </td>

                                            <td>

                                            </td>

                                            <td style="width: 150px;">

                                                <span data-toggle="tooltip" data-placement="top" title="Fattura Ricevuta">
          <i class="fa fa-circle doc-status-icon" style="color: #3a87ad"></i> in attesa

        </span>


                                            </td>

                                            <td>
                                                <i class="ace-icon fa fa-info-circle bigger-120" data-toggle="tooltip" data-placement="top" data-html="true" data-title="<div><h4>Totale documento</h4><p>183,00 €</p><hr></hr><h4>Conti usati</h4><p>Non sono presenti conti</p></div>"></i>
                                            </td>

                                            <td style="width: 150px;">

                                                <div style="display: inline-block; min-width: 32px;">

                                                    <a class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" data-title="Modifica" href="/consultant/docs/305865/edit?page=1">
                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                    </a>
                                                </div>


                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="row paginator">
                                <ul class="pagination">


                                    <li class='active'>
                                        <a remote="false">1</a>
                                    </li>

                                    <li>
                                        <a rel="next" href="/consultant/docs?kaminary=true&amp;page=2">2</a>
                                    </li>

                                    <li>
                                        <a href="/consultant/docs?kaminary=true&amp;page=3">3</a>
                                    </li>

                                    <li>
                                        <a href="/consultant/docs?kaminary=true&amp;page=4">4</a>
                                    </li>

                                    <li>
                                        <a href="/consultant/docs?kaminary=true&amp;page=5">5</a>
                                    </li>

                                    <li class='disabled'>
                                        <a>...</a>
                                    </li>
                                    <li>
                                        <a rel="next" href="/consultant/docs?kaminary=true&amp;page=2">Succ &rsaquo;</a>
                                    </li>

                                    <li>
                                        <a href="/consultant/docs?kaminary=true&amp;page=3299">Ultima &raquo;</a>
                                    </li>

                                </ul>

                            </div>

</body>

</html>
