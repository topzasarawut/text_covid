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

    foreach($word as $w => $valw) {
        $sql = "INSERT INTO `words` (`id`, `text_id`, `word`) 
        VALUES (NULL, '".$id."', '$valw');";
// echo $sql;
// exit;
$result = $conn->query($sql);
}

 ?>

