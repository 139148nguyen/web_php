<?php 

session_start();

require $_SESSION["DIR"]."/header.php";
?>

<?php
if(isset($_POST["delete_id"])){
    $delete_id = $_POST['delete_id'];

    $sql_delete= "DELETE FROM songs WHERE song_id = $delete_id;";  

    require $_SESSION["DIR"].'/sql_files/connected.php';

    $result = $conn->query($sql_delete);

    if($result != 1) {
        echo "Eror!";
}

}
?>

<?php
if(isset($_POST["songsName"])){
    $song_name = $_POST['songsName'];
    $category = $_POST['category'];
    $songs_img = $_FILES['songsImg']['name'];
    $artist_id = $_POST["artist_id"];
    $song_link = $_FILES['songsMp3']['name'];

    $sql_insert = "INSERT INTO songs(song_name,category,song_img,artist_id,song_link) VALUES ('$song_name','$category','$songs_img',$artist_id,'$song_link')";  

    require $_SESSION["DIR"].'/sql_files/connected.php';

    $result = $conn->query($sql_insert);

    if($result != 1) {
        echo "Eror!";
    }
}
?>

<div class="content frame">
    <div class="upload-page">
        <form class="form-input" action="upload_songs.php" method="post" enctype="multipart/form-data">
            <p> Add Songs</p>
            <input type="text" placeholder="Enter Song's Name" name="songsName">
            <input type="text" placeholder="Enter Song's Category" name="category">
            <p>Select songs  to upload: </p>
            <input type="file" name="songsMp3" id="songsMp3">
            <p>Select songs image to upload: </p>
            <input type="file" name="songsImg" id="songsImg">
            <select name="artist_id" id="">
                <?php 
                 $sql_select_artist = "SELECT * FROM artists ORDER BY artist_name ASC";
            require $_SESSION["DIR"]."/sql_files/connected.php";
            $result = $conn->query($sql_select_artist);
            if($result->num_rows > 0 )
            {
                while ($row = $result->fetch_assoc()){
                    $artist_id = $row["artist_id"];
                    $artist_name = $row["artist_name"];
                    $artist_role = $row["role"];
                    $artist_img = $row["artist_img"];
                ?>
                <option value="<?php echo $artist_id?>"><?php echo $artist_name ?></option>


                <?php }
            }?>
            </select>
            <input type="submit" value="Add Songs" name="submit">
        </form>
        <div class="list-artist-sql">
            <center><h2 >Artist List</h2></center>
            <form action="">
                <div class="search-bar">
                        <input type="text" placeholder="Search Keyword">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                </div>
            </form>
            <ul class="list-arist">

        <?php 
            $sql_select_song = "SELECT * FROM songs ORDER BY song_name ASC";
            require $_SESSION["DIR"]."/sql_files/connected.php";
            $result = $conn->query($sql_select_song);
            if($result->num_rows > 0 )
            {
                while ($row = $result->fetch_assoc()){
                    $song_id = $row["song_id"];
                    $song_name = $row["song_name"];
                    $category= $row["category"];
                    $song_img = $row["song_img"];
                    $artist_id = $row["artist_id"];
                    
?>
            <a class="artist-tile">
                    <div class="artist-avatar" style="background-image:  url('http://localhost/web_apps/music/assets/images/<?php echo $song_img ?>'); background-size:cover">
                   </div>
                   <div class="artist-info">
                        <div class="artist-name"> <?php echo $song_name ?></div>
                        <div class="artist-role"> <?php echo $artist_id ?></div>
                   </div>
                   <div class="button-edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <form action="" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $song_id?>" >
                            <input type="submit" value="Delete" class="delete-button">
                         </form>
                   </div>
                   
            </a>
<?php


                }
            }
            
        ?>
               
            </ul>
        </div>
    </div>
</div>





</div>
<?php
require $_SESSION["DIR"]."/footer.php";


?>
