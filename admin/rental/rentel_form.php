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
       
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="create.php" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
                            กรอกข้อมูลการเช่ารถยนต์
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="UserID" class="col-sm-3 col-form-label">UserID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="UserID" name="UserID" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="CarID" class="col-sm-3 col-form-label">CarID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="CarID" name="CarID" required>
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="created_at" class="col-sm-3 col-form-label">created_at</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="created_at" name="created_at" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="final_at" class="col-sm-3 col-form-label">final_at</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="final_at" name="final_at" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="money" class="col-sm-3 col-form-label">money</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="money" name="money" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="status" name="status" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="ยืนยัน">
                            <a class="btn btn-primary" href="rental.php">ย้อนกลับไป</a>
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