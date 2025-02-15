<?php
include_once "connection.php";

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg', 'png', 'jpeg');
    
    // Check MIME type using finfo_file() function
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($_FILES["image"]["tmp_name"]);

    // Allowed MIME types
    $allowedMimeTypes = array('image/jpeg', 'image/png', 'image/jpg');

    if (in_array($mimeType, $allowedMimeTypes) && in_array($fileType, $allowTypes)) {
        $uniqueFileName = uniqid("img_", true) . '.' . $fileType;
        $targetFilePath = $targetDir . $uniqueFileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Get the POST data for URL and alt text
            $url = $_POST['url'];
            $alt = $_POST['alt'];
            
            // Prepare the image URL (Assuming your server's root is localhost/banner/)
            $imageLocation = "http://localhost/banner/" . $targetFilePath;

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO images (image_data, link, alt_text) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $imageLocation, $url, $alt);  // Change to 'sss' for 3 strings

            if ($stmt->execute()) {
                echo json_encode(["message" => "Image uploaded successfully", "image_id" => $stmt->insert_id]);
                header("location:list.php");
            } else {
                echo json_encode(["error" => "Failed to upload image"]);
            }
            $stmt->close();
        } else {
            echo json_encode(["error" => "Failed to move uploaded image"]);
        }
    } else {
        echo json_encode(["error" => "Invalid file type. Only JPG, JPEG, and PNG images are allowed"]);
    }
} else {
    echo json_encode(["error" => "No valid image uploaded"]);
}

$conn->close();
?>
