<style>
    .search-form {
        text-align: right;
    }

    .search-input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 30%;
        width: 100%;
    }

    .search-button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-button:hover {
        background-color: #0056b3;
    }
</style>
<div class="container">
    <div class="search-form" style="text-align:right;width:90%;">
        <form action="search_aquatic.php" class="form-group my-3" method="POST">
            <input type="text" name="search" placeholder="Search" class="search-input">
            <input type="submit" value="ค้นหา" class="search-button">
        </form>
    </div>



    <script>
        const searchInput = document.getElementById('searchInput');
        const aquaticImage = document.getElementById('aquaticImage');

        searchInput.addEventListener('input', function() {
            const searchValue = searchInput.value.trim();

    
            if (searchValue !== '') {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'search_aquatic.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            aquaticImage.style.display = 'block';
                            aquaticImage.src = 'admin/assets/img/' + response.image;
                        } else {
                            aquaticImage.style.display = 'none';
                        }
                    }
                };
                xhr.send('search=' + searchValue);
            } else {
                aquaticImage.style.display = 'none';
            }
        });
    </script>