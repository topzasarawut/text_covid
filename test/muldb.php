<meta charset="utf-8" />
<?php
include('connection.php');

// print array ออกมาดู
print_r($_POST);

foreach($_POST['articles'] as $row=>$art){

$articles = mysql_real_escape_string($_POST['articles'][$row]);

$sql = "INSERT INTO insertmulti (articles) values ('$articles') ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

}

mysqli_close($con);

?>