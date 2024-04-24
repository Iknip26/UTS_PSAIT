<?php

if(isset($_POST['nim']) && isset($_POST['kode_mk']) && isset($_POST['nilai'])) {
    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];

    // echo "<p>NIM: $nim</p>";
    // echo "<p>Kode MK: $kode_mk</p>";
    // echo "<p>Nilai: $nilai</p>";

} 

//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://localhost/UTS_PSAIT/uts_sait_restAPI2.php?nim='.$nim.'&kode_mk='.$kode_mk.'';
// $url = 'http://localhost/UTS_PSAIT/uts_sait_restAPI2.php?nim='. $nim. '&kode_mk=' . $kode_mk;
// echo $url;
$ch = curl_init($url);
$jsonData = array(
    'nim' =>  $nim,
    'kode_mk' =>  $kode_mk,
    'nilai' =>  $nilai,
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

echo "<br>Sukses Mengupdate Data !";
echo "<br><a href=index.php> OK </a>";

?>