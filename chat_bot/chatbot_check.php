<?php
include "../konfigurasi_db.php";

$pesan = mysqli_real_escape_string($konek, $_POST['text']);
$cek = mysqli_query($konek, "SELECT jawaban FROM chatbot_qna WHERE pertanyaan LIKE '%$pesan%'");
$count = mysqli_num_rows($cek);
if ($count>0){
    $row = mysqli_fetch_array($cek);
    $data = $row['jawaban'];
    $recordcht = mysqli_query($konek, "INSERT INTO chatbot(user, bot) VALUES('$pesan', '$data')");
    echo $data;
    }else{
        echo "Maaf pesan tidak dimengerti, mohon diulangi";
    }
?>