<?php include 'navigation.php';
require_once('db_configuration.php');

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION['username'])){

    echo 
    '
    <div class="container top_space">
    <center>
    <table>
    <tr>
    <td style="padding: 20px">
        <center>
        <a href="compile.php">
        <img src="assets/images/compile.png" width="150px" height="150px"/>
        <br>
        Compile
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="html.php" target="_blank">
        <img src="assets/images/html.png" width="150px" height="150px"/>
        <br>
        HTML
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="create_dances.php">
        <img src="assets/images/add.png" width="150px" height="150px"/>
        <br>
        Add Dances
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="profile.php">
        <img src="assets/images/users.png" width="150px" height="150px"/>
        <br>
        Users
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="report.php">
        <img src="assets/images/report.png" width="150px" height="150px"/>
        <br>
        Report
        </a>
        </center>
    </td>
    </tr>
    <tr>
    <td style="padding: 20px">
        <center>
        <a href="export.php">
        <img src="assets/images/export.png" width="150px" height="150px"/>
        <br>
        Export
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="import.php">
        <img src="assets/images/import.png" width="150px" height="150px"/>
        <br>
        Import
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="contents.php">
        <img src="assets/images/contents.png" width="150px" height="150px"/>
        <br>
        Contents
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="images.php">
        <img src="assets/images/images.png" width="150px" height="150px"/>
        <br>
        Images
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="videos.php">
        <img src="assets/images/videos.png" width="150px" height="150px"/>
        <br>
        Videos
        </a>
        </center>
    </td>
    <tr>
    <td style="padding: 20px">
        <center>
        <a href="configure_edit.php">
        <img src="assets/images/configure.png" width="150px" height="150px"/>
        <br>
        Configure
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="create_resources.php">
        <img src="assets/images/003-512.png" width="150px" height="150px"/>
        <br>
        Create Resources
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="update_resources.php">
        <img src="assets/images/index.png" width="150px" height="150px"/>
        <br>
        Edit Resources
        </a>
        </center>
     <td style="padding: 20px">
        <center>
        <a href="create_artists.php">
        <img src="assets/images/index_dance.png" width="150px" height="150px"/>
        <br>
        Create Artist
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="update_artists.php">
        <img src="assets/images/edit.png" width="150px" height="150px"/>
        <br>
        Edit Artist
        </a>
        </center>
    </td>
    </td>
    </tr>
    </tr>
    </center>
    </div>
    ';
}

else {
echo "<b>Please login as an admin.</b>";
}

?>
<br>
<footer>
<?php include 'footer.php'; ?>
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $('.navbar-nav li').removeClass('active');
        $('.navbar-nav li.page_admin').addClass('active');
    });
</script>
</body>
</html><?php include 'navigation.php';
require_once('db_configuration.php');

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if(isset($_SESSION['username'])){

    echo 
    '
    <div class="container top_space">
    <center>
    <table>
    <tr>
    <td style="padding: 20px">
        <center>
        <a href="compile.php">
        <img src="assets/images/compile.png" width="150px" height="150px"/>
        <br>
        Compile
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="html.php" target="_blank">
        <img src="assets/images/html.png" width="150px" height="150px"/>
        <br>
        HTML
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="create.php">
        <img src="assets/images/add.png" width="150px" height="150px"/>
        <br>
        Add
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="profile.php">
        <img src="assets/images/users.png" width="150px" height="150px"/>
        <br>
        Users
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="report.php">
        <img src="assets/images/report.png" width="150px" height="150px"/>
        <br>
        Report
        </a>
        </center>
    </td>
    </tr>
    <tr>
    <td style="padding: 20px">
        <center>
        <a href="export.php">
        <img src="assets/images/export.png" width="150px" height="150px"/>
        <br>
        Export
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="import.php">
        <img src="assets/images/import.png" width="150px" height="150px"/>
        <br>
        Import
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="contents.php">
        <img src="assets/images/contents.png" width="150px" height="150px"/>
        <br>
        Contents
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="images.php">
        <img src="assets/images/images.png" width="150px" height="150px"/>
        <br>
        Images
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="videos.php">
        <img src="assets/images/videos.png" width="150px" height="150px"/>
        <br>
        Videos
        </a>
        </center>
    </td>
    <tr>
    <td style="padding: 20px">
        <center>
        <a href="configure_edit.php">
        <img src="assets/images/configure.png" width="150px" height="150px"/>
        <br>
        Configure
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="create_resources.php">
        <img src="assets/images/003-512.png" width="150px" height="150px"/>
        <br>
        Create Resources
        </a>
        </center>
    </td>
    <td style="padding: 20px">
        <center>
        <a href="create_artists.php">
        <img src="assets/images/index_dance.png" width="150px" height="150px"/>
        <br>
        Create Artist
        </a>
        </center>
    </td>
    <td style="padding: 20px">
    <center>
    <a href="manage_dances.php">
    <img src="assets/images/index_dance.png" width="150px" height="150px"/>
    <br>
    Dances
    </a>
    </center>
</td>
    </td>
    </tr>
    </tr>
    </center>
    </div>
    ';
}

else {
echo "<b>Please login as an admin.</b>";
}

?>
<br>
<footer>
<?php include 'footer.php'; ?>
</footer>

<script type="text/javascript">
    $(document).ready(function() {
        $('.navbar-nav li').removeClass('active');
        $('.navbar-nav li.page_admin').addClass('active');
    });
</script>
</body>
</html>
