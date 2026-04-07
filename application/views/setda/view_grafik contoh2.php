<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="//www.amcharts.com/lib/3/plugins/responsive/responsive.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<style>
        .chartdiv {
  width: 100%;
  height: 700px;
}

g.amcharts-category-axis tspan {
  cursor: pointer;
}

g.amcharts-category-axis text.amcharts-axis-label tspan:hover,
g.amcharts-graph-label-only text tspan {
  text-decoration: underline;
  fill: red;
}

text.amcharts-axis-title {
  font-size: 13px;
}
</style>

<script>
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "addClassNames": true,
  "marginRight": 70,
  "panEventsEnabled": false,
  "titles": [{
    "text": "Grafik jumlah Produk"
  }],

  "dataProvider": (<?php echo json_encode($chart_kategori); ?>),
  "responsive": {
    "enabled": true,
    "addDefaultRules": false,
    "rules": [{
      "maxWidth": 600,
      "overrides": {
        "rotate": true,
        "creditsPosition": "bottom-right",
        "columnSpacing": 5,
        "minMarginLeft": 38,
        "depth3D": 0,
        "angle": 0,
        "graphs": [{
          "hidden": false
        }, {
          "columnWidth": 1
        }],
        "legend": {
          "enabled": true,
          "useGraphSettings": true,
          "labelText": "Country",
          "fontSize": 14
        },
        "categoryAxis": {
          "labelsEnabled": false,
          "tickLength": 0
        },
        "valueAxes": [{
          "position": "top"
        }, {
          "position": "bottom",
          "includeHidden": true
        }]
      }
    }]
  },
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "No. of Visitors"
  }, {
    "id": "second",
    "includeHidden": false
  }],
  "startDuration": 1,
  "graphs": [{
    "labelText": "[[category]]",
    "labelPosition": "inside",
    "id": "label-only",
    "showBalloon": false,
    "fillAlphas": 0,
    "lineAlpha": 0,
    "hidden": true, //hide by default for larger screen sizes
    "columnWidth": .6,
    "visibleInLegend": false,
    "showAllValueLabels": true,
    "type": "column",
    "urlField": "url",
    "urlTarget": "_blank",
    "valueField": "hiddenvalue", //use hidden value to make labels clickable
    "includeInMinMax": false //make sure the graph doesn't affect the value axis min/max when zooming.
  }, {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "urlField": "url",
    "urlTarget": "_blank",
    "valueField": "visits"
  }, {
    //invisible graph for the second axis
    "fillAlphas": 0,
    "lineAlpha": 0,
    "hidden": true,
    "visibleInLegend": false,
    "showBalloon": false,
    "valueField": "visits",
    "valueAxis": "second"
  }],
  "depth3D": 10,
  "angle": 45,
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "classNameField": "Ctglabel",
    "labelRotation": 45,
    "minHorizontalGap": 50,
    "title": "Country",
    "urlTarget": "_blank",
    "listeners": [{
      "event": "clickItem",
      "method": function(event) {
        window.open(event.serialDataItem.dataContext.url, '_blank');
      }
    }]
  },
  "export": {
    "enabled": true
  }
});






var chart1 = AmCharts.makeChart("chart1div", {
  "type": "serial",
  "theme": "light",
  "addClassNames": true,
  "marginRight": 70,
  "panEventsEnabled": false,
  "titles": [{
    "text": "Click on Country to see Visitor details"
  }],
  "dataProvider": [{
    "country": "USA",
    "visits": 3025,
    "hiddenvalue": 3025, // to ensure that the smaller bars' labels are fully clickable
    "color": "#FF0F00",
    "url": "https://codepen.io/"
  }, {
    "country": "China",
    "visits": 1882,
    "hiddenvalue": 3025,
    "color": "#FF6600",
    "url": "https://codepen.io/"
  }, {
    "country": "Japan",
    "visits": 1809,
    "hiddenvalue": 3025,
    "color": "#FF9E01",
    "url": "https://codepen.io/"
  }, {
    "country": "Germany",
    "visits": 1322,
    "hiddenvalue": 3025,
    "color": "#FCD202",
    "url": "https://codepen.io/"
  }, {
    "country": "UK",
    "visits": 1122,
    "hiddenvalue": 3025,
    "color": "#F8FF01",
    "url": "https://codepen.io/"
  }, {
    "country": "France",
    "visits": 1114,
    "hiddenvalue": 3025,
    "color": "#B0DE09",
    "url": "https://codepen.io/"
  }, {
    "country": "India",
    "visits": 984,
    "hiddenvalue": 3025,
    "color": "#04D215",
    "url": "https://codepen.io/"
  }, {
    "country": "Spain",
    "visits": 711,
    "hiddenvalue": 3025,
    "color": "#0D8ECF",
    "url": "https://codepen.io/"
  }, {
    "country": "Netherlands",
    "visits": 665,
    "hiddenvalue": 3025,
    "color": "#0D52D1",
    "url": "https://codepen.io/"
  }, {
    "country": "Russia",
    "visits": 580,
    "hiddenvalue": 3025,
    "color": "#2A0CD0",
    "url": "https://codepen.io/"
  }, {
    "country": "South Korea",
    "visits": 443,
    "hiddenvalue": 3025,
    "color": "#8A0CCF",
    "url": "https://codepen.io/"
  }, {
    "country": "Canada",
    "visits": 441,
    "hiddenvalue": 3025,
    "color": "#CD0D74",
    "url": "https://codepen.io/"
  }],
  "responsive": {
    "enabled": true,
    "addDefaultRules": false,
    "rules": [{
      "maxWidth": 600,
      "overrides": {
        "rotate": true,
        "creditsPosition": "bottom-right",
        "columnSpacing": 5,
        "minMarginLeft": 38,
        "depth3D": 0,
        "angle": 0,
        "graphs": [{
          "hidden": false
        }, {
          "columnWidth": 1
        }],
        "legend": {
          "enabled": true,
          "useGraphSettings": true,
          "labelText": "Country",
          "fontSize": 14
        },
        "categoryAxis": {
          "labelsEnabled": false,
          "tickLength": 0
        },
        "valueAxes": [{
          "position": "top"
        }, {
          "position": "bottom",
          "includeHidden": true
        }]
      }
    }]
  },
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "No. of Visitors"
  }, {
    "id": "second",
    "includeHidden": false
  }],
  "startDuration": 1,
  "graphs": [{
    "labelText": "[[category]]",
    "labelPosition": "inside",
    "id": "label-only",
    "showBalloon": false,
    "fillAlphas": 0,
    "lineAlpha": 0,
    "hidden": true, //hide by default for larger screen sizes
    "columnWidth": .6,
    "visibleInLegend": false,
    "showAllValueLabels": true,
    "type": "column",
    "urlField": "url",
    "urlTarget": "_blank",
    "valueField": "hiddenvalue", //use hidden value to make labels clickable
    "includeInMinMax": false //make sure the graph doesn't affect the value axis min/max when zooming.
  }, {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "urlField": "url",
    "urlTarget": "_blank",
    "valueField": "visits"
  }, {
    //invisible graph for the second axis
    "fillAlphas": 0,
    "lineAlpha": 0,
    "hidden": true,
    "visibleInLegend": false,
    "showBalloon": false,
    "valueField": "visits",
    "valueAxis": "second"
  }],
  "depth3D": 10,
  "angle": 45,
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "classNameField": "Ctglabel",
    "labelRotation": 45,
    "minHorizontalGap": 50,
    "title": "Country",
    "urlTarget": "_blank",
    "listeners": [{
      "event": "clickItem",
      "method": function(event) {
        window.open(event.serialDataItem.dataContext.url, '_blank');
      }
    }]
  },
  "export": {
    "enabled": true
  }
});
</script>

<div id="chartdiv" class="chartdiv"></div>
<h2>Second Chart</h2>
<div id="chart1div" class="chartdiv"></div>