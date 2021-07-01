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
							<li class="breadcrumb-item active" aria-current="page">User</li>
						</ol>
					</nav>

					<div class="row mt-3"> 
						<div class="col">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4>User Manager</h4>
									<div class="d-flex">
									<a class="btn btn-success" href="create.php" role="button">+ Add User</a>
									</div>
								</div>
								<div class="card-body">
									<p>สมาชิก ทั้งหมด</p>

									<?php
										$sql = "SELECT * FROM `users`";
										$result = $conn->query($sql);
									?>

									<table class="table">
										<thead>
											<tr>
												<th scope="col">ชื่อ</th>
												<th scope="col">สกุล</th>
												<th scope="col">อีเมล</th>
												<th scope="col">เบอร์โทรศัพท์</th>
												<th scope="col">status<br>1=ปกติ<br>2=งดการใช้งาน</th>
												<th scope="col">แก้ไข</th>
												<!-- <th scope="col">ลบ</th> -->
											</tr>
										</thead>
										<tbody>

										<?php 
											$num = 0;
											while ($row = $result->fetch_assoc()) {
											$num++;
										?>
											<tr>
												<td><?php echo $row['first_name']; ?></td>
												<td><?php echo $row['last_name']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['phone']; ?></td>
												<td><?php echo $row['status_user']; ?></td>
												<td>
												<a href="form-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning text-white">
													<i class="fas fa-edit"></i> edit
												</a> 
												</td>
												<!-- <td>
												<a href="delete.php" class="btn btn-sm btn-danger text-white">
													<i class="fas fa-delete"></i> ลบ
												</a> 
												</td> -->
											</tr>
										<?php } ?>
										</tbody>
									</table>
									<nav aria-label="Page navigation example">
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="#">Previous</a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#">Next</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Modal content</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Section Footer -->
    <?php include_once('../../includes/footer.php') ?>


    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


     
</body>
</html>
