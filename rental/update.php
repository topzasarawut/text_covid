<?php include_once('../authen.php') ?>
<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `rental` 
                SET `idcard` = '".$_POST['idcard']."', 
                `carid` = '".$_POST['carid']."',
                `status` = '".$_POST['status']."', 
                `updated_at` = '".date("Y-m-d H:i:s")."',
                `money` = '".$_POST['money']."', 
                `status_re` = '".$_POST['status_re']."'
                WHERE `id` = '".$_POST['id']."';";

        $result = $conn->query($sql);
        if($result){
            echo '<script> alert("Finished Updating!")</script>'; 
            header('Refresh:0; url=index.php');
        } else {
            echo '<script> alert("Update Error!")</script>'; 
            header('Refresh:0; url=index.php');
        }

    } else {
        header('Refresh:0; url=index.php');
    }

?>