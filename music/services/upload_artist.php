<?php 

session_start();

require $_SESSION["DIR"]."/header.php";
?>

<?php
if(isset($_POST["delete_id"])){
    $delete_id = $_POST['delete_id'];

    $sql_delete= "DELETE FROM artists WHERE artist_id = $delete_id;";  

    require $_SESSION["DIR"].'/sql_files/connected.php';

    $result = $conn->query($sql_delete);

    if($result != 1) {
        echo "Eror!";
}

}
?>

<?php
if(isset($_POST["artistsName"])){
    $artist_name = $_POST['artistsName'];
    $artists_role = $_POST['artistsRole'];
    $artist_img = $_FILES['artistImg']['name'];

    $sql_insert = "INSERT INTO artists(artist_name,role,artist_img) VALUES ('$artist_name','$artists_role','$artist_img')";  

    require $_SESSION["DIR"].'/sql_files/connected.php';

    $result = $conn->query($sql_insert);

    if($result != 1) {
        echo "Eror!";
}

}
?>

<div class="content frame">
    <div class="upload-page">
        <form class="form-input" action="upload_artist.php" method="post" enctype="multipart/form-data">
            <p> Add Artist</p>
            <input type="text" placeholder="Enter Artist's Name" name="artistsName">
            <input type="text" placeholder="Enter Artist's Role" name="artistsRole">
            <p>Select artist image to upload: </p>
            <input type="file" name="artistImg" id="artistImg">
            <input type="submit" value="Add Artist" name="submit">
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
 <a class="artist-tile">
                    <div class="artist-avatar" style="background-image:  url('http://localhost/web_apps/music/assets/images/<?php echo $artist_img ?>'); background-size:cover">
                   </div>
                   <div class="artist-info">
                        <div class="artist-name"> <?php echo $artist_name ?></div>
                        <div class="artist-role"> <?php echo $artist_role ?></div>
                   </div>
                   <div class="button-edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <form action="" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $artist_id?>" >
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
