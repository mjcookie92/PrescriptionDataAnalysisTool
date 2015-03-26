$(document).ready(function () {
    $(document).ajaxStart(function () {
    $("#chartdiv").html("<div id='loading' style='display:none;padding:70px 0px 0px 200px;' ><img src='images/loadinggraphic.gif'/> </div>");
        $("#loading").show();
       
    }).ajaxStop(function () {
    
        $("#loading").hide();
    });
});

function createchart10(divname) 
{ 

localStorage.setItem('divname',divname);
console.log(divname);
place_name = document.getElementById('dropdown2').value;

$.ajax({  
    type: 'POST',  
    url: 'js/CostByRegionJan.php', 
    data: {dropdown2:place_name},
        success: function(response) 
        {


        chartData = JSON.parse(response); 
        
        

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
  categoryAxis.title = "Top 10 Expensive Drugs Prescribed in January For "+place_name;
  categoryAxis.labelsEnabled = true;
  

  
    // WRITE
divname = localStorage.getItem('divname');
  chart.write(divname);
  
},error: console.log('ajax error')
});

}