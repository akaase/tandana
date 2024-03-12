<?php include 'navigation.php';

// Start session to store variables
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Allows user to return 'back' to this page
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

 ?>
<!DOCTYPE html>
<html>
<head><script>
$("a").hover(function(){
    $(this).css("background-color", "green");
    }, function(){
    $(this).css("background-color", "#3953ad");
});
</script>
	<style>
	textarea{
		height: 400px;
		width: 600px;
	}
	</style>
</head>
<body>

<div class="container submit_wrapper top_space" style="float: left; width:45%;">
  <h3 class="headline_white">Add a Resource</h3>
  <?php
  require_once('db_configuration.php');

// Establishing Connection with Server
$servername = DATABASE_HOST;
$db_username = DATABASE_USER;
$db_password = DATABASE_PASSWORD;
$database = DATABASE_DATABASE;

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully<br>";
$conn->set_charset("utf8");

// define variables and set to empty values
	$resource_type_error = $category_error = $resource_names_error = $resource_location_error = $ISBN_error = 
	$publication_date_error = $author_name_error = "";
	$resource_type = $category = $publication_company = $author2_name
	= $author3_name = $resource_location = $ISBN = $publication_date = $author_name = $resource_names="";	


$_SESSION['confirmation_resource_type'] = $_SESSION['confirmation_alternate_name'] = $_SESSION['confirmation_'] =
$_SESSION['confirmation_category'] = $_SESSION['confirmation_publication_company'] = $_SESSION['confirmation_author2_name'] = 
$_SESSION['confirmation_resource_names'] = $_SESSION['confirmation_resource_location'] = $_SESSION['confirmation_key_words'] = $_SESSION['confirmation_ISBN'] = $_SESSION['confirmation_publication_date'] = $_SESSION['confirmation_author_name'] =$_SESSION['confirmation_author3_name'] = 
		$_SESSION['confirmation_publication_date'] ="";


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if (empty($_POST["resource_type"])){
		$resource_type_error = "is required.";
	}
	else{
		$resource_type = test_input($_POST["resource_type"]);
	}

	if (empty($_POST["$publication_date"])){
		$publication_date = "";
	}
	else{
		$publication_date = test_input($_POST["$publication_date"]);
	}

	if (empty($_POST["$author3_name"])){
		$author3_name = "This is issue";
	}
	else{
		$author3_name = test_input($_POST["$author3_name"]);
	}


	if (empty($_POST["publication_company"])){
		$publication_company = "";
	}
	else{
		$publication_company = test_input($_POST["publication_company"]);
	}

	if (empty($_POST["author2_name"])){
		$author2_name = "";
	}
	else{
		$author2_name = mysqli_real_escape_string($conn, test_input($_POST["author2_name"]));
	}

	if (empty($_POST["resource_names"])){
		$resource_names = "";
	}
	else{
		$resource_names = test_input($_POST["resource_names"]);
		 // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
	}

	if (empty($_POST["resource_location"])){
		$resource_location = "";
	}
	else{
		$resource_location = test_input($_POST["resource_location"]);
		 // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
	}	
	
	if ($_POST["ISBN"] === ""){
		$ISBN_error = "is required.";
	}
	else{
		$ISBN = test_input($_POST["ISBN"]);
	}
	 
	if (empty($_POST["author_name"])){
		$author_name = "";
	}
	else{
		$author_name = test_input($_POST["author_name"]);
	}

// If no errors, go to confirmation page
	if(true){

		//$resource_type_error === "" && $category_error === "" && $resource_names_error === "" && $resource_location_error === "" && $publication_date_error === "" && $author_name_error === ""


				//Store sessions
		$_SESSION['confirmation_resource_type'] = $resource_type;
 		$_SESSION['confirmation_category'] = $category;
		$_SESSION['confirmation_publication_company'] = $publication_company;
		$_SESSION['confirmation_author2_name'] = $author2_name;
		$_SESSION['confirmation_resource_names'] = $resource_names;
		$_SESSION['confirmation_resource_location'] = $resource_location;
 		$_SESSION['confirmation_ISBN'] = $ISBN;
		$_SESSION['confirmation_publication_date'] = $publication_date;
		$_SESSION['confirmation_author_name'] = $author_name;
		$_SESSION['confirmation_author3_name'] = $author3_name;
		$_SESSION['confirmation_publication_date'] = $publication_date;
		$publication_date_to_insert=$_POST['publication_date'];
		$author3_name_to_insert=$_POST['author3_name'];
		
		/*echo(var_dump($_POST));
		echo("\r\n");
		echo("\r\n");
		echo("<br>");
		echo("<br>");
		echo("<br>");
		echo("<br>");
		echo(var_dump($publication_date_to_insert));
		echo(var_dump($author3_name_to_insert));*/

	// Run Query
		if(isset($_POST['submit'])){
	$sql = "INSERT INTO Resources (resource_type, resource_names, publication_company, author2_name, resource_location, ISBN, publication_date, author_name,author3_name)
	VALUES ('$resource_type', '$resource_names', '$publication_company', '$author2_name', '$resource_location', '$ISBN', '$publication_date_to_insert', '$author_name','$author3_name_to_insert')";

	// echo($sql);
	// echo('date is '.$publication_date);
	// echo('author3_name is '.$author3_name);

//Close Connection
			if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully.";
			}
			else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			//header('Location: admin_commands.php');
		}

			}

		}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

// if(!isset($_POST['category'])) 
// {
// $errorMessage .= "<li>You forgot to select a dance category!</li>";
// }

?>
<!--leave alome-->
<span class="error">* required field.</span>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<table width=30% class="suggest_table">
<!-- Type of the resource(book,magazine,online,etc) -->
<tr>
<td>
<label>Resource Type:</label>
</td>
</tr>
<tr>
<td>
<input type="text" name="resource_type" value="<?php echo $resource_type;?>">
<span class="error">* <?php echo $resource_type_error;?></span>
</td>
</tr>


<tr>
<td>
<label>Resource Location:</label>
</td>
</tr>
<tr>
<td>
<input type="text" name="resource_location" value="<?php echo $resource_location;?>">
<span class="error">* <?php echo $resource_type_error;?></span>
</td>
</tr>

<!-- Dance Category Input -->
<tr>
<td>
<label>ISBN:</label>
</td>
</tr>
<tr>
<td>
<input type="text" name="ISBN" value="<?php echo $category;?>">
<span class="error">* <?php echo $ISBN_error;?></span>
</td>
</tr>

<!-- Dance publication_company Input -->
<tr>
<td>
<label>Publication Date:</label>
</td>
</tr>
<tr>
<td>
<input type="text" name="publication_date" value="<?php echo $publication_date;?>">
</td>
</tr>

<!-- Dance author2_name Input -->
<tr>
<td>
<label>Author Name: </label>
</td>
</tr>
<tr>
<td>
<input type="text" name="author_name" value="<?php echo $author_name;?>">
</td>
</tr>

<!-- Dance Image Reference Input -->
<tr>
<td>
<label>Publication Company: </label>
</td>
<tr>
<td>
<input type="text" name="publication_company" value="<?php echo $publication_company;?>">
</td>
</tr>

<!-- Dance Video Reference Input -->
<tr>
<td>
<label>Author 2 Name:</label>
</td>
</tr>
<tr>
<td>
<input type="text" name="author2_name" value="<?php echo $author2_name;?>">
</td>
</tr>

<!-- Upload Image Input -->
<tr>
<td>
<label>Author 3 Name:</label>
</td>
</tr>
<tr>
<td>
<input type="text" name="author3_name" value="<?php echo $author3_name;?>">
</td>
</tr>

<tr>
<td>
<label>Resource Name:</label>
</td>
</tr>
<tr>
<td>
<div id="filediv">
<input type="text" name="resource_names" value="<?php echo $resource_names;?>">
</div>
</td>
</tr>

<!-- Submit Button -->
<tr>
<td>
<input class="orange_button" type="submit" name="submit" value="Submit">
</td>
</tr>
</table>
</form>
</div>

<footer>
<?php include 'footer.php'; ?>
</footer>
<script type="text/javascript">
var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
});
// Following function will executes on change event of file input to select different file.
$('body').on('change', '#file', function() {
if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src='' width='500px' height='400px'/></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd" + abc).append($("<img/>", {
id: 'img',
src: 'x.png',
alt: 'delete'
}).click(function() {
$(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("First Image Must Be Selected");
e.preventDefault();
}
});

$('.navbar-nav li').removeClass('active');
$('.navbar-nav li.page_admin').addClass('active');

});

</script>\
</body>
