<style>
    /* Styling chart lama */
    #chartdiv1, #chartdiv {
        width: 90%;
        height: 350px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 30px;
    }
    /* Styling untuk chart dynamic (multiple pie charts) */
    .chart-grid-container {
      width: 90%;
      margin-left: auto;
        margin-right: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .chart-card {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        text-align: center;
    }
    .chart-card h4 {
        margin: 0 0 10px 0;
        font-size: 16px;
        font-weight: bold;
        color: #333;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .chart-pie-dynamic {
        width: 100%;
        height: 250px;
    }
    /* Styling chart baru (Global Status Pie Chart) */
    #chartdiv_global_status {
        width: 50%; 
        height: 350px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>

<script src="https://cdn.amcharts.com/lib/5/core.js"></script>
<script src="https://cdn.amcharts.com/lib/5/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="http://www.amcharts.com/lib/5/plugins/dataloader/dataloader.min.js" type="text/javascript"></script> 

<div id="chartdiv1"></div>
<div id="chartdiv"></div>

<div style="text-align: center; font-weight: bold; margin-top: 30px;">
    <h3>Status Berlaku vs Tidak Berlaku Per Kategori</h3>
</div>
<div class="chart-grid-container">
    <?php 
    if(!empty($chart_kategori_status)) {
        $allowed = ['Peraturan Daerah', 'Peraturan Bupati', 'Peraturan Desa'];
        foreach($chart_kategori_status as $index => $row) { 
            // Filter di sini
            if (in_array($row['category'], $allowed)) {
    ?>
        <div class="chart-card">
            <h4><?= $row['category']; ?></h4> 
            <div id="chart_cat_<?= $index ?>" class="chart-pie-dynamic"></div>
        </div>
    <?php 
            }
        } 
    }
    ?>
</div>

<div style="text-align: center; font-weight: bold; margin-top: 30px;">
    <h3>Ringkasan Status Produk Hukum Global</h3>
</div>
<div id="chartdiv_global_status"></div>


<script>
// AmCharts 5 Pie Chart Example
am5.ready(function() {

    // VARIABEL DATA BARU SESUAI PERMINTAAN USER
    var chartKategoriStatus = <?php echo json_encode($chart_kategori_status ?? [], JSON_NUMERIC_CHECK); ?>;
    
    // VARIABEL DATA LAMA SESUAI KODE AWAL USER
    var chartKategoriLama = <?php echo json_encode($chart_kategori ?? [], JSON_NUMERIC_CHECK); ?>;
    var dataTahun = <?php echo json_encode($chart_tahun ?? [], JSON_NUMERIC_CHECK); ?>;


    // ====================================================================
    // 1. GRAFIK AWAL: chartdiv1 (PIE CHART - Menggunakan data lama)
    // ====================================================================
    var root1 = am5.Root.new("chartdiv1");
    root1.setThemes([am5themes_Animated.new(root1)]);

    var chart1 = root1.container.children.push(am5percent.PieChart.new(root1, {
        layout: root1.verticalLayout
    }));

    var series1 = chart1.series.push(am5percent.PieSeries.new(root1, {
        valueField: "value", 
        categoryField: "category"
    }));

    series1.data.setAll(chartKategoriLama);
    series1.appear(1000); 

    // ====================================================================
    // 2. GRAFIK AWAL: chartdiv (COLUMN CHART - Tahunan)
    // ====================================================================
    var root = am5.Root.new("chartdiv");
    root.setThemes([am5themes_Animated.new(root)]);

    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false, panY: false, wheelX: "none", wheelY: "none", paddingLeft: 0
    }));

    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);

    var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30, minorGridEnabled: true });
    xRenderer.grid.template.set("visible", false);

    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0, categoryField: "name", renderer: xRenderer, tooltip: am5.Tooltip.new(root, {})
    }));

    xAxis.children.push(am5.Label.new(root, { text: 'Tahun', textAlign: 'center', x: am5.p50, fontWeight: 'bold' }));

    root.numberFormatter.setAll({ numberFormat: "####", numericFields: ["valueY"] });

    var yRenderer = am5xy.AxisRendererY.new(root, {});
    yRenderer.grid.template.setAll({ strokeDasharray: [2, 2] });

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0, min: 0, extraMax: 0.1, renderer: yRenderer
    }));

    yAxis.children.unshift(am5.Label.new(root, {
        text: 'Jumlah Produk Hukum', textAlign: 'center', y: am5.p50, rotation: -90, fontWeight: 'bold'
    }));

    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1", xAxis: xAxis, yAxis: yAxis, valueYField: "value",
        sequencedInterpolation: true, categoryXField: "name",
        tooltip: am5.Tooltip.new(root, { dy: 1, labelText: "{valueY}" })
    }));

    series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });

    series.columns.template.adapters.add("fill", (fill, target) => {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.columns.template.adapters.add("stroke", (stroke, target) => {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.bullets.push(function() {
        return am5.Bullet.new(root, {
            locationY: 1,
            sprite: am5.Picture.new(root, {
                templateField: "bulletSettings", width: 30, height: 30, centerX: am5.p50, centerY: am5.p50,
                shadowColor: am5.color(0x000000), shadowBlur: 4, shadowOffsetX: 4, shadowOffsetY: 4, shadowOpacity: 0.6
            })
        });
    });

    xAxis.data.setAll(dataTahun);
    series.data.setAll(dataTahun);

    series.appear(1000);
    chart.appear(1000, 100);

    // ====================================================================
    // 3. GRAFIK BARU: Multiple Pie Charts Per Kategori
    // ====================================================================
    var chartKategoriStatus = <?php echo json_encode($chart_kategori_status ?? [], JSON_NUMERIC_CHECK); ?>;
    const allowed = ['Peraturan Daerah', 'Peraturan Bupati', 'Peraturan Desa'];
    // --------------------------------

    // Sisanya biarkan tetap sama, karena chartKategoriStatus sudah terfilter
    chartKategoriStatus.forEach(function(item, index) {

        // CEK APAKAH KATEGORI INI MASUK LIST?
        if (!allowed.includes(item.category)) {
            return; // Skip/Lewati jika tidak masuk list
        }

        var divId = "chart_cat_" + index;
        var root_cat = am5.Root.new(divId);
        root_cat.setThemes([am5themes_Animated.new(root_cat)]);

        var chartData = [
            { 
                status: "Berlaku", 
                jumlah: parseInt(item.jumlah_berlaku || 0),
                sliceSettings: { fill: am5.color(0x28a745) } // Hijau
            },
            { 
                status: "Tidak Berlaku", 
                jumlah: parseInt(item.jumlah_tidak_berlaku || 0),
                sliceSettings: { fill: am5.color(0xdc3545) } // Merah
            }
        ];

        var chart_cat = root_cat.container.children.push(am5percent.PieChart.new(root_cat, {
            layout: root_cat.verticalLayout,
            innerRadius: am5.percent(50) 
        }));

        var series_cat = chart_cat.series.push(am5percent.PieSeries.new(root_cat, {
            valueField: "jumlah",
            categoryField: "status",
            alignLabels: false 
        }));

        series_cat.slices.template.setAll({
            templateField: "sliceSettings",
            strokeOpacity: 0
        });

        series_cat.labels.template.setAll({
            textType: "circular",
            radius: 4,
            text: "{category}: {value}"
        });

        series_cat.data.setAll(chartData);

        var legend_cat = chart_cat.children.push(am5.Legend.new(root_cat, {
            centerX: am5.p50, x: am5.p50, marginTop: 15, marginBottom: 15
        }));
        
        legend_cat.data.setAll(series_cat.dataItems);
        series_cat.appear(1000, 100);
    });

    // ====================================================================
    // 4. GRAFIK BARU: Global Status Pie Chart
    // ====================================================================

    var totalBerlaku = 0;
    var totalTidakBerlaku = 0;

    chartKategoriStatus.forEach(function(item) {
        totalBerlaku += parseInt(item.jumlah_berlaku || 0);
        totalTidakBerlaku += parseInt(item.jumlah_tidak_berlaku || 0);
    });

    var dataGlobal = [
        {
            status: "Berlaku", value: totalBerlaku,
            sliceSettings: { fill: am5.color(0x28a745) } // Hijau
        },
        {
            status: "Tidak Berlaku", value: totalTidakBerlaku,
            sliceSettings: { fill: am5.color(0xdc3545) } // Merah
        }
    ];

    var root_global = am5.Root.new("chartdiv_global_status");
    root_global.setThemes([am5themes_Animated.new(root_global)]);

    var chart_global = root_global.container.children.push(am5percent.PieChart.new(root_global, {
        layout: root_global.verticalLayout, innerRadius: am5.percent(50)
    }));

    var series_global = chart_global.series.push(am5percent.PieSeries.new(root_global, {
        valueField: "value", categoryField: "status", alignLabels: false
    }));

    series_global.slices.template.setAll({ templateField: "sliceSettings", strokeOpacity: 0 });

    series_global.labels.template.setAll({
        textType: "circular", radius: 4, text: "{category}: {value} ({value.percent.format()}%)"
    });

    series_global.data.setAll(dataGlobal);

    var legend_global = chart_global.children.push(am5.Legend.new(root_global, {
        centerX: am5.p50, x: am5.p50, marginTop: 15
    }));

    legend_global.data.setAll(series_global.dataItems);

    series_global.appear(1000, 100);


}); // end am5.ready()
</script>