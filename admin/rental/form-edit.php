  <?php 
    include_once('../../php/connect.php');
    session_start();
    $id = $_GET['id'];
    $sql = "SELECT * FROM `rental` WHERE `id` = '".$id."' ";
    $result = $conn->query($sql);
    // echo $sql;
    // exit;
    $row = $result->fetch_assoc();

    // $id =  $_SESSION['id'];
    // $first_name = $_SESSION['first_name'];
    // $idcard = $_SESSION['idcard'];
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
						<a href="../user" class="list-group-item list-group-item-action">สมาชิก</a>
						<a href="../rental" class="list-group-item list-group-item-action active">การเช่ารถ</a>
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
                                          ให้สิทธิ์การเช่ารถยนต์
                                        </div>
                                        <div class="card-body">
                                          <div class="form-group row">
                                                <label for="idcard" class="col-sm-3 col-form-label">idcard</label>
                                                <div class="col-sm-9">
                                                    <input disable type="text" class="form-control" id="idcard" name="idcard" value="<?php echo $row['idcard']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="carid" class="col-sm-3 col-form-label">รหัสประจำรถ</label>
                                                <div class="col-sm-9">
                                                    <input disable type="text" class="form-control" id="carid" name="carid" value="<?php echo $row['carid']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="created_at" class="col-sm-3 col-form-label">created_at</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="created_at" name="created_at" value="<?php echo $row['created_at']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="money" class="col-sm-3 col-form-label">จำนวนเงิน</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="money" name="money" value="<?php echo $row['money']; ?>" required>
                                                </div>    
                                            </div>
                                            <label>Select Permission</label>
                                            <select class="form-control" required name="status_re">
                                                <option value="" disabled selected>Select Permission</option>
                                                <option value="รออนุมัติ" <?php echo $row['status_re'] == 'รออนุมัติ'? 'selected': '' ?>>รออนุมัติ</option>
                                                <option value="ไม่อนุมัติ" <?php echo $row['status_re'] == 'ไม่อนุมัติ'? 'selected': '' ?>>ไม่อนุมัติ</option>
                                                <option value="อนุมัติ" <?php echo $row['status_re'] == 'อนุมัติ'? 'selected': '' ?>>อนุมัติ</option>
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
