<script>

$(function() {
    "use strict";
// chart 1
    var options = {
        series: [{
            name: "Total Orders",
            data: [<?= chartData(6, 'setdate', 'view') ?>]
        }],
        chart: {
            type: "line",
            //width: 100%,
            height: 40,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#e72e7a"
            },
            sparkline: {
                enabled: !0
            }
        },
        markers: {
            size: 0,
            colors: ["#e72e7a"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "35%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2.5,
            curve: "smooth"
        },
        colors: ["#e72e7a"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !1
            },
            y: {
                title: {
                    formatter: function(e) {
                        return ""
                    }
                }
            },
            marker: {
                show: !1
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();



});

</script>