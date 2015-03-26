$(document).ready(function () {
    $(document).ajaxStart(function () {
    $("#chartdiv").html("<div id='loading' style='display:none;padding:70px 0px 0px 200px;' ><img src='images/loadinggraphic.gif'/> </div>");
        $("#loading").show();
       
    }).ajaxStop(function () {
    
        $("#loading").hide();
    });
});
  
<!-- the chart code -->



function createchart4(divname) 
{

$.ajax({  
    type: 'getJSON',
    url: 'js/Cost1Data.php',
    success: function(response) {
        
        chartData = JSON.parse(response);
 
 console.log(divname);

// create chart
// load the data
console.log('hello');
var chart;
  

AmCharts.theme = AmCharts.themes.light;

 // SERIAL CHART Categories (X Axis)
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "BNFName";
  

  // GRAPHS  (Y Axis)
  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "ACTCost";
  graph1.type = "column";
  graph1.fillAlphas = 0.7;
  
  var valueAxis = new AmCharts.ValueAxis();
	valueAxis.unit = "£";
	valueAxis.unitPosition = "left";
	
 chart.addValueAxis(valueAxis); 

  chart.addGraph(graph1);
  
  var categoryAxis = chart.categoryAxis
  categoryAxis.autoGridCount = false;
  categoryAxis.gridCount = chartData.length ;
  categoryAxis.gridPosition = "start";
  categoryAxis.labelRotation = 45;
  categoryAxis.fontSize = 8;
  categoryAxis.title = "Top 10 Costly Drugs Prescribed For January  ";
  categoryAxis.labelsEnabled = true;
  
    // WRITE

  chart.write(divname);
  
}

})

}