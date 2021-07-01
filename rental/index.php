<?php 
  include_once('../php/connect.php');
  session_start();
  $id = $_SESSION['id'];
  $first_name = $_SESSION['first_name'];
  $idcard = $_SESSION['idcard'];
  // echo $id;
  // echo $first_name;
  // echo $idcard;
  // exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Rental Office By Neverdie ๘ Studio</title>
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
          <br><br>
      </div>            
      <!-- </section> -->
      <?php
        $sql = "SELECT * FROM rental
        WHERE `idcard` = '".$idcard."' ";  
        $result = $conn->query($sql);
        // echo $result;
        // exit;
      ?>
      <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
          <!-- <table class="table"> -->
										<thead>
                      <h5 class="card-title">การเช่ารถยนต์ของคุณ <?php echo $first_name;?> เลขบัตรประชาชน <?php echo $idcard;?></h5>
											<tr>
												<th scope="col">#</th>
												<th scope="col">รหัสรถยนต์</th>
												<th scope="col">วันที่ทำรายการ</th>
												<th scope="col">จำนวนเงิน</th>
												<th scope="col">สถาณะ</th>
												<!-- <th scope="col">ให้สิทธิ์</th> -->
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
												<td><?php echo $row['carid']; ?></td>
												<td><?php echo $row['created_at']; ?></td>
												<td><?php echo $row['money']; ?></td>
												<td><?php echo $row['status_re']; ?></td>
											</tr>
										<?php } ?>
										</tbody>
									<!-- </table> -->
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        <?php
          // $sql = "SELECT * FROM `cars`";
          $sql = "SELECT * FROM `cars`WHERE `status`=1";
          $result = $conn->query($sql);
          // echo $result;
          // exit;
        ?>
      <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <h5 class="card-title">เช่ารถยนต์</h5>
            <tr>
              <th scope="col">รหัสรถยนต์</th>
              <th scope="col">ทะเบียนรถ</th>
              <th scope="col">หมวดหมู่รถ</th>
              <th scope="col">ยี่ห้อ</th>
              <th scope="col">รุ่น</th>
              <th scope="col">เช่ารถ</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $num = 0;
            while ($row = $result->fetch_assoc()) {
              $num++;
              ?>
              <tr>
                
                <td><?php echo $row['carid']; ?></td>
                <td><?php echo $row['carreg']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['brand']; ?></td>
                <td><?php echo $row['gen']; ?></td>
                <td>
                <a href="rentel_form.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">
                  <i class="fas fa-edit"></i>เช่ารถยนต์
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
    <?php include_once('includes/footer.php') ?>


    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


     
</body>
</html>
