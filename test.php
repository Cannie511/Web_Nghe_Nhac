<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Example</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <form id="searchForm">
        <input type="text" id="searchInput" name="term" placeholder="Enter search term">
        <input type="submit" value="Search">
    </form>
    <div id="searchModal" class="layout">
    <h1>Kết Quả Tìm Kiếm:</h1><br>
    <div id='music_panel'>
        <table class="table table-dark table-hover list">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tác giả, ca sĩ</th>
                    <th scope="col">Ngày phát hành</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="searchResults">
                    
            </tbody>
        </table>
    </div>

    <div ></div>

    <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(event) {
                event.preventDefault(); // Prevents the form from submitting the traditional way

                var searchTerm = $('#searchInput').val();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: { term: searchTerm },
                    success: function(data) {
                        $('#searchResults').html(data);
                    },
                    error: function() {
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });
    </script>

</body>
</html>
