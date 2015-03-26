$(document).ready(function () {
    $(document).ajaxStart(function () {
    $("#chartdiv").html("<div id='loading' style='display:none;padding:70px 0px 0px 200px;' ><img src='images/loadinggraphic.gif'/> </div>");
        $("#loading").show();
       
    }).ajaxStop(function () {
    
        $("#loading").hide();
    });
});


function createchart9(divname) 
{ 

localStorage.setItem('divname',divname);
console.log(divname);
  place_name = document.getElementById('dropdown1').value;

$.ajax({  
    type: 'POST',  
    url: 'js/Top10DrugsByRegionMar.php', 
    data: {dropdown1:place_name},
        success: function(response) {


        chartData = JSON.parse(response); 
        
        

AmCharts.theme = AmCharts.themes.light;

 // SERIAL CHART Categories (X Axis)
  chart = new AmCharts.AmSerialChart();
  chart.dataProvider = chartData;
  chart.categoryField = "BNFName";
  
  // GRAPHS  (Y Axis)
  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "Items";
  graph1.type = "column";
  graph1.fillAlphas = 0.7;

  chart.addGraph(graph1);
  
  var categoryAxis = chart.categoryAxis
  categoryAxis.autoGridCount = false;
  categoryAxis.gridCount = chartData.length ; 
  categoryAxis.gridPosition = "start";
  categoryAxis.labelRotation = 45;
  categoryAxis.fontSize = 8;
  categoryAxis.title = "Top 10 Drugs Prescribed in March For "+place_name;
  categoryAxis.labelsEnabled = true;
  

  
    // WRITE
divname = localStorage.getItem('divname');
  chart.write(divname);
  
},error: console.log('ajax error')
});

}