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
  var area = document.getElementById("area-chart");

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
  var dataArea = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
      {
        label: "Golongan Darah A",
        fill: true,
        backgroundColor: "rgba(55, 209, 119, 0.45)",
        borderColor: "rgba(55, 209, 119, 0.45)",
        pointBorderColor: "rgba(75,192,192,1)",
        pointBackgroundColor: "#fff",
        pointHoverBackgroundColor: "343d3e",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        data: [5, 13, 11, 6, 9, 12, 14],
      },
      {
        label: "Golongan Darah B",
        fill: true,
        backgroundColor: "rgba(175, 175, 175, 0.26)",
        borderColor: "rgba(175, 175, 175, 0.26)",
        pointBorderColor: "rgba(75,192,192,1)",
        pointBackgroundColor: "#fff",
        pointHoverBackgroundColor: "#343d3e",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        data: [14, 6, 9, 13, 12, 16, 5],
      },
      {
        label: "Golongan Darah O",
        fill: true,
        backgroundColor: "rgba(175, 175, 175, 0.26)",
        borderColor: "rgba(175, 175, 175, 0.26)",
        pointBorderColor: "rgba(75,192,192,1)",
        pointBackgroundColor: "#fff",
        pointHoverBackgroundColor: "#343d3e",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        data: [14, 6, 16, 9, 13, 12, 5],
      },
      {
        label: "Golongan Darah AB",
        fill: true,
        backgroundColor: "rgba(175, 175, 175, 0.26)",
        borderColor: "rgba(175, 175, 175, 0.26)",
        pointBorderColor: "rgba(75,192,192,1)",
        pointBackgroundColor: "#fff",
        pointHoverBackgroundColor: "#343d3e",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        data: [13, 12, 14, 6, 9, 16, 5],
      },
    ],
    options: {
      scales: {
        yAxes: [
          {
            stacked: true,
          },
        ],
      },
    },
  };

  var areaChart = new Chart(area, {
    type: "line",
    data: dataArea,
    options: options,
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
