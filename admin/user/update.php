<?php 
    include_once('../../php/connect.php');
?>
<?php
    if(isset($_POST['submit'])){
        $sql = "UPDATE `users` 
                SET `idcard` = '".$_POST['idcard']."', 
                `username` = '".$_POST['username']."',
                `password` = '".$_POST['password']."',
                `first_name` = '".$_POST['first_name']."', 
                `last_name` = '".$_POST['last_name']."', 
                `address` = '".$_POST['address']."', 
                `email` = '".$_POST['email']."', 
                `phone` = '".$_POST['phone']."',
                `status_user` = '".$_POST['status_user']."'
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