<?php
  include_once('php/connect.php');
  $id = $_GET['id'];
  $sql = "SELECT * FROM `text` WHERE `id` = '".$id."' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $text = $row['text'];

    $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.aiforthai.in.th/tpos",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "text=$text",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded",
            "Apikey: LjfFsIsruOe9tpOMT5qxeRDsPosBXT7T"
        )
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        // echo $response;
        }

    // $words = json_decode($response,true);
    // echo var_dump($words);
    // echo $word;
    // print_r($response);
    // exit;


    $words = json_decode($response,true);
    $word = $words[words];
    // var_dump($word);
    $tags = json_decode($response,true);
    $tag = $tags[tags];
    // var_dump($tag);
    // exit;

    //  echo $word[0];
    // exit; 

     // foreach($word as $w => $valw) {
    //     // echo "$w = $valw<br>";
    //     // echo "$w<br>";
    //     echo "$valw<br>";
    // }

    // foreach($word as $w => $valw) {
    //     // echo "$w = $valw<br>";
    //     // echo "$w<br>";
    //     echo "$valw<br>";
    // }
      
    // foreach($tag as $t => $valt) {
    //     // echo "$t = $valt<br>";
    //     echo "$valt<br>";
    // }

    // foreach($word as $w => $valw) {
    //     echo "<br>".$w = $valw;
    // }
    // foreach($tag as $t => $valt) {
    //     echo "<br>".$t = $valt;
    // }

    // for($i=0;$i<count($word);$i++){
    // for($i=0;$i<count($word);$i++){
    // }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8, JSON_UNESCAPED_UNICODE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataSocialMedia</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<?php
        // require_once('php/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
            foreach($tag as $t => $valt) {
                        $sql = "INSERT INTO `tags` (`id`, `text_id`, `tag`) 
                        VALUES (NULL, '".$_POST['text_id']."', '$valt');";
                // echo $sql;
                // exit;
                $result = $conn->query($sql);
            }
                /**
                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                 */                
                if($result){
                    echo '<script> alert("Finished Creating!")</script>';
                    header('Refresh:0; url=datasocial.php');
                }else{
                    echo '<script> alert("Creating Error!")</script>';
                    header('Refresh:0; url=datasocial.php');
                }
            // }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
                            DataSocialMedia
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="hashtag" class="col-sm-3 col-form-label">hashtag</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="hashtag" name="hashtag" placeholder="hashtag" value="<?php echo $row['hashtag']; ?>" disabled required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-sm-3 col-form-label">text</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="text" name="text" placeholder="text" value="<?php echo $row['text']; ?>" disabled>
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-sm-3 col-form-label">text_id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="text_id" name="text_id" placeholder="text_id" value="<?php echo $row['id']; ?>" required>
                                </div>    
                            </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="บันทึก">
                            <a class="btn btn-primary" href="datasocial.php">ย้อนกลับไป</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->       
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>