<?php 
  include_once('../php/connect.php');
  $id = $_GET['id'];
  $sql = "SELECT * FROM `rental` WHERE `id` = '".$id."' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
    // echo $id;
    // echo $row['idcard'];
    // exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>กรอกข้อมูลการเช่ารถยนต์</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<?php
        // require_once('php/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
                $sql = "INSERT INTO `rental` (`id`, `idcard`, `carid`, `created_at`,`money`, `status_re`) 
                        VALUES (NULL, '".$_POST['idcard']."', '".$_POST['carid']."', '".date("Y-m-d H:i:s")."', '".$_POST['money']."', '".$_POST['status_re']."');";
                // echo $sql;
                // exit;
                $result = $conn->query($sql);
                /**
                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                 */                
                if($result){
                    echo '<script> alert("Finished Creating!")</script>';
                    header('Refresh:0; url=index.php');
                }else{
                    echo '<script> alert("Creating Error!")</script>';
                    header('Refresh:0; url=index.php');
                }
            // }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
                            กรอกข้อมูลการเช่ารถยนต์
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="idcard" class="col-sm-3 col-form-label">idcard</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="idcard" name="idcard" placeholder="idcard" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="carid" class="col-sm-3 col-form-label">carid</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="carid" name="carid" placeholder="carid" required>
                                </div>    
                            </div>
                            <!-- <div class="form-group row">
                                <label for="created_at" class="col-sm-3 col-form-label">created_at</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="created_at" name="created_at" placeholder="created_at" value="<?php echo $row['created_at']; ?>" required>
                                </div>
                            </div> -->
                            <!-- <div class="form-group row">
                                <label for="final_at" class="col-sm-3 col-form-label">final_at</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="final_at" name="final_at" required>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="money" class="col-sm-3 col-form-label">money</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="money" name="money" placeholder="money" required>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="status_re" class="col-sm-3 col-form-label">status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="status_re" name="status_re" required>
                                </div>
                            </div> -->
                            <label>Select status</label>
                                <select class="form-control" required name="status_re">
                                    <option value="" disabled selected>Select status</option>
                                    <option value="รออนุมัติ" <?php echo $row['status_re'] == 'รออนุมัติ'? 'selected': '' ?>>รออนุมัติ</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="ยืนยัน">
                            <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->       
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <script>
        /**
         * ประกาศ function readURL()
         * เพื่อทำการตรวจสอบว่า มีไฟล์ภาพที่กำหนดถูกอัพโหลดหรือไม่
         * ถ้ามีไฟล์ภาพที่กำหนดถูกอัพโหลดอยู่ ให้แสดงไฟล์ภาพนั้นผ่าน elements ที่มี id="imgUpload"
         */
        function readURL(input){
            if(input.files[0]){
                var reader = new FileReader();
                $('.figure').addClass('d-block');
                reader.onload = function (e) {
                    console.log(e.target.result)
                    $('#imgUpload').attr('src',e.target.result).width(240);
                }  
                reader.readAsDataURL(input.files[0]);
            }         
        }
    </script>
</body>
</html>