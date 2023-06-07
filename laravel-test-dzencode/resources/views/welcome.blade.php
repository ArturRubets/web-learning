<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>All comments</title>
</head>

<body>
    <main class="flex items-center justify-center">
        <div class="max-w-screen-md p-4">
            <button type="button" id="showForm"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full mb-4">
                Leave a comment
            </button>
            <x-sort-panel :sortOrder="$sortOrder" :sortBy="$sortBy" />
            <div class="flex flex-col gap-y-4">
                @unless (count($comments) === 0)
                    @include('partials._comments')
                    <!-- Displaying links to previous and next pages -->
                    {{ $comments->links() }}
                @else
                    <p class="text-lg font-bold">No comments found</p>
                @endunless
            </div>
            @include('partials._comment-popup')
        </div>
    </main>
    <script>
        $(document).ready(function() {
            const body = document.body;
            const popup = $('#popup');
            const inputWithParentId = $('#parent-id');

            function changeInputValue(parentId) {
                inputWithParentId.val(parentId);
            }

            // Function for showing popup
            function showPopup(parentId = null) {
                changeInputValue(parentId);
                popup.show();
                body.classList.add('popup-open');
            }

            // Function to close popup
            function closePopup() {
                changeInputValue(null);
                popup.hide();
                body.classList.remove('popup-open');
            }

            // Event handler when the "Leave a comment" button is clicked
            $('#showForm').click(function() {
                showPopup();
            });

            // Event handler when the "Close" button is clicked
            $('#closeForm').click(function() {
                closePopup();
            });

            // Event handler when the buttons with 'data-comment_id' attribute are clicked
            $('button[data-comment_id]').on('click', function() {
                const commentId = $(this).data('comment_id');
                showPopup(commentId);
            });
        });
    </script>
</body>

</html>
