window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(231,233,237)'
};

var randomScalingFactor = function () {
    return (Math.random() > 0.5 ? 1.0 : 1.0) * Math.round(Math.random() * 100);
};


var line2 = [0, 90, 60, 20, 10,60];

var MONTHS = ["10-08-2018", "21-07-2018", "18-06-2018", "26-05-218", "28-04-2018"];
var config = {
    type: 'line',
    data: {
        labels: '',
        datasets: [ {
            label: "Earning Chart",
            fill: false,
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            data: line2,
        }]
    },
    options: {
        responsive: true,
        layout:{
            padding:{
                left:20,
                right: 45,
                top: 0,
                bottom: 35
            }
        },
        title: {
            display: false,
            text: 'Chart.js Line Chart',
            ticks:{
                color:'rgb(255,255,255)'
            }
        },
        legend:{
            display:false
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: false,
                    labelString: 'Month'
                },
                
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    color: 'rgb(255,255,255)'
                },
            }]
        }
    }
};

var ctx = document.getElementById("canvas").getContext("2d");
var myLine = new Chart(ctx, config);