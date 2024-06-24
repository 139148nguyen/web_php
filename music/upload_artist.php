<?php
$artist_name = $_POST['artistsName'];
$artists_role = $_POST['artistsRole'];
$artist_img = $_FILES['artistImg']['name'];

echo $artist_name;

$sql_insert = "INSERT INTO artists(artist_name,role,artist_img) VALUES ('$artist_name','$artists_role','$artist_img')";  

require __DIR__.'/sql_files/connected.php';

$result = $conn->query($sql_insert);

if($result != 1) {
    echo "Eror!";
}


?>