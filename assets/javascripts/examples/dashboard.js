$(function () {
  "use strict";

  //TOASTR NOTIFICATION
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  toastr.options = {
    progressBar: true,
    positionClass: "toast-bottom-right",
    timeOut: 3500,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "slideDown",
    hideMethod: "fadeOut",
  };

  toastr.info(
    "Enjoy it!",
    '<h5 style="margin-top: 0px; margin-bottom: 5px;"><b>This is dashboard e-Forecasting!</b></h5>'
  );

  //AREA CHART EXAMPLE
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 
  var bar = document.getElementById("bar-chart");
  var options = {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  };

  var dataBars = {
    labels: ["2016", "2017", "2018", "2019"],
    datasets: [
        {
            label: "TI",
            fill: true,
            backgroundColor: "rgba(55, 209, 119, 0.45)",
            borderColor: "rgba(55, 209, 119, 0.45)",
            data: [91, 48, 93, 62]
        },
        {
            label: "SIKA",
            fill: true,
            backgroundColor: "rgba(175, 175, 175, 0.26)",
            borderColor: "rgba(175, 175, 175, 0.26)",
            data: [142, 86, 63, 38],
        },
        {
            label: "DKV",
            fill: true,
            backgroundColor: "rgba(20, 10, 100, 0.26)",
            borderColor: "rgba(20, 10, 100, 0.26)",
            data: [84, 100, 76, 24],
        }
    ],
    options: {
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
  };

  var barChar = new Chart(bar, {
    type: 'bar',
    data: dataBars,
    options: options

  });
  //MAGNIFIC POPUP GALLERY
  // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
  $(".gallery-wrap").magnificPopup({
    delegate: "a",
    type: "image",
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1],
    },
    tLoading: "Loading image #%curr%...",
    mainClass: "mfp-with-zoom",
    zoom: {
      enabled: true,
      duration: 300,
    },
  });
});
