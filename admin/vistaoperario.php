<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbarOperador.php'; ?>
  	<?php include 'includes/menubarOperador.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <section class="content-header">
      <h1>
        Nomina
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Nomina</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-body" style="padding-left: 100px;">
              <div class="chart">
                <br>
                <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <p>Inventario por terminar</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="employee.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
         </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">         
              <p>Inventario productos</p>
            </div>
            <div class="icon">
              <i class="fa fa-bookmark-o"></i>
            </div>
            <a href="payroll.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="small-box bg-yellow">
            <div class="inner">
              <p>Modificacion productos</p>
            </div>
            <a href="employee.php" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          <div class="row">
              <br>
        
          </div>
        </div>
      </div>
    </section>   

    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->
<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";
    $oquery = $conn->query($sql);
    array_push($ontime, $oquery->num_rows);

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 0 $and";
    $lquery = $conn->query($sql);
    array_push($late, $lquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $late = json_encode($late);
  $ontime = json_encode($ontime);

?>
<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
