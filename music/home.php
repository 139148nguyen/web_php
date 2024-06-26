<div class="content frame">
            <div class="content__header">
                <div class="move-button">
                    <button class="prev-button">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="next-button">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
                <div class="login-signup-button">
                    <a href="" class="sign-up">Sign Up</a>
                    <a href="" class="log-in">Log In</a>
                </div>
            </div>
            <div class="content__body">
                <div class="list-artist list">
                    <div class="list-header">
                        <a href="" class="category-name">Popular artists</a>
                        <a href="" class="show-all">Show all</a>
                    </div>
                    <div class="list-body">
                        <?php 
                        $sql_select_artist = "SELECT *  FROM artists ORDER BY artist_name ASC LIMIT 7";
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
                        <a href="" class="artist-card">
                            <div class="artist-card__img " style="background-image:  url('http://localhost/web_apps/music/assets/images/<?php echo $artist_img ?>'); background-size:cover">

                            </div>
                            <div class="artist-card__title">
                                <h3> <?php echo $artist_name?> </h3>
                                <h5> <?php echo $artist_role?></h5>
                            </div>
                            <div class="play-icon">
                                <i class="fa-solid fa-play"></i>
                            </div>
                        </a>

                        <?php }}?>
                    </div>
                </div>
                <div class="list-song-ablum list">
                    <div class="list-header">
                        <a href="" class="category-name">Hot Songs</a>
                        <a href="" class="show-all">Show all</a>
                    </div>
                    <div class="list-body">
                         <?php 
            $sql_select_song = "SELECT * FROM songs ORDER BY song_name ASC LIMIT 6";
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
                        <a href="" class="song-album-card">
                            <div class="song-album-card__img" style="background-image:  url('http://localhost/web_apps/music/assets/images/<?php echo $song_img ?>'); background-size:cover">

                            </div>
                            <div class="song-album-card__title">
                                <h3><?php echo $song_name ?></h3>
                                <h5><?php echo $category?></h5>
                            </div>
                            <div class="play-icon">
                                <i class="fa-solid fa-play"></i>
                            </div>
                        </a>
                        <?php }}?>
                    </div>
                </div>
            </div>
        </div>

</div>