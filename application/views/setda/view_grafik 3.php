

<style>
        #chartdiv1, #chartdiv2 ,#chartdiv{
            width: 90%;
            height: 350px;
        }
    </style>
<script src="https://cdn.amcharts.com/lib/5/core.js"></script>
<script src="https://cdn.amcharts.com/lib/5/charts.js"></script>
<script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js" type="text/javascript"></script> 
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>


<!-- Chart code -->
<script>
// AmCharts 5 Pie Chart Example
am5.ready(function() {

// Create root elements for both charts
var root1 = am5.Root.new("chartdiv1");
var root2 = am5.Root.new("chartdiv2");
var root = am5.Root.new("chartdiv");
// Set themes for both charts
root1.setThemes([am5themes_Animated.new(root1)]);
root2.setThemes([am5themes_Animated.new(root2)]);
root.setThemes([am5themes_Animated.new(root)]);



// Create pie chart for the first chart
var chart1 = root1.container.children.push(am5percent.PieChart.new(root1, {
    layout: root1.verticalLayout
    
}));



// Create series for the first chart
var series1 = chart1.series.push(am5percent.PieSeries.new(root1, {
    valueField: "value",
    categoryField: "category"
}));

series1.data.setAll(<?php echo json_encode($chart_kategori); ?>);



// Create pie chart for the second chart
var chart2 = root2.container.children.push(am5percent.PieChart.new(root2, {
    layout: root2.verticalLayout
}));

// Create series for the second chart
var series2 = chart2.series.push(am5percent.PieSeries.new(root2, {
    valueField: "value",
    categoryField: "category"
}));
// Add data for the second chart
series2.data.setAll(<?php echo json_encode($chart_kategori); ?>);




//kolom
// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "none",
  wheelY: "none",
  paddingLeft: 0
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { 
  minGridDistance: 30,
  minorGridEnabled: true
 });

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0,
  categoryField: "name",
  renderer: xRenderer,
  
  tooltip: am5.Tooltip.new(root, {})
}));

xAxis.children.push(am5.Label.new(root, {
    text: 'Tahun',
    textAlign: 'center',
    x: am5.p50,
    fontWeight: 'bold'
  }));



// Mengatur format angka pada sumbu x
// xAxis.numberFormatter = new am5.NumberFormatter();
// xAxis.numberFormatter.numberFormat = "#,###.##"; 
root.numberFormatter.setAll({
  numberFormat: "####",
  numericFields: ["valueY"]
});
//let chart = am5.createRoot(document.body, am5.XYChart);
chart.name = "NamaGrafik"; // Memberikan nama pada grafik


xRenderer.grid.template.set("visible", false);

var yRenderer = am5xy.AxisRendererY.new(root, {});
var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0,
  min: 0,
  extraMax: 0.1,
  renderer: yRenderer
}));
yAxis.children.unshift(am5.Label.new(root, {
    text: 'Jumlah Produk',
    textAlign: 'center',
    y: am5.p50,
    rotation: -90,
    fontWeight: 'bold'
  }));
yRenderer.grid.template.setAll({
  strokeDasharray: [2, 2]
});

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  text: 'xAxis title',
    textAlign: 'center',
    x: am5.p50,
    fontWeight: 'bold',
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "name",
  // tooltip: am5.Tooltip.new(root, { dy: -25, labelText: "{valueY}" })
  tooltip: am5.Tooltip.new(root, { dy: 1, labelText: "{valueY}" })
}));




series.columns.template.setAll({
  cornerRadiusTL: 5,
  cornerRadiusTR: 5,
  strokeOpacity: 0
});

series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


  var data = <?php  echo json_encode($chart_tahun ,JSON_NUMERIC_CHECK); ?>;


series.bullets.push(function() {
  return am5.Bullet.new(root, {
    locationY: 1,
    sprite: am5.Picture.new(root, {
      templateField: "bulletSettings",
      width: 30,
      height: 30,
      centerX: am5.p50,
      centerY: am5.p50,
      shadowColor: am5.color(0x000000),
      shadowBlur: 4,
      shadowOffsetX: 4,
      shadowOffsetY: 4,
      shadowOpacity: 0.6
     
    })
  });
});

xAxis.data.setAll(data);
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()




</script>

<!-- HTML -->


</script>

<div id="chartdiv1"></div>



<div id="chartdiv2"></div>

<div id="chartdiv"></div>