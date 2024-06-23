<?php
$songs_name = $_POST['songsName'];
$artist = $_POST['artist'];
$song_path = $_FILES['songToUpload']['name'];

$sql_insert = "INSERT INTO songs(name,song_link,artist) VALUES ('$songs_name','$song_path','$artist')";  

require __DIR__.'/sql_files/connected.php';

$result = $conn->query($sql_insert);

if($result != 1) {
    echo "Eror!";
}


?>