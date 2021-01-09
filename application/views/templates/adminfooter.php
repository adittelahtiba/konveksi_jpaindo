  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/');?>js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="<?=base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="<?=base_url('assets/');?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('assets/');?>js/demo/chart-bar-demo.js"></script>
  <script src="<?=base_url('assets/');?>js/demo/chart-pie-demo.js"></script> -->
<?php
if ($title == 'Dahsboard') {
foreach($graf as $op){
	$bulan[] = $op->bulan;
	$jumlah[] = (float) $op->jumlah;
}
?>
  <script type="text/javascript">
  	// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?= json_encode($bulan) ?>,
    datasets: [{
      data: <?= json_encode($jumlah) ?>,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', 'red', 'yellow', 'orange', 'gray', 'blue', 'green', 'chocolate', 'purple', '#FFC107'],
      hoverBackgroundColor: 'black',
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
  </script>
<?php } ?>
</body>

</html>