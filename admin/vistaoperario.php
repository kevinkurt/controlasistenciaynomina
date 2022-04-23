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
    .content-wrapper {

      background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url("../images/john-schnobrich-yFbyvpEGHFQ-unsplash.jpg");
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;

    }



    .bienvenida {
      padding-top: 200px;
      padding-left: 240px;

      position: absolute;

      font-family: 'Akshar', sans-serif;
      color: white;

    }

    .bienvenida h1 {
      font-size: 9rem;
      text-align: center;
    }

    .bienvenida p {
      padding-left: 254px;
      position: absolute;
      font-size: 2rem;

    }
  </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navegadorOperador.php'; ?>
    <?php include 'includes/menubarOperador.php'; ?>
 

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="bienvenida">
                <h1>Bienvenidos a NominApp</h1>  
                  <p>
                    Sistema de Control de Nómina, ventas e inventarios
                  </p>                    
              </div>           
            </div>                
          </div>
     </div>    
  </div>
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