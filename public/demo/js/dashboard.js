$(document).ready(function () {


    //dashboard toggle
    $('#sidebar-toggler').click(function () {
        $('.sidebar').toggleClass('active');
        $('.content').toggleClass('full')
    });


    // charts
    var pieData = {
        labels: ["Returns", "Sales", "Discounts"],
        datasets: [{
            data: [320, 500, 230],
            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
            hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
        }]
    };
    var options = {
        segmentShowStroke: false,
        animateScale: true,
        responsive: true,
        legend: {
            display: true,
            position: "bottom"
        }
    };
    var gas2 = document.getElementById("pie").getContext("2d");
    new Chart(gas2, {
        type: "pie",
        data: pieData,
        options: options
    });

    var ctx = document.getElementById("line").getContext("2d");
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: "line",

        // The data for our dataset
        data: {
            labels: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July"
            ],
            datasets: [{
                label: "Sales last year",
                backgroundColor: "#02dad38c",
                borderColor: "#00AFA9",
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            segmentShowStroke: false,
            animateScale: true,
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: true,
                position: "bottom"
            }
        }
    });



});