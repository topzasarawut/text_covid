<?php include_once('../php/connect.php'); ?> 
<?php
    $sql = "SELECT * FROM `rental`";
        $sql = "INSERT INTO `rental` (`idcard`, `carid`, `created_at`,`money`, `status_re`) 
                    VALUES ('" . $_POST['idcard'] . "', 
                            '" . $_POST['carid'] . "',
                            '" . $_POST['created_at'] . "',
                            '" . $_POST['money'] . "'
                            '" . $_POST['status_re'] . "');";
        $result = $conn->query($sql);
        echo $result;
        exit;
        if ($result) {
            echo '<script> alert("Finished Creating!")</script>';
            header('Refresh:0; url=index.php');
        } else {
            echo '<script> alert("Creating Error!")</script>';
            header('Refresh:0; url=index.php');
        }

?>
