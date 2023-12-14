<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .required {
            border-color: #e53e3e;
        }

        .alert-text {
            color: #e53e3e; 
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }
    </style>
    <title>Add Music Form</title>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-screen-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Add Music</h2>

        <form id="addMusicForm" action="#" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-4">
                <!-- Song Title -->
                <div class="mb-4">
                    <label for="songTitle" class="block text-sm font-medium text-gray-600">Song Title</label>
                    <input type="text" id="songTitle" name="songTitle" class="mt-1 p-2 w-full border rounded-md">
                    <div id="songTitleError" class="alert-text"></div>
                </div>

                <!-- Artist Name -->
                <div class="mb-4">
                    <label for="artistName" class="block text-sm font-medium text-gray-600">Artist Name</label>
                    <input type="text" id="artistName" name="artistName" class="mt-1 p-2 w-full border rounded-md">
                    <div id="artistNameError" class="alert-text"></div>
                </div>
            </div>

            <!-- Duration -->
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-600">Duration (minutes)</label>
                <input type="number" id="duration" name="duration" class="mt-1 p-2 w-full border rounded-md">
                <div id="durationError" class="alert-text"></div>
            </div>

            <!-- Album Cover Image -->
            <div class="mb-4">
                <label for="coverImage" class="block text-sm font-medium text-gray-600">Cover Image</label>
                <input type="file" id="coverImage" name="coverImage" accept="image/*" class="mt-1 p-2 w-full border rounded-md">
                <div id="coverImageError" class="alert-text"></div>
            </div>

            <!-- Music File -->
            <div class="mb-4">
                <label for="musicFile" class="block text-sm font-medium text-gray-600">Music File</label>
                <input type="file" id="musicFile" name="musicFile" accept="audio/*" class="mt-1 p-2 w-full border rounded-md">
                <div id="musicFileError" class="alert-text"></div>
            </div>

            <!-- Music Genre -->
            <div class="mb-4">
                <label for="musicGenre" class="block text-sm font-medium text-gray-600">Music Genre</label>
                <select id="musicGenre" name="musicGenre" class="mt-1 p-2 w-full border rounded-md">
                    <!-- Add options for music genres -->
                    <option value="pop">Pop</option>
                    <option value="rock">Rock</option>
                    <option value="hip-hop">Hip Hop</option>
                    <!-- Add more genres as needed -->
                </select>
                <div id="musicGenreError" class="alert-text"></div>
            </div>

            <!-- Country -->
            <div class="mb-6">
                <label for="country" class="block text-sm font-medium text-gray-600">Country</label>
                <select id="country" name="country" class="mt-1 p-2 w-full border rounded-md">
                    <!-- Add options for countries -->
                    <option value="us">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="jp">Japan</option>
                    <!-- Add more countries as needed -->
                </select>
                <div id="countryError" class="alert-text"></div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="button" onclick="validateForm()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Music</button>
            </div>
        </form>
    </div>

    <script>
        function validateForm() {
            // Reset previous errors
            resetErrors();

            // Check each field for emptiness
            const fields = ['songTitle', 'artistName', 'duration', 'coverImage', 'musicFile', 'musicGenre', 'country'];
            let hasError = false;

            fields.forEach(field => {
                const value = document.getElementById(field).value.trim();
                if (value === '') {
                    addError(field, 'This field is required.');
                    hasError = true;
                }
            });

            // If any field is empty, prevent form submission
            if (hasError) {
                return;
            }

            // If all fields are filled, submit the form
            document.getElementById('addMusicForm').submit();
        }

        function addError(field, message) {
            const errorElement = document.getElementById(`${field}Error`);
            errorElement.textContent = message;
            document.getElementById(field).classList.add('required');
        }

        function resetErrors() {
            const fields = ['songTitle', 'artistName', 'duration', 'coverImage', 'musicFile', 'musicGenre', 'country'];

            fields.forEach(field => {
                const errorElement = document.getElementById(`${field}Error`);
                errorElement.textContent = '';
                document.getElementById(field).classList.remove('required');
            });
        }
    </script>

</body>
</html>
