<?php 
include_once('../../php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Car Rental Office By Neverdie ๘ Studio</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <style>body,section{font-family: 'Prompt', sans-serif;}</style>
    
</head>
<body>
    <!-- Section Navbar -->
    <?php include_once('../includes/navbar.php') ?>

    <section class="bg-light min-vh-100">
		<br><br><br>
		<div class="container-fluid">
			<div class="row mt-3">
				<div class="col-sm-3 col-md-2">
					<div class="list-group">
						<a href="../index.php" class="list-group-item list-group-item-action">Home</a>
						<a href="../car" class="list-group-item list-group-item-action">รถยนต์</a>
						<a href="#" class="list-group-item list-group-item-action active">สมาชิก</a>
						<a href="../rental" class="list-group-item list-group-item-action">การเช่ารถ</a>
						<a href="../../index.php" class="list-group-item list-group-item-action">ไปยังหน้าการเช่ารถยนต์</a>
					</div>
				</div>
				<div class="col">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Car</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
						</ol>
					</nav>

                    <?php
                        require_once('../../php/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
                        /**
                         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
                         */
                        if(isset($_POST['submit'])){
                            /**
                             * ตั้งชื่อไฟล์ภาพใหม่
                             */
                            $temp = explode('.',$_FILES['fileUpload']['name']);
                            $new_name = round(microtime(true)) . '.' . end($temp);
                            /**
                             * ตรวจสอบเงื่อนไขที่ว่า สามารถย้ายไฟล์รูปภาพเข้าสู่ storage ของเราได้หรือไม่
                             */
                            if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../../uploads/' .$new_name)){
                                /**
                                 * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
                                 * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
                                 */
                                $sql = "INSERT INTO `users` (`id`, `idcard`, `username`, `password`, `first_name`, `last_name`, `address`, `email`, `phone`, `picture`, `status_user`) 
                                        VALUES (NULL, '".$_POST['idcard']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['address']."', '".$_POST['email']."', '".$_POST['phone']."', '". $new_name."', '".$_POST['status_user']."');";
                                // echo $sql;
                                // exit;
                                $result = $conn->query($sql);
                                /**
                                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                                 */                
                                if($result){
                                    echo '<script> alert("สมัครสมาชิกสำเร็จ")</script>';
                                    header('Refresh:0; url=index.php');
                                }else{
                                    echo 'no';
                                }
                            }
                        }
                    ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto mt-0">
                                <div class="card">
                                    <form action="" method="POST" enctype="multipart/form-data">           
                                        <div class="card-header text-center">
                                            เพิ่มสมาชิก
                                        </div>
                                        <div class="card-body">
                                        <div class="form-group row">
                                                <label for="idcard" class="col-sm-3 col-form-label">เลขบัตรประชาชน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="idcard" name="idcard" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label for="first_name" class="col-sm-3 col-form-label">ชื่อจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-sm-3 col-form-label">นามสกุล</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">อีเมลล์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">ที่อยู่</label>
                                                <div class="col-sm-9">
                                                    <textarea cols="10" rows="5"class="form-control" id="address" name="address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fileUpload" class="col-sm-3 col-form-label">อัพโหลดรูปภาพ</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" id="fileUpload" name="fileUpload" onchange="readURL(this)">
                                                </div>    
                                            </div>
                                            <figure class="figure text-center d-none">
                                                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                                            </figure>
                                            <label>Select Status</label>
                                            <select class="form-control" required name="status_user">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="1">ปกติ</option>
                                                <option value="2">งดการใช้งาน</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <input type="submit" name="submit" class="btn btn-success" value="สมัครสมาชิก">
                                            <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>	
	</section>

    <!-- Section Footer -->
    <?php include_once('../includes/footer.php') ?>


    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


     
</body>
</html>
