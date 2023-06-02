<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>All comments</title>
</head>

<body>
    <main>
        <div class="py-2 px-2">
            <button type="button" id="showForm"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full">
                Leave a comment
            </button>
        </div>
        @include('partials._comment-popup')
    </main>
    <script>
        // Function for showing popup
        function showPopup() {
            $('#popup').show();
        }

        // Function to close popup
        function closePopup() {
            $('#popup').hide();
        }

        // Event handler when the "Leave a comment" button is clicked
        $('#showForm').click(function() {
            showPopup();
        });

        // Event handler when the "Close" button is clicked
        $('#closeForm').click(function() {
            closePopup();
        });
    </script>
</body>

</html>
