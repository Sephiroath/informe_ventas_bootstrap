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
		  	          <button id="btnColombia" type="button" class="btn btn-block center-block btn-info">Colombia</button>
		  	        </div>
		  	        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		  	          <button id="btnArgentina" type="button" class="btn btn-block center-block btn-info">Argentina</button>
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
	    <div class="modal fade" id="pieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	      <div class="modal-dialog modal-lg" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabel">Ciudad Seleccionada</h4>
	          </div>
	          <div class="modal-body" id="ModalBody">
	            
	          </div>
	          <?php
				include '../footer.php';
			  ?>
		<script src="http://localhost:8080/informe_ventas/JS/d3.min.js" charset="utf-8"></script>
		<script type="text/javascript">
			function loadCountryInformation(countryName){
				d3.csv('http://localhost:8080/informe_ventas/Data/' + countryName + '.csv', function(data){
					var container = d3.select("#reportTable")
		                .append("table")
		                .attr('class', 'table-hover');
				    columnsName = Object.keys( data[0] ); 
					// create table header
				    container.append('thead').append('tr')
				        .selectAll('th')
				        .data(columnsName).enter()
				        .append('th')
				        .text(function(d) {
					        return d;
					    });
					var tr = container.append('tbody').selectAll('tr')
					    .data(data).enter()
					    .append('tr');

					tr.append('th')
					    .attr('class', 'Ciudad')
					    .html(function(m) { return "<a onClick='getCityProducts();' id='" + countryName + "|" + m.Ciudad +"'>" + m.Ciudad + "</a>"; });

					tr.append('td')
					    .attr('class', 'Porcentaje')
					    .html(function(m) { return m.Porcentaje; });

					tr.append('td')
					    .attr('class', 'Valor Bruto')
					    .html(function(m) { return m.ValorBruto; });

					tr.append('td')
					    .attr('class', 'IVA')
					    .html(function(m) { return m.IVA; });

					tr.append('td')
					    .attr('class', 'Descuento')
					    .html(function(m) { return m.Descuento; });

					tr.append('td')
					    .attr('class', 'VentaNeta')
					    .html(function(m) { return m.VentaNeta; });
				});
			}

			$(document).ready(function() {
				$("#btnColombia").click(function() {
					$(".jumbotron").slideUp("slow",function() {
						$("#ModalBody svg").remove();
						$("#reportTable table").remove();
						loadCountryInformation("Colombia");
					});
					$(".jumbotron").slideDown("slow");
					
				});

				$("#btnArgentina").click(function() {
					$(".jumbotron").slideUp("slow",function() {
						$("#ModalBody svg").remove();
						$("#reportTable table").remove();
						loadCountryInformation("Argentina");
					});
					$(".jumbotron").slideDown("slow");
				});

			});

			function getCityProducts(){
				$("#ModalBody svg").remove();
				$('#pieModal').modal('show');
		        generateModalPieChart(event.target.id);
			}

			function generateModalPieChart(countryCity){
				var countryCityArray = countryCity.split("|");
				var country = countryCityArray[0];
				var city = countryCityArray[1];
				var noSpaceCity = city.replace(/\s/g, "_");
				$("#myModalLabel").html(city + ":");
				var width = 900,
				    height = 500,
				    radius = Math.min(width, height) / 2;

				var color = d3.scale.ordinal()
				    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

				var arc = d3.svg.arc()
				    .outerRadius(radius - 10)
				    .innerRadius(0);

				var labelArc = d3.svg.arc()
				    .outerRadius(radius - 40)
				    .innerRadius(radius - 40);

				var pie = d3.layout.pie()
				    .sort(null)
				    .value(function(d) { return d.Porcentaje; });

				var svg = d3.select("#ModalBody").append("svg")
					.attr('id', 'countrySVG')
				    .attr("width", width)
				    .attr("height", height)
				    .attr('viewBox', '0 0 ' + width + ' ' + height)
				  	.attr('preserveAspectRatio', 'xMidYMid  meet')
				  .append("g")
				    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

				d3.csv("http://localhost:8080/informe_ventas/Data/" + country + "_" + noSpaceCity + ".csv", type, function(error, data) {
				  if (error) throw error;

				  var g = svg.selectAll(".arc")
				      .data(pie(data))
				    .enter().append("g")
				      .attr("class", "arc");

				  g.append("path")
				      .attr("d", arc)
				      .style("fill", function(d) { return color(d.data.Producto); });

				  g.append("text")
				      .attr("transform", function(d) { return "translate(" + labelArc.centroid(d) + ")"; })
				      .attr("dy", ".35em")
				      .text(function(d) { return d.data.Producto; });
				  var chart = $("#countrySVG"),
				      aspect = chart.width() / chart.height(),
				      mContainer = chart.parent();
			      $(window).on('shown.bs.modal', function() { 
			          	var chart = $("#countrySVG"),
						aspect = chart.width() / chart.height(),
						mContainer = chart.parent();
						var targetWidth = mContainer.width();
						chart.attr("width", targetWidth);
						chart.attr("height", Math.round(targetWidth / aspect));
			      });
				  $(window).on("resize", function() {
				      var targetWidth = mContainer.width();
				      if(targetWidth >= 0)
				      {
					        chart.attr("width", targetWidth);
					        chart.attr("height", Math.round(targetWidth / aspect));
					  }else
					  {
					  		chart.attr("width", 500);
					        chart.attr("height", 250);
					  }
				  }).trigger("resize");

				});
			}

			function type(d) {
			  d.Porcentaje = +d.Porcentaje;
			  return d;
			}
			
		</script>
		<script src="http://localhost:8080/informe_ventas/JS/jquery.ba-throttle-debounce.min.js" charset="utf-8"></script>
		<script src="http://localhost:8080/informe_ventas/JS/jquery.stickyheader.js" charset="utf-8"></script>
		</script>
		<script type="text/javascript">
	</body>
</html>