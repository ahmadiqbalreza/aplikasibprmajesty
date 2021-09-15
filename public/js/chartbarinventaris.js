// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("inventarisBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["PKM", "PRK", "FNO", "FNB"],
    datasets: [{
      label: "Total",
      backgroundColor: ["#0d6efd", "#198754","#dc3545","#ffc107"],
      borderColor: "rgba(2,117,216,1)",
      data: [170, 100, 80, 3],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'Jenis'
        },
        gridLines: {
          display: true
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 200,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
