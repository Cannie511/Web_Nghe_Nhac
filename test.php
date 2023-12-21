<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Country and Music Genre</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
  <h1>Add Country</h1>
  <form id="addCountryForm" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      <label for="countryName" class="sr-only">Country Name:</label>
      <input type="text" class="form-control" id="countryName" name="countryName" placeholder="Country Name" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Add Country</button>
  </form>

  <h1 class="mt-4">Add Music Genre</h1>
  <form id="addGenreForm" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      <label for="genreName" class="sr-only">Genre Name:</label>
      <input type="text" class="form-control" id="genreName" name="genreName" placeholder="Genre Name" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Add Genre</button>
  </form>
</div>

<!-- Include any additional scripts or use JavaScript to handle form submission -->

</body>
</html>
