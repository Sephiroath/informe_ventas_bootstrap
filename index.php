<!DOCTYPE html>
<html>
	<head>
			<title>Informe Ventas</title>
			<?php
				include 'head_includes.php';
			?>
	</head>
	<body>
		<?php
			include 'header.php';
		?>
        <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Parametros de selecci&oacute;n</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Organizaci&oacute;n ventas</p>
                </div>
                <div class="col-xs-7 col-lg-7 col-md-7 col-sm-7" >
                    <input type="text" class="form-control" id="txtOrganizacion" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Canal de distribuici&oacute;n</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtCanalInicial" />
                </div>
                <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1" >
                    <p class="text-info text-center">a</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtCanalFinal" />
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Sector</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtSectorInicial" />
                </div>
                <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1" >
                    <p class="text-info text-center">a</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtSectorFinal" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Fecha Factura</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtFechaFactInicial" />
                </div>
                <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1" >
                    <p class="text-info text-center">a</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtFechaFactFinal" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Factura</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtFactInicial" />
                </div>
                <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1" >
                    <p class="text-info text-center">a</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtFactFinal" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Solicitante</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtSolicitanteInicial" />
                </div>
                <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1" >
                    <p class="text-info text-center">a</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtSolicitanteFinal" />
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-lg-5 col-md-5 col-sm-5" >
                    <p class="text-info">Clase de factura</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtClaseFacturaInicial" />
                </div>
                <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1" >
                    <p class="text-info text-center">a</p>
                </div>
                <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3" >
                    <input type="text" class="form-control" id="txtClaseFacturaFinal" />
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Porcentaje</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-7">
                    <p class="text-info">Valor</p>
                </div>
                <div class="col-xs-5">
                    <input type="text" class="form-control" id="txtValorPorcentaje" />
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Criterios de Busqueda</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="radio">
                      <label><input type="radio" name="rbtnCriterioBusqueda" id="rbtnCriterioBusquedaGeneral" />General</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="radio">
                      <label><input type="radio" name="rbtnCriterioBusqueda" id="rbtnCriterioBusquedaDistribuido"/>Distribuido</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12" >
            <button type="button" class="btn btn-default btn-primary pull-right" >Buscar</button>
        </div>
    </div>	
	<?php
		include 'footer.php';
	?>
	<script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $("#txtFechaFactInicial, #txtFechaFactFinal").datepicker();
            });
        });
    </script>
	</body>
</html>