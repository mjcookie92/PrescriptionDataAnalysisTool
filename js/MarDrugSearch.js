$(document).ready(function () {
    $(document).ajaxStart(function () {
    $("#chartdiv").html("<div id='loading' style='display:none;padding:70px 0px 0px 200px;' ><img src='images/loadinggraphic.gif'/> </div>");
        $("#loading").show();
       
    }).ajaxStop(function () {
    
        $("#loading").hide();
    });
});

function createchart18(divname) 
{ 

localStorage.setItem('divname',divname);
console.log(divname);
  drug_name = document.getElementById('drugsearch').value;

$.ajax({  
    type: 'POST',  
    url: 'js/MarDrugSearch.php', 
    data: {drugsearch:drug_name},
        success: function(response) {


        chartData = JSON.parse(response); 
        
        

AmCharts.theme = AmCharts.themes.light;

 // SERIAL CHART Categories (X Axis)
  chart = new AmCharts.AmPieChart();
  
  chart.dataProvider = chartData;
  chart.titleField = "region";
  chart.valueField = "Items";
  chart.legend = true; 

  

  
    // WRITE
divname = localStorage.getItem('divname');
  chart.write(divname);
  
  
},error: console.log('ajax error')
});

}