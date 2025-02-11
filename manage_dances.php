<?php include 'navigation.php';
require_once('db_configuration.php'); 

// Create connection
$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch dances data from the database
$sql = "SELECT dance_id, dance_english_name, dance_alternate_name, dance_telugu_name, dance_category, dance_origin, dance_description, dance_image_reference, dance_video_reference, dance_key_words, dance_status, artist_images FROM dances";
$result = $conn->query($sql);

$danceData = [];
while ($row = $result->fetch_assoc()) {
    $danceData[] = $row;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Dances</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
</head>
<body>
<button class="centered-button" onclick="window.location.href='create_dances.php';">Add New Dance</button>
<style>
  .centered-button {
    background-color: #4CAF50; 
    color: white; 
    padding: 10px 20px; /
    border: none; 
    border-radius: 5px; 
    margin-top: 20px; 
    display: block; 
    margin-left: auto; 
    margin-right: auto; 
    cursor: pointer; 
    text-align: center; 
  }
  .centered-button:hover {
    background-color: #45a049; 
  }
</style>
<table id="dancesTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>English Name</th>
            <th>Alternate Name</th>
            <th>Telugu Name</th>
            <th>Category</th>
            <th>Origin</th>
            <th>Description</th>
            <th>Image Reference</th>
            <th>Video Reference</th>
            <th>Key Words</th>
            <th>Dances Status</th>
            <th>Artist Images</th>
            <th>Modify</th>
            <th>Delete</th>
            <th>Display</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($danceData as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['dance_id']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_english_name']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_alternate_name']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_telugu_name']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_category']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_origin']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_description']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_image_reference']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_video_reference']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_key_words']); ?></td>
                <td><?php echo htmlspecialchars($row['dance_status']); ?></td>
                <td><?php echo htmlspecialchars($row['artist_images']); ?></td>
                <td><button class="centered-button" onclick="editDance(<?php echo $row['dance_id']; ?>)">Modify</button></td>
                <td><button class="centered-button" onclick="deleteDance(<?php echo $row['dance_id']; ?>)">Delete</button></td>
                <td><button class="centered-button" onclick="readDance(<?php echo $row['dance_id']; ?>)">Display</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function createDance() {
        alert('Create dance clicked!');
    }

    function editDance(id) {
        alert('Edit dance id: ' + id + '.');
    }

    function deleteDance(id) {
        if(confirm('Are you sure you want to delete this dance?')) {
        window.location.href = 'delete_dances.php?id=' + id;
        alert('Dance id: ' + id + 'has been deleted!');
    }
    }
    function readDance(id) {
        // if(confirm('Are you sure you want to delete this dance?')) {
        // window.location.href = 'read_dances.php?id=' + id;
        // alert('Read dance id: ' + id + '.');
    }

    $(document).ready(function() {
        $('#dancesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "pageLength": 25
        });
    });
</script>

</body>
</html>
