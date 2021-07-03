$(document).ready(function () {

    'use strict';
    var root = window.location.origin + '/fcm-covid19/public/';

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    };

    var mode = 'index';
    var intersect = true;


    var grafik = $('#fcm-chart');

    $.ajax({
        url: root + 'grafik',
        type: 'GET',
        async: true,
        cache: false,
        dataType: 'json',
        success: function (response) {
            console.log(response)

            var fChart = new Chart(grafik, {
                type: 'line',
                data: {
                    labels: response.nama,
                    datasets: [
                        {
                            label: 'SI Global',
                            borderColor: '#4f81bd',
                            lineTension: 0,
                            data:
                                response.nilai

                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    scales: {
                        yAxes:[{
                            ticks: {
                                beginAtZero : false
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Grafik Silhouette Coefficient'
                    },
                }
            });
        }
    });
});
