var options = {
    chart: {
        height: 380,
        type: "line",
        zoom: {
            enabled: !1
        },
        toolbar: {
            show: !1
        },
    },
    colors: ["#5b73e8", "#f1b44c"],
    dataLabels: {
        enabled: !1
    },
    stroke: {
        width: [3, 3],
        curve: "straight"
    },
    series: [{
            name: "High - 2018",
            data: [26, 24, 32, 36, 33, 31, 33]
        },
    ],
    title: {
        text: "Average High & Low Temperature",
        align: "left"
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: 0.2
        },
        borderColor: "#f1f1f1",
    },
    markers: {
        style: "inverted",
        size: 6
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
        title: {
            text: "Month"
        },
    },
    yaxis: {
        title: {
            text: "Temperature"
        },
        min: 5,
        max: 40
    },
    legend: {
        position: "top",
        horizontalAlign: "right",
        floating: !0,
        offsetY: -25,
        offsetX: -5,
    },
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                toolbar: {
                    show: !1
                }
            },
            legend: {
                show: !1
            }
        },
    }, ],
},
chart = new ApexCharts(
    document.querySelector("#line_chart_datalabel"),
    options
);
chart.render();
options = {
chart: {
    height: 380,
    type: "line",
    zoom: {
        enabled: !1
    },
    toolbar: {
        show: !1
    },
},
colors: ["#5b73e8", "#f1b44c", "#34c38f"],
dataLabels: {
    enabled: !1
},
stroke: {
    width: [3, 4, 3],
    curve: "straight",
    dashArray: [0, 8, 5]
},
series: [{
        name: "Session Duration",
        data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10],
    },
    {
        name: "Page Views",
        data: [36, 42, 60, 42, 13, 18, 29, 37, 36, 51, 32, 35],
    },
    {
        name: "Total Visits",
        data: [89, 56, 74, 98, 72, 38, 64, 46, 84, 58, 46, 49],
    },
],
title: {
    text: "Page Statistics",
    align: "left"
},
markers: {
    size: 0,
    hover: {
        sizeOffset: 6
    }
},
xaxis: {
    categories: [
        "01 Jan",
        "02 Jan",
        "03 Jan",
        "04 Jan",
        "05 Jan",
        "06 Jan",
        "07 Jan",
        "08 Jan",
        "09 Jan",
        "10 Jan",
        "11 Jan",
        "12 Jan",
    ],
},
tooltip: {
    y: [{
            title: {
                formatter: function(e) {
                    return e + " (mins)";
                },
            },
        },
        {
            title: {
                formatter: function(e) {
                    return e + " per session";
                },
            },
        },
        {
            title: {
                formatter: function(e) {
                    return e;
                },
            },
        },
    ],
},
grid: {
    borderColor: "#f1f1f1"
},
};
// (chart = new ApexCharts(
// document.querySelector("#spline_area"),
// options
// )).render();
// options = {
// chart: {
//     height: 350,
//     type: "bar",
//     toolbar: {
//         show: !1
//     }
// },
// plotOptions: {
//     bar: {
//         horizontal: !1,
//         columnWidth: "45%",
//         endingShape: "rounded"
//     },
// },
// dataLabels: {
//     enabled: !1
// },
// stroke: {
//     show: !0,
//     width: 2,
//     colors: ["transparent"]
// },
// series: [{
//         name: "Net Profit",
//         data: [46, 57, 59, 54, 62, 58, 64, 60, 66]
//     },
//     {
//         name: "Revenue",
//         data: [74, 83, 102, 97, 86, 106, 93, 114, 94]
//     },
//     {
//         name: "Free Cash Flow",
//         data: [37, 42, 38, 26, 47, 50, 54, 55, 43]
//     },
// ],
// colors: ["#f1b44c", "#5b73e8", "#34c38f"],
// xaxis: {
//     categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
// },
// yaxis: {
//     title: {
//         text: "$ (thousands)"
//     }
// },
// grid: {
//     borderColor: "#f1f1f1"
// },
// fill: {
//     opacity: 1
// },
// tooltip: {
//     y: {
//         formatter: function(e) {
//             return "$ " + e + " thousands";
//         },
//     },
// },
// };
// (chart = new ApexCharts(
// document.querySelector("#column_chart"),
// options
// )).render();
// options = {
// chart: {
//     height: 350,
//     type: "bar",
//     toolbar: {
//         show: !1
//     }
// },
// plotOptions: {
//     bar: {
//         dataLabels: {
//             position: "top"
//         }
//     }
// },
// dataLabels: {
//     enabled: !0,
//     formatter: function(e) {
//         return e + "%";
//     },
//     offsetY: -20,
//     style: {
//         fontSize: "12px",
//         colors: ["#304758"]
//     },
// },
// series: [{
//     name: "Inflation",
//     data: [2.5, 3.2, 5, 10.1, 4.2, 3.8, 3, 2.4, 4, 1.2, 3.5, 0.8],
// }, ],
// colors: ["#5b73e8"],
// grid: {
//     borderColor: "#f1f1f1"
// },
// xaxis: {
//     categories: [
//         "Jan",
//         "Feb",
//         "Mar",
//         "Apr",
//         "May",
//         "Jun",
//         "Jul",
//         "Aug",
//         "Sep",
//         "Oct",
//         "Nov",
//         "Dec",
//     ],
//     position: "top",
//     labels: {
//         offsetY: -18
//     },
//     axisBorder: {
//         show: !1
//     },
//     axisTicks: {
//         show: !1
//     },
//     crosshairs: {
//         fill: {
//             type: "gradient",
//             gradient: {
//                 colorFrom: "#D8E3F0",
//                 colorTo: "#BED1E6",
//                 stops: [0, 100],
//                 opacityFrom: 0.4,
//                 opacityTo: 0.5,
//             },
//         },
//     },
//     tooltip: {
//         enabled: !0,
//         offsetY: -35
//     },
// },
// fill: {
//     gradient: {
//         shade: "light",
//         type: "horizontal",
//         shadeIntensity: 0.25,
//         gradientToColors: void 0,
//         inverseColors: !0,
//         opacityFrom: 1,
//         opacityTo: 1,
//         stops: [50, 0, 100, 100],
//     },
// },
// yaxis: {
//     axisBorder: {
//         show: !1
//     },
//     axisTicks: {
//         show: !1
//     },
//     labels: {
//         show: !1,
//         formatter: function(e) {
//             return e + "%";
//         },
//     },
// },
// title: {
//     text: "Monthly Inflation in Argentina, 2002",
//     floating: !0,
//     offsetY: 320,
//     align: "center",
//     style: {
//         color: "#444"
//     },
// },
// };
// (chart = new ApexCharts(
// document.querySelector("#column_chart_datalabel"),
// options
// )).render();
// options = {
// chart: {
//     height: 350,
//     type: "bar",
//     toolbar: {
//         show: !1
//     }
// },
// plotOptions: {
//     bar: {
//         horizontal: !0
//     }
// },
// dataLabels: {
//     enabled: !1
// },
// series: [{
//     data: [380, 430, 450, 475, 550, 584, 780, 1100, 1220, 1365]
// }],
// colors: ["#34c38f"],
// grid: {
//     borderColor: "#f1f1f1"
// },
// xaxis: {
//     categories: [
//         "South Korea",
//         "Canada",
//         "United Kingdom",
//         "Netherlands",
//         "Italy",
//         "France",
//         "Japan",
//         "United States",
//         "China",
//         "Germany",
//     ],
// },
// };
// (chart = new ApexCharts(
// document.querySelector("#radial_chart"),
// options
// )).render();
// options = {
// chart: {
//     height: 420,
//     type: "pie"
// },
// series: [92, 4, 4],
// labels: ["Direct", "Referral", "Search Engine"],
// colors: ["#3366cc", "#DC3912", "#FF9900"],
// legend: {
//     show: !0,
//     position: "bottom",
//     horizontalAlign: "center",
//     verticalAlign: "middle",
//     floating: !1,
//     fontSize: "14px",
//     offsetX: 0,
// },
// responsive: [{
//     breakpoint: 600,
//     options: {
//         chart: {
//             height: 240
//         },
//         legend: {
//             show: !1
//         }
//     },
// }, ],
// };
// (chart = new ApexCharts(
// document.querySelector("#pie_chart"),
// options
// )).render();
// options = {
// chart: {
//     height: 320,
//     type: "donut"
// },
// series: [44, 55, 41, 17, 15],
// labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"],
// colors: ["#34c38f", "#5b73e8", "#f1b44c", "#50a5f1", "#f46a6a"],
// legend: {
//     show: !0,
//     position: "bottom",
//     horizontalAlign: "center",
//     verticalAlign: "middle",
//     floating: !1,
//     fontSize: "14px",
//     offsetX: 0,
// },
// responsive: [{
//     breakpoint: 600,
//     options: {
//         chart: {
//             height: 240
//         },
//         legend: {
//             show: !1
//         }
//     },
// }, ],
// };
// (chart = new ApexCharts(
// document.querySelector("#donut_chart"),
// options
// )).render();