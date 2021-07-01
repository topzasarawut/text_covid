<?php 
  include_once('php/connect.php');
  session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataSocialMedia By Neverdie ๘ Studio</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <style>body,section{font-family: 'Prompt', sans-serif;}</style>
    <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
    
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
          $sql = "SELECT * FROM `text`";
          $result = $conn->query($sql);
        ?>

      <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <h5 class="card-title">ผลลัพธ์ที่ได้จากระบบตัดคํา ตัดข้อมูลพร้อมกำกับคำ 
                <a href="cut-word-tag-all.php" 
                    class="btn btn-sm btn-success text-white">
                    <i class="fas fa-edit"></i> output-all
                </a>
            </h5>
            
            <h6>ผลลัพธ์ที่ได้จากระบบตัดคําทีเล็กซ์พลัสพลัส ( Tlex ++ ) จะอยู่ในรูปแบบของ JSON Arrays จะมีองค์ประกอบ 2 ส่วนคือ อาเรย์ของคำที่ถูกตัด (words) และ อาเรย์ tags เป็นชนิดของคำ (part of speech)</h6>
            <tr>
              <th scope="col">#</th>
              <th scope="col">hashtag</th>
              <th scope="col">output</th>
              <th scope="col">text</th>
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
                  <td><?php echo $row['hashtag']; ?></td>
                  <td>
                      <a href="cut-word-tag.php?id=<?php echo $row['id']; ?>" 
                          class="btn btn-sm btn-success text-white">
                          <i class="fas fa-edit"></i> output
                      </a> 
                  </td>                
                  <td><?php echo $row['text']; ?></td>
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
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>
</html>
