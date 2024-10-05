<script>

    $(function () {
        "use strict";
        // chart 1
        var options = {
            series: [{
                name: "Total Orders",
                data: [<?= chartData(6, 'setdate', 'view') ?>]
            }],
            chart: {
                type: "line",
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
                        formatter: function (e) {
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
        for ($i = 9; $i >= 0; $i--) {
            $last_week = strtotime("-$i day", $today);
            $day = "'" . jdate('l', $last_week) . "'";
            $date = date("Y/m/d", $last_week);
            $res = $db->where("setdate LIKE '%$date%'")
                ->getValue('view', 'COUNT(*)');
            $days[] = $day;
            $data[] = $res;
        }
        $data = implode(', ', $data);
        $days = implode(', ', $days);

        ?>


        var options = {
            chart: {
                type: "area",
                toolbar: {
                    export: {
                        csv: {
                            headerCategory: 'Date;Time',
                            columnDelimiter: ';',
                            dateFormatter: function (timestamp) {
                                var date = dayjs(new Date(timestamp));
                                var format = 'ddd D. MMM;HH:mm'  // sic: Delimiter in here on purpose
                                var nextHour = Number(date.hour()) + 1;
                                var text = date.format(format) + ' - ' + nextHour + ':00';
                                return text;
                            },
                        }
                    },
                }
            },
            colors: ["#3461ff", "#c1cfff"],
            series: [{
                name: "Views",
                data: [<?= $data ?>]
            }],
            grid: {
                show: true,
                borderColor: 'rgba(66, 59, 116, 0.15)',
            },
            xaxis: {
                categories: [<?= $days ?>]
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
                        formatter: function (e) {
                            return ""
                        }
                    }
                },
                marker: {
                    show: !1
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#timeline-chart"), options);
        chart.render();

    });



</script>