<div id="searchModal" class="layout">
                    <h1 id='searchKeys' style='color:white'>&nbsp;&nbsp;&nbsp;&nbsp;Kết Quả Tìm Kiếm:</h1><br>
                    <div id='music_panel'>
                        <table class="table table-dark table-hover list">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Tác giả, ca sĩ</th>
                                    <th scope="col">Ngày phát hành</th>
                                    <th scope="col">Thời lượng</th>

                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                <script>
                                    document.getElementById('searchForm').addEventListener('submit', function (e) {
                                        e.preventDefault();
                                        $(".layout.show").removeClass("show");
                                        $("#searchModal").addClass("show");
                                        var searchInput = document.getElementById('search_input').value;
                                        var showKeys = document.getElementById('searchKeys');
                                        showKeys.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;Kết Quả Tìm Kiếm: "' + searchInput + '"';
                                        searchWithAjax(searchInput);
                                    });

                                    function searchWithAjax(searchTerm) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                // Xử lý kết quả từ PHP
                                                document.getElementById('searchResults').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'Xuly/timkiem.php?search=' + searchTerm, true);
                                        xhr.send();
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>