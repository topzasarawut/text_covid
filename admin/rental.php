<?php 
include_once('../php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Car Rental Office By Neverdie ๘ Studio</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <style>body,section{font-family: 'Prompt', sans-serif;}</style>
    
</head>
<body>
    <!-- Section Navbar -->
    <?php include_once('includes/navbar.php') ?>

<!-- Page Content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <br>
        </div>
        <?php
            // $sql = "SELECT users.username, Car.CarReg, status  
            // FROM users, CarRental, Car 
            // WHERE users.UserID = CarRental.UserID AND Car.CarID=CarRental.CarID"; 

            // $sql = "SELECT users.username, Car.CarReg, created_at, final_at, money, status  
            // FROM users, CarRental, Car 
            // WHERE users.UserID = CarRental.UserID AND Car.CarID=CarRental.CarID ORDER BY created_at" ; 
            // $result = $conn->query($sql);

            $sql = "SELECT users.username, Car.CarReg, created_at, final_at, money, status  
            FROM users, CarRental, Car
            WHERE users.idcard = CarRental.idcard AND Car.CarID=CarRental.CarID ORDER BY created_at" ; 

            // echo $sql;
            // exit;
            $result = $conn->query($sql);
        ?> 

       <!-- /.card-header -->
       <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <h5 class="card-title">เช่ารถยนต์</h5>
            <tr>
                <th scope="col">#</th>
                <th scope="col">username</th>
                <th scope="col">CarReg</th>
                <th scope="col">created_at</th>
                <th scope="col">final_at</th>
                <th scope="col">money</th>
                <th scope="col">status</th>
                <th scope="col">ให้สิทธิ์</th> 
            </tr>
            </thead>
            <tbody>
            <?php 
            $num = 0;
            while ($row = $result->fetch_assoc()) {
              $num++;
              ?>
              <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['CarReg']; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $row['final_at']; ?></td>
                  <td><?php echo $row['money']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                  <a href="rentel_form.php" class="btn btn-sm btn-warning text-white">
                    <i class="fas fa-edit"></i>ให้สิทธิ์
                  </a> 
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


    <!-- Section Footer -->
    <?php include_once('../includes/footer.php') ?>


    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


     
</body>
</html>
