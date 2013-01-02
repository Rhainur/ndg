$(document).ready(function(){
	$('.datepicker').datepicker();
});

google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(drawChart);

function drawChart(){
var dataSource = jQuery('.weight-data').first().html()
var d = JSON.parse(dataSource);
for(var i=0;i<d.length;i++){
	var t = d[i][0];
	d[i][0] = new Date(t.substr(0,4),t.substr(5,2),t.substr(8,2));
	d[i][1] = parseFloat(d[i][1]);
}

console.log(d);
// Create the data table.
var data = new google.visualization.DataTable();
data.addColumn('date', 'Date');
data.addColumn('number', 'Weight');
data.addRows(d);

var kg_formatter = new google.visualization.NumberFormat({suffix: ' kg'});
kg_formatter.format(data,1);


// Set chart options
var options = { pointSize: 5, vAxis: { format: '###.##' + ' ' + userUnits.weight }, legend: {position: 'none'} };

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.LineChart(document.getElementById('graph-container'));
chart.draw(data, options);

}