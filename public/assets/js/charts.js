Highcharts.chart('chart-skm', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Survey Kepuasan Masyarakat (SKM)'
    },
    subtitle: {
        text: 'Puskesmas Matur, Kecamatan Matur, Kabupaten Agam'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '11px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Puskesmas Matur'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Hasil Responden: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        colors: [
            '#FF6000', '#FF6000', '#FF6000', '#FF6000', '#FF6000', '#FF6000',
            '#FF6000', '#FF6000', '#FF6000'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            ['Persyaratan Pelayanan', 37.33],
            ['Prosedur Pelayanan', 31.18],
            ['Kecapatan Pelayanan', 27.79],
            ['Biaya Pelayanan', 22.23],
            ['Produk Pelayanan', 21.91],
            ['Kemampuan Petugas Pelayanan', 21.74],
            ['Perilaku Petugas Pelayanan', 21.32],
            ['Kualitas Sarana dan Prasarana Pelayanan', 20.89],
            ['Penanganan Pengaduan Pelayanan', 20.67]
        ],
        dataLabels: {
            enabled: false,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
