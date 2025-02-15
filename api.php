<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

include_once "connection.php";
if (isset($_GET['imgid'])) {
    $id = base64_decode($_GET['imgid']);
    $sql = "SELECT * FROM images where id = $id";
    $result = $conn->query($sql);

    $images = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageData = base64_encode($row['image_data']); // Convert binary data to base64 to send as JSON
            $images[] = [
                'image_url' => $imageData,
                'link' => $row['link'],
                'alt_text' => $row['alt_text']
            ];
        }

        // Return the result as a JSON response
        echo json_encode(["status" => "success", "images" => $images]);
    } else {
        // If no images are found
        echo json_encode(["status" => "error", "message" => "No images found"]);
    }
}
$conn->close();
?>

