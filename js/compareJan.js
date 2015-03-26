$(document).ready(function () {
    $(document).ajaxStart(function () {
    $("#chartdiv").html("<div id='loading' style='display:none;padding:70px 0px 0px 200px;' ><img src='images/loadinggraphic.gif'/> </div>");
        $("#loading").show();
       
    }).ajaxStop(function () {
    
        $("#loading").hide();
    });
});

<!-- the chart code -->

function createchart13(divname) 
{ 

$.ajax({  
    type: 'getJSON',
    url: 'js/ComparisonJan.php',
    success: function(response) {
        
        chartData = JSON.parse(response);
 console.log(divname);



var chart;



AmCharts.theme = AmCharts.themes.light;

 // SERIAL CHART Categories (X Axis)
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "BNFName";
  
  // GRAPHS  (Y Axis)
  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "NIC";
  graph1.bullet="round";
  graph1.bulletBorderColor = "#FFFFFF";
  graph1.bulletBorderThickness = 2;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  graph1.balloonText = "<span style='font-size:13px;'><b>NIC</b> - [[category]]:<b>[[value]]</b></span>"; 
  
  chart.addGraph(graph1);
  
  var graph2 = new AmCharts.AmGraph();
  graph2.valueField = "ACTCost";
  graph2.bullet = "round";
  graph2.bulletBorderColor = "#FFFFFF";
  graph2.bulletBorderThickness = 2;
  graph2.lineThickness = 2;
  graph2.lineAlpha = 0.5;
  graph2.balloonText = "<span style='font-size:13px;'><b>ACTCost</b> - [[category]]:<b>[[value]]</b></span>"; 

  chart.addGraph(graph2);
  
  var categoryAxis = chart.categoryAxis
  categoryAxis.autoGridCount = false;
  categoryAxis.gridCount = chartData.length ;
  categoryAxis.gridPosition = "start";
  categoryAxis.labelRotation = 45;
  categoryAxis.fontSize = 8;
  categoryAxis.title = "January NIC - ACTCost ";
  categoryAxis.labelsEnabled = true;
  

  
    // WRITE

  chart.write(divname);

}
}
)
}