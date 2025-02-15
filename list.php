<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container  mt-4">
        <div class="card border-success mb-3">
                <div class="card-header bg-transparent border-success">LIST</div>
                    <div class="card-body text-success">
                        <table class="table table-striped table-hover table-bordered">
                            <tr>
                                <th>Image-Id</th>
                                <th>Image</th>
                                <th>Link</th>
                                <th>Alt Text</th>
                            </tr>
<?php
include_once "connection.php";

// Query the database to get all the image records
$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start a table to display the images
    
    while ($row = $result->fetch_assoc()) {
        $imageURL = $row['image_data'];
        $link = $row['link'];
        $altText = $row['alt_text'];
        ?>
        <tr>
            <td><?=base64_encode($row['id'])?></td>
            <td><img src='<?=$imageURL?>' alt='<?=$altText?>' width='100'></td>
            <td><a href='<?=$link?>'>LINK</a></td>
            <td><?=$altText?></td>
        </tr>
        <?php
    }

} else { ?>
   <tr>
    <td colspan=3>No Banner Found</td>
   </tr>
<?php }

$conn->close();
?>
</table>
    </div>
    <div class="card-footer bg-transparent border-success">LIST</div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
