<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>
<body>

<form id="myForm">
    <!-- Your form fields go here -->
    <input type="text" name="data" id="dataInput">
    <button type="button" onclick="submitForm()">Submit</button>
</form>

<div id="result"></div>

<script>
    function submitForm() {
        var formData = new FormData(document.getElementById('myForm'));

        var xhr = new XMLHttpRequest();

        xhr.addEventListener('load', function () {
            document.getElementById('result').innerHTML = xhr.responseText;
        });

        xhr.addEventListener('error', function () {
            alert('Oops! Something went wrong.');
        });

        xhr.open('POST', 'demo.php', true);

        // Set the following line if you want to send data as JSON
        // xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');

        xhr.send(formData);
    }
</script>

</body>
</html>
