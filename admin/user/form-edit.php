<?php 
  include_once('../../php/connect.php');
  $id = $_GET['id'];
  $sql = "SELECT idcard, username, password, first_name, last_name, address, email, phone, status_user FROM `users` WHERE `id` = '".$id."' ";
  $result = $conn->query($sql);
  // echo $result;
  // exit;
  $row = $result->fetch_assoc();
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
						<a href="#" class="list-group-item list-group-item-action">รถยนต์</a>
						<a href="../user" class="list-group-item list-group-item-action active">สมาชิก</a>
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

                    <!-- form start -->
                    <form role="form" action="update.php" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mx-auto mt-0">
                                <div class="card">
                                    <form action="" method="POST" enctype="multipart/form-data">           
                                        <div class="card-header text-center">
                                            แก้ไขข้อมูลสมาชิก
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="idcard" class="col-sm-3 col-form-label">เลขบัตรประชาชน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="idcard" name="idcard" value="<?php echo $row['idcard']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>"  required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>"  required>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <label for="first_name" class="col-sm-3 col-form-label">ชื่อจริง</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>"  required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-sm-3 col-form-label">นามสกุล</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>"  required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">อีเมลล์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>"  required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>"  required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">ที่อยู่</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>"  required>
                                                </div>
                                            </div>
                                            <label>Select Status</label>
                                            <select class="form-control" required name="status_user">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="1" <?php echo $row['status_user'] == '1'? 'selected': '' ?>>ปกติ</option>
                                                <option value="2" <?php echo $row['status_user'] == '2'? 'selected': '' ?>>งดการใช้งาน</option>
                                            </select>
                                            </div>
 
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            
                                        </div>
                                        <div class="card-footer text-center">
                                            <input type="submit" name="submit" class="btn btn-success" value="บันทึก">
                                            <a class="btn btn-primary" href="index.php">ย้อนกลับไป</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    
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


