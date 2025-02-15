<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4">
        <div class="card border-success mb-3">
            <div class="card-header bg-transparent border-success">
                <h4>Upload Banner</h4>
                <a class="btn btn-info" href="list.php">List</a>
            </div>
            <div class="card-body text-success">
                <div class="row">
                    <form action="uploadbanner.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="uploadImage" class="form-label">Upload Banner Image</label>
                            <input type="file" required name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Enter Redirection URL</label>
                            <input type="url" required name="url" class="form-control" placeholder="https://saurabhsingh.com/redirect">
                        </div>
                        <div class="mb-3">
                            <label for="alt" class="form-label">Enter Alt of Image</label>
                            <textarea name="alt" required class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" value="SUBMIT">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer bg-transparent border-success">
                <h4>Upload Banner</h4>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>