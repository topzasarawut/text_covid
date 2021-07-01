<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มรถยนต์</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

    <?php
        require_once('../../php/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
                $sql = "INSERT INTO `cars` (`id`, `carid`, `carreg`, `category`, `brand`, `gen`) 
                VALUES (NULL, '".$_POST['carid']."', '".$_POST['carreg']."', '".$_POST['category']."', '".$_POST['brand']."', '".$_POST['gen']."');";
                $result = $conn->query($sql);  
                if($result){
                    echo '<script> alert("เพิ่มรถยนต์ สำเร็จ")</script>';
                    header('Refresh:0; url=index.php');
                }else{
                    echo 'no';
                }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
                            กรอกข้อมูลสมัครสมาชิก
                        </div>
                        <div class="card-body">
                        <div class="form-group row">
                                <label for="carid" class="col-sm-3 col-form-label">รหัสรถ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="carid" name="carid" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="carreg" class="col-sm-3 col-form-label">ทะเบียนรถ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="carreg" name="carreg" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">หมวดหมู่รถ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="category" name="category" required>
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="brand" class="col-sm-3 col-form-label">ยี่ห้อ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="brand" name="brand" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gen" class="col-sm-3 col-form-label">รุ่น</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="gen" name="gen" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="เพิ่มรถยนต์">
                            <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->       
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>