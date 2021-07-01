<?php 
    include_once('../../php/connect.php');
?>
<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `cars` 
                SET `carid` = '".$_POST['carid']."', 
                `carreg` = '".$_POST['carreg']."',
                `category` = '".$_POST['category']."',
                `brand` = '".$_POST['brand']."', 
                `gen` = '".$_POST['gen']."', 
                `status` = '".$_POST['status']."'
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