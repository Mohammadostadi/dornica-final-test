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


    <?php

$today = strtotime("today"); 
$days = [];
$data = [];
for($i = 9; $i >= 0; $i--){
    $last_week = strtotime("-$i day",$today);
    $day = "'".jdate('l', $last_week)."'";
    $date = date("Y/m/d",$last_week);
    $res = $db->where("setdate LIKE '%$date%'")
    ->getValue('view', 'COUNT(*)');
    $days[] = $day;
    $data[] = $res;
}
$data = implode(', ', $data);
$days = implode(', ', $days);

?>

    var options = {
        series: [{
            name: "New Visitors",
            data: [<?= $data ?>]
        }],
        chart: {
            foreColor: '#9a9797',
            type: "bar",
            //width: 130,
            stacked: true,
            height: 280,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 15,
                blur: 4,
                opacity: .12,
                color: "#3461ff"
            },
            sparkline: {
                enabled: !1
            }
        },
        markers: {
            size: 0,
            colors: ["#3461ff", "#c1cfff"],
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
                //endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        legend: {
            show: false,
        },
        stroke: {
            show: !0,
            width: 0,
            curve: "smooth"
        },
        colors: ["#3461ff", "#c1cfff"],
        xaxis: {
            categories: [<?= $days ?>]
        },
        grid:{
            show: true,
            borderColor: 'rgba(66, 59, 116, 0.15)',
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

    var chart = new ApexCharts(document.querySelector("#chart11"), options);
    chart.render();




});

</script>