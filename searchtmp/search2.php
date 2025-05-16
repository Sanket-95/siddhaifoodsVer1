<!DOCTYPE html>
<html>

<head>
    <title>Live Search with Bootstrap and PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #suggestion-box {
            position: absolute;
            z-index: 1000;
            width: 100%;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Live Product Search</h2>
        <div class="form-group position-relative">
            <input type="text" class="form-control" id="search-box" autocomplete="off" placeholder="Type product name...">
            <div id="suggestion-box" class="list-group"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search-box').keyup(function () {
                let query = $(this).val();
                if (query.length > 1) {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: { query: query },
                        success: function (data) {
                            $('#suggestion-box').html(data);
                        }
                    });
                } else {
                    $('#suggestion-box').html('');
                }
            });

            $(document).on('click', '.suggestion-item', function () {
                let selectedName = $(this).text();
                let selectedId = $(this).data('id');
                $('#search-box').val(selectedName);
                $('#suggestion-box').html('');

                // Optional: use the selected ID (e.g., for a form)
                alert("Selected ID: " + selectedId);
            });
        });
    </script>
</body>

</html>
