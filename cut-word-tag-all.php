<?php 
  include_once('php/connect.php');
  session_start();
  $id = $_GET['id'];

  $sql = "SELECT * FROM `words` ";
  $result = $conn->query($sql);
  // $row = $result->fetch_assoc();
  // $sql = "SELECT words.text_id, words.text_row, words.word, tags.text_row, tags.tag 
  //         FROM words 
  //         LEFT JOIN tags 
  //         ON words.text_row = tags.text_row
  //         ORDER BY `text_id`";
  //         $result = $conn->query($sql);
          // $row = $result->fetch_assoc();

  // echo $id;
  // echo $row['word'];
  // echo $row['tag'];
  // exit;
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

      <!-- /.card-header -->
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-striped">
            <thead>
            <h5 class="card-title">ผลลัพธ์ที่ได้จากระบบตัดคํา ตัดข้อมูลพร้อมกำกับคำ ความคิดเห็นทั้งหมด</h5>
            <h6>ผลลัพธ์ที่ได้จากระบบตัดคําทีเล็กซ์พลัสพลัส ( Tlex ++ ) จะอยู่ในรูปแบบของ JSON Arrays จะมีองค์ประกอบ 2 ส่วนคือ อาเรย์ของคำที่ถูกตัด (words) และ อาเรย์ tags เป็นชนิดของคำ (part of speech)</h6>
            <tr>
              <th scope="col">#</th>
              <th scope="col">text_id</th>
              <th scope="col">text_row</th>
              <th scope="col">word</th>
              <!-- <th scope="col">tag</th> -->
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
                  <td><?php echo $row['text_id']; ?></td>
                  <td><?php echo $row['text_row']; ?></td>
                  <td><?php echo $row['word']; ?></td>
                  <!-- <td><?php echo $row['tag']; ?></td> -->
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


