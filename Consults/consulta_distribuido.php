<!DOCTYPE html>
<html>
	<head>
			<title>Informe Ventas Distribuido</title>
			<?php
				include '../head_includes.php';
			?>
		<style type="text/css">
		</style>
	</head>
	<body>
		<?php
			include '../header.php';
		?>
	  	<div class="container-fluid">
	  	  	<div class="row">
		  	    <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">

		  	    </div>
		  	    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		  	      	<h1 class="text-center">Reporte de ventas area Andina</h1>
		  	    </div>
		  	    <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">

		  	    </div>
		  	  </div>

		  	  <div class="row">
		  	    <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">

		  	    </div>
		  	    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		  	      <h3 id="selectQuoteLabel" class="text-center">Seleccione informe</h3>
		  	    </div>
		  	    <div class="col-xs-0 col-sm-3 col-md-3 col-lg-3">

		  	    </div>
		  	  </div>
		  	  <div class="row">
		  	    <div class="col-xs-0 col-sm-4 col-md-4 col-lg-4">
		  	    </div>
		  	    <div class="col-xs-12col-sm-4 col-md-4 col-lg-4">
		  	      <div class="row center-block">
		  	        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		  	          <button id="mistery" type="button" class="btn btn-block center-block btn-info">Colombia</button>
		  	        </div>
		  	        <div id="adventure" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		  	          <button type="button" class="btn btn-block center-block btn-info">Argentina</button>
		  	        </div>
		  	      </div>
		  	    </div>
		  	    <div class="col-xs-0 col-sm-4 col-md-4 col-lg-4">
		  	    </div>
		  	  </div>
		  	  <div class="row">
		  	    <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
		  	    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
		  	      <div class="jumbotron">
		  	      	<!--Table Based On DATA-->
		  	   		<div id="reportTable" class="component"></div>
		  	   		<!--Table Based On DATA-->
		  	       	<div id="countryTotal"></div>
		  	      </div>
		  	    </div>
		  	    <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
		  	  </div>
		  	</div>
	  	</div>
		<!-- Modal -->
	    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabel">Ciudad Seleccionada</h4>
	          </div>
	          <div class="modal-body">
	            <div class="table-responsive"> 
	                <table class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th>Ctd.fact.</th>
	                            <th>Cant.Obsequio</th>
	                            <th>Valor Bruto</th>
	                            <th>Dto. Fin.</th>
	                            <th>Dto. Cab</th>
	                            <th>Dto. Pro.</th>
	                            <th>IVA</th>
	                            <th>IVA Obsequio</th>
	                            <th>Valor neto</th>
	                            <th>Descuento</th>
	                            <th>Venta Neta</th>
	                        </tr>
	                    </thead>
	                    <tbody>

	                    </tbody>
	                </table>
	            </div>
	          </div>
		<script src="http://localhost:8080/informe_ventas/JS/d3.min.js" charset="utf-8"></script>
		<script type="text/javascript">
			/*d3.text("http://localhost:8080/informe_ventas/Data/colombia_1.csv", function(data) {
	            var rows = d3.csv.parseRows(data);

	            var container = d3.select("#reportTable")
	                .append("table")
	                .attr('class', 'table-hover')

	                // headers
                    container.append("thead").append("tr")
                        .selectAll("th")
                        .data(rows[0])
                        .enter().append("th")
                        .text(function(d) {
                            return d;
                        });

                    // data
                    container.append("tbody")
						.selectAll("tr").data(rows.slice(1))
						.enter().append("tr")

						.selectAll("td")
							.data(function(d){return d;})
							.enter().append("td")
								.attr("class",function(d){return d})
								.text(function(d){return d;})
	        });*/
			d3.csv("http://localhost:8080/informe_ventas/Data/colombia_1.csv", function(error, data) {
				if (error) throw error;
				var container = d3.select("#reportTable")
	                .append("table")
	                .attr('class', 'table-hover')

	            // headers
                container.append("thead").append("tr")
                    .selectAll("th")
                    .data(data)
                    .enter().append("th")
                    .text(function(d) {
                        return 2;
                    });  

			});
		</script>
		<?php
			include '../footer.php';
		?>
		<script src="http://localhost:8080/informe_ventas/JS/jquery.ba-throttle-debounce.min.js" charset="utf-8"></script>
		<script src="http://localhost:8080/informe_ventas/JS/jquery.stickyheader.js" charset="utf-8"></script>
		</script>
		<script type="text/javascript">
	</body>
</html>