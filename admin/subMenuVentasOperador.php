<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<head>

  <style>
    .content-header h1 {

      text-align: center;
 
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
        <h1>
          Ventas
        </h1>
        <ol class="breadcrumb">
          <li><a href="vistaoperario.php"><i class="fa fa-user"></i> Inicio</a></li>
          <li><a href="subMenuVentasOperador.php"><i class="fa fa-shopping-cart"></i> Ventas</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">


        <div class="row">
          <div class="col-lg-12">
            <div class="box">
              <div class="box-body">
                <div class="chart" style="margin-left: 300px;padding-top: 100px; ">
                  <br>

<div >


                  <form>
                    <div style="padding-left: 50px;">
                      <label for="fname">Cantidad </label>

                    </div>

                    <div>
                      <label for="fname">1 </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname">2 </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname">3 </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname">4 </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname">5 </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>



                  </form>

</div>

<div style="position: absolute;    padding-left: 180px;
">

                  <form >
                    <div style="padding-left: 50px;">
                      <label for="fname">Producto </label>

                    </div>

                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>



                  </form>


                  </div>


                  <div style="position: absolute;    padding-left: 350px;
">

                  <form >
                    <div style="padding-left: 40px;">
                      <label for="fname">valor unitario </label>

                    </div>

                    <div>
                      <label for="fname"></label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname"></label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>



                  </form>


                  </div>


                  <div style="position: absolute;    padding-left: 550px;
">

                  <form >
                    <div style="padding-left: 40px;">
                      <label for="fname">valor total </label>

                    </div>

                    <div>
                      <label for="fname"></label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname"></label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>


                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>

                    <div>
                      <label for="fname"> </label>

                      <input type="text" id="fname" name="fname" value="">
                    </div>



                  </form>


                  </div>




                  <!-- ./col -->

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

</body>