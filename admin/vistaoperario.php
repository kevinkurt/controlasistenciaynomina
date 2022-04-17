<?php include 'includes/session.php'; ?>
<?php
include '../timezone.php';
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}
?>
<?php include 'includes/header.php'; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Operador</title>

  <style>

.content-wrapper{

background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
url("../images/john-schnobrich-yFbyvpEGHFQ-unsplash.jpg") ;
background-repeat: no-repeat;
background-position: center;
background-size: cover;

}



  .bienvenida{
    padding-top: 200px;
   padding-left: 440px;
  
    position: absolute;

    font-family: 'Akshar', sans-serif;
    color: white;

  }

  .bienvenida h1{
    font-size: 9rem;
  }

  .bienvenida p {
padding-left: 50px;
    position: absolute;
    
  }


  </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbarOperador.php'; ?>
    <?php include 'includes/menubarOperador.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">
         
          

                <div class="bienvenida"">
                     
                      <h1>Bienvenido</h1>  
            
                  <p>

                  
Sistema de Control de Nómina, ventas e inventarios
                  </p>
                    
                        </div>
           

        
                

                </div>
                
              </div>

   
              
        

    </div>

    
    <?php include 'includes/footer.php'; ?>

  </div>
  <!-- ./wrapper -->

  <!-- Chart Data -->
  <?php
  $and = 'AND YEAR(date) = ' . $year;
  $months = array();
  $ontime = array();
  $late = array();
  for ($m = 1; $m <= 12; $m++) {
    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";
    $oquery = $conn->query($sql);
    array_push($ontime, $oquery->num_rows);

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 0 $and";
    $lquery = $conn->query($sql);
    array_push($late, $lquery->num_rows);

    $num = str_pad($m, 2, 0, STR_PAD_LEFT);
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
    $(function() {
      $('#select_year').change(function() {
        window.location.href = 'home.php?year=' + $(this).val();
      });
    });
  </script>
</body>

</html>