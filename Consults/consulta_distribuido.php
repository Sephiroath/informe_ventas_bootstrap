<!DOCTYPE html>
<html>
<head>
	<title>Informe Ventas Distribuido</title>
	<?php
	include '../head_includes.php';
	?>
	<style type="text/css">
		.tooltip {
	        background: #eee;
	        box-shadow: 0 0 5px #999999;
	        color: #333;
	        display: none;
	        font-size: 12px;
	        left: 130px;
	        padding: 10px;
	        position: absolute;
	        text-align: center;
	        top: 95px;
	        width: 80px;
	        z-index: 10;
	      }
	      .legend {
	        font-size: 12px;
	      }
	      rect {
	        cursor: pointer;                                              /* NEW */
	        stroke-width: 2;
	      }
	      rect.disabled {                                                 /* NEW */
	        fill: transparent !important;                                 /* NEW */
	      }
	</style>
</head>
<body>
	<div class="container-fluid">
		<?php
		include '../header.php';
		?>
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
					<div id="reportTable" class="table-responsive"></div>
					<!--Table Based On DATA-->
					<div id="countryTotal"></div>
				</div>
			</div>
			<div class="col-xs-0 col-sm-0 col-md-1 col-lg-1"></div>
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
			<div id="ProductSelector">
			</div>
			<div id="toolTipDiv">
				<table>
					<tr>
						<td>Producto</td>
						<td id='productLabel'></td>
					</tr>
					<tr>
						<td>cantidad</td>
						<td id='quantityLabel'></td>
					</tr>
					<tr>
						<td>Porcentaje</td>
						<td id='percentageLabel'></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
include '../footer.php';
?>
<script src="http://localhost:8080/informe_ventas/JS/d3.min.js" charset="utf-8"></script>
<script src="http://localhost:8080/informe_ventas/JS/jquery.stickytableheaders.min.js" charset="utf-8"></script>
<script type="text/javascript">
	var lastColor;
	var radius;
	var smXLegendCounter = 0;
	var smYLegendCounter = 0;
	function loadCountryInformation(countryName){
		d3.csv('http://localhost:8080/informe_ventas/Data/' + countryName + '.csv', function(data){
			var container = d3.select("#reportTable")
			.append("table")
			.attr('class', 'table table-hover');
			columnsName = Object.keys( data[0] ); 
					// create table header
					container.append('thead').append('tr')
					.selectAll('th')
					.data(columnsName).enter()
					.append('th')
					.attr('class', function(d) {
						if (d != 'Ciudad' && d != 'Porcentaje' && d != 'VentaNeta'){
							return 'hidden-xs hidden-sm';
						}else{
							return '';
						}
					})
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
					.attr('class', 'Valor Bruto hidden-xs hidden-sm')
					.html(function(m) { return m.ValorBruto; });

					tr.append('td')
					.attr('class', 'IVA hidden-xs hidden-sm')
					.html(function(m) { return m.IVA; });

					tr.append('td')
					.attr('class', 'Descuento hidden-xs hidden-sm')
					.html(function(m) { return m.Descuento; });

					tr.append('td')
					.attr('class', 'VentaNeta')
					.html(function(m) { return m.VentaNeta; });	
					$('#reportTable table').stickyTableHeaders();

				});
}

$(document).ready(function() {
	$("#btnColombia").click(function() {
		$(".jumbotron").slideUp("slow",function() {
			$("#ModalBody svg").remove();
			$("#ProductSelector svg").remove();
			$("#reportTable table").remove();
			smXLegendCounter = 0;
			smYLegendCounter = 0;
			loadCountryInformation("Colombia");
		});
		$(".jumbotron").slideDown("slow");

	});

	$("#btnArgentina").click(function() {
		$(".jumbotron").slideUp("slow",function() {
			$("#ModalBody svg").remove();
			$("#ProductSelector svg").remove();
			$("#reportTable table").remove();
			smXLegendCounter = 0;
			smYLegendCounter = 0;
			loadCountryInformation("Argentina");
		});
		$(".jumbotron").slideDown("slow");
	});

});

function getCityProducts(){
	$("#ModalBody svg").remove();
	$("#ProductSelector svg").remove();
	smXLegendCounter = 0;
	smYLegendCounter = 0;
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
	var widthLegendsm = 400,
	heightLegendsm = 200;
	
	var donutWidth = 75;
    var legendRectSize = 18;
    var smlegendRectSize = 20;
    var legendSpacing = 4;
    var smlegendSpacing = 4;

	var color = d3.scale.category20b();

	var arc = d3.svg.arc()
	.outerRadius(radius - 10)
	.innerRadius(radius - donutWidth);

	var labelArc = d3.svg.arc()
	.outerRadius(radius - 40)
	.innerRadius(radius - 40);

	var pie = d3.layout.pie()
	.sort(null)
	.value(function(d) { return d.count; });

	var svg = d3.select("#ModalBody").append("svg")
		.attr('id', 'countrySVG')
		.attr("width", width)
		.attr("height", height)
		.attr('viewBox', '0 0 ' + width + ' ' + height)
		.attr('preserveAspectRatio', 'xMidYMid  meet')
		.append("g")
		.attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

	var tooltip = d3.select('#toolTipDiv')
          .append('div')
          .attr('class', 'tooltip');
        
        tooltip.append('div')
          .attr('class', 'label');

        tooltip.append('div')
          .attr('class', 'count');

        tooltip.append('div')
          .attr('class', 'percent');

	d3.csv("http://localhost:8080/informe_ventas/Data/" + country + "_" + noSpaceCity + ".csv", type, function(error, data) {
		if (error) throw error;

		data.forEach(function(d) {
			d.count = +d.count;
			d.enabled = true;
		});

		var path = svg.selectAll('path')
			.data(pie(data))
			.enter()
			.append('path')
			.attr('d', arc)
			.attr('fill', function(d, i) { 
			  return color(d.data.label); 
			})
			.each(function(d) { this._current = d; });                

		path.on('mouseover', function(d) {
			lastColor = d3.select(this).style("fill");
			d3.select(this).style('fill', 'orange');
			var total = d3.sum(data.map(function(d) {
			  return (d.enabled) ? d.count : 0;                      
			}));
			var percent = Math.round(1000 * d.data.count / total) / 10;
				tooltip.select('.label').html(d.data.label);
				tooltip.select('.count').html(d.data.count); 
				tooltip.select('.percent').html(percent + '%'); 
				tooltip.style('display', 'block');
				$('#productLabel').html(d.data.label);
				$('#quantityLabel').html(d.data.count);
				$('#percentageLabel').html(percent + '%');
			});	
		
		path.on('mouseout', function() {
			d3.select(this).style('fill', lastColor);
			tooltip.style('display', 'none');
			$('#productLabel').html("");
			$('#quantityLabel').html("");
			$('#percentageLabel').html("");
		});
		//jjjjj
		var svg2 = d3.select("#ProductSelector").append("svg")
			.attr('id', 'SVGProductSelector')
			.attr('class', ' hidden-sm hidden-lg')
			.attr("width", widthLegendsm)
			.attr("height", heightLegendsm)
			.attr('viewBox', '0 0 ' + widthLegendsm + ' ' + heightLegendsm)
			.attr('preserveAspectRatio', 'xMidYMid  meet')
			.append("g")
			.attr("transform", "translate(" + 50 + "," + 50 + ")");
		var smlegend = svg2.selectAll('.smlegend')
			.data(color.domain())
			.enter()
			.append('g')
			.attr('class', 'smlegend')
			.attr('transform', function(d, i) {
			  var height = smlegendRectSize + smlegendSpacing;
			  var offset =  height * color.domain().length / 2;
			  if (smXLegendCounter >= 3)
			  {
			  	smXLegendCounter = 0;
			  	smYLegendCounter++;
			  }
			  var horz = (smXLegendCounter * 120);
			  smXLegendCounter++;
			  var vert = smYLegendCounter * height;
			  return 'translate(' + horz + ',' + vert + ')';
			});
			smlegend.append('rect')
			.attr('width', smlegendRectSize)
			.attr('height', smlegendRectSize)                                   
			.style('fill', color)
			.style('stroke', color)
			.on('click', function(label) {
			  var rect = d3.select(this);
			  var enabled = true;
			  var totalEnabled = d3.sum(data.map(function(d) {     
			    return (d.enabled) ? 1 : 0;                           
			  }));
			  
			  if (rect.attr('class') === 'disabled') {                
			    rect.attr('class', '');                               
			  } else {                                                
			    if (totalEnabled < 2) return;                         
			    rect.attr('class', 'disabled');                       
			    enabled = false;                                      
			  }

			  pie.value(function(d) {                                 
			    if (d.label === label) d.enabled = enabled;           
			    return (d.enabled) ? d.count : 0;                     
			  });                                                     

			  path = path.data(pie(data));                         

			  path.transition()                                       
			    .duration(750)                                        
			    .attrTween('d', function(d) {                         
			      var interpolate = d3.interpolate(this._current, d); 
			      this._current = interpolate(0);                     
			      return function(t) {                                
			        return arc(interpolate(t));                       
			      };                                                  
			    });                                                   
			});
			smlegend.append('text')
			.attr('x', smlegendRectSize + smlegendSpacing)
			.attr('y', smlegendRectSize - smlegendSpacing)
			.text(function(d) { return d; });

		//jjjjj
		var legend = svg.selectAll('.legend')
			.data(color.domain())
			.enter()
			.append('g')
			.attr('class', 'legend hidden-xs')
			.attr('transform', function(d, i) {
			  var height = legendRectSize + legendSpacing;
			  var offset =  height * color.domain().length / 2;			  
			  var horz = -2 * legendRectSize;
			  var vert = i * height - offset;
			  return 'translate(' + horz + ',' + vert + ')';
			});

		legend.append('rect')
		.attr('width', legendRectSize)
		.attr('height', legendRectSize)                                   
		.style('fill', color)
		.style('stroke', color)
		.on('click', function(label) {
		  var rect = d3.select(this);
		  var enabled = true;
		  var totalEnabled = d3.sum(data.map(function(d) {     
		    return (d.enabled) ? 1 : 0;                           
		  }));
		  
		  if (rect.attr('class') === 'disabled') {                
		    rect.attr('class', '');                               
		  } else {                                                
		    if (totalEnabled < 2) return;                         
		    rect.attr('class', 'disabled');                       
		    enabled = false;                                      
		  }

		  pie.value(function(d) {                                 
		    if (d.label === label) d.enabled = enabled;           
		    return (d.enabled) ? d.count : 0;                     
		  });                                                     

		  path = path.data(pie(data));                         

		  path.transition()                                       
		    .duration(750)                                        
		    .attrTween('d', function(d) {                         
		      var interpolate = d3.interpolate(this._current, d); 
		      this._current = interpolate(0);                     
		      return function(t) {                                
		        return arc(interpolate(t));                       
		      };                                                  
		    });                                                   
		});

		legend.append('text')
		.attr('x', legendRectSize + legendSpacing)
		.attr('y', legendRectSize - legendSpacing)
		.text(function(d) { return d; });

		var chart = $("#countrySVG"),
		chart2 = $("#SVGProductSelector"),
		aspect = chart.width() / chart.height(),
		aspect2 = chart2.width() / chart2.height(),
		mContainer = chart.parent();
		$(window).on('shown.bs.modal', function() { 
			var targetWidth = mContainer.width();
			chart.attr("width", targetWidth);
			chart.attr("height", Math.round(targetWidth / aspect));
			chart2.attr("width", targetWidth);
			chart2.attr("height", Math.round(targetWidth / aspect2));
		});
		$(window).on("resize", function() {
			var targetWidth = mContainer.width();
			if(targetWidth >= 0)
			{
				chart.attr("width", targetWidth);
				chart.attr("height", Math.round(targetWidth / aspect));
				chart2.attr("width", targetWidth);
				chart2.attr("height", Math.round(targetWidth / aspect2));
			}else
			{
				chart.attr("width", 500);
				chart.attr("height", 250);
				chart2.attr("width", 200);
				chart2.attr("height", 200);
			}
		}).trigger("resize");

	});
}
function clicked(d){
	alert(d.data.Producto);	
}
function mouseEnter(d){
	lastColor = d3.select(this).style("fill");
	d3.select(this).style('fill', 'orange');
}
function mouseLeave(d){
	d3.select(this).style('fill', lastColor);
}
function type(d) {
	d.count = +d.count;
	return d;
}
</script>
<script type='text/javascript' src="http://localhost:8080/informe_ventas/JS/bootstrap.min.js"></script>
</body>
</html>