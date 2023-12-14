<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Add Music Form</title>
</head>
<body class="bg-light p-4">

    <div class="container max-width-xxl">
        <h2 class="text-center mb-4">Add Music</h2>

        <form action="/submit-music" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="songTitle" class="form-label">Song Title</label>
                    <input type="text" class="form-control" id="songTitle" name="songTitle" required>
                </div>

                <div class="col-md-6">
                    <label for="artistName" class="form-label">Artist Name</label>
                    <input type="text" class="form-control" id="artistName" name="artistName" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="duration" class="form-label">Duration (minutes)</label>
                    <input type="number" class="form-control" id="duration" name="duration" required>
                </div>

                <div class="col-md-6">
                    <label for="coverImage" class="form-label">Cover Image</label>
                    <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="musicFile" class="form-label">Music File</label>
                    <input type="file" class="form-control" id="musicFile" name="musicFile" accept="audio/*" required>
                </div>

                <div class="col-md-6">
                    <label for="musicGenre" class="form-label">Music Genre</label>
                    <select class="form-select" id="musicGenre" name="musicGenre" required>
                        <option value="pop">Pop</option>
                        <option value="rock">Rock</option>
                        <option value="hip-hop">Hip Hop</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="jp">Japan</option>
                    </select>
                </div>

                <!-- Add more input fields as needed -->

                <div class="col-md-6">
                    <!-- Add more input fields as needed -->
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Add Music</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
