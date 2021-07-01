<?php 
    include_once('../../php/connect.php');
?>
<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `rental` 
                SET `idcard` = '".$_POST['idcard']."', 
                `carid` = '".$_POST['carid']."',
                `created_at` = '".$_POST['created_at']."',
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