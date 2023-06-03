<div id="popup"
    class="fixed top-0 left-0 bottom-0 right-0 flex items-center justify-center w-full bg-black bg-opacity-50 hidden p-2"
    style="overflow: auto">
    <div class="bg-white p-4 m-4 mx-auto rounded" style="max-width: 600px;">
        <div class="relative">
            <form action="{{ route('comments.store') }}" method="POST" id="commentForm">
                @csrf
                {{-- Username --}}
                <div class="mb-4">
                    <label for="user-name" class="block font-medium text-gray-700">User Name:</label>
                    <input type="text" id="user-name" name="user_name"
                        class="error-field mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"
                        placeholder="Enter your name" value="{{ old('user_name') }}">
                    <span id="user_name-error" class="error-message text-red-500 text-xs mt-1"></span>
                </div>
                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700">E-mail:</label>
                    <input type="text" id="email" name="email"
                        class="error-field mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"
                        placeholder="Enter your email" value="{{ old('email') }}">
                    <span id="email-error" class="error-message text-red-500 text-xs mt-1"></span>
                </div>
                {{-- Home page --}}
                <div class="mb-4">
                    <label for="home-page" class="block font-medium text-gray-700">Home Page:</label>
                    <input type="text" id="home-page" name="home_page"
                        class="error-field mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"
                        placeholder="Enter your home page" value="{{ old('home_page') }}">
                    <span id="home_page-error" class="error-message text-red-500 text-xs mt-1"></span>
                </div>
                {{-- Captcha --}}
                <div class="mb-4">
                    <label for="captcha-input" class="block font-medium text-gray-700">CAPTCHA:</label>
                    <div class="flex mb-1">
                        <div class="w-40">
                            <span id="captcha">{!! captcha_img('flat') !!}</span>
                        </div>
                        <button type="button" id="reload"
                            class="ml-2 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded transition-all duration-300 ease-in-out"
                            style="font-size: 20px;">
                            &#x21bb;
                        </button>
                    </div>
                    <input type="text" id="captcha-input"
                        class="error-field mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"
                        placeholder="Enter Captcha" name="captcha" value="{{ old('captcha') }}">
                    <span id="captcha-error" class="error-message text-red-500 text-xs mt-1"></span>
                </div>
                {{-- Comment --}}
                <div class="mb-4">
                    <label for="text" class="block font-medium text-gray-700">Comment:</label>
                    <textarea id="text" name="text" class="error-field mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"
                        placeholder="Enter your comment">{{ old('text') }}</textarea>
                    <span id="text-error" class="error-message text-red-500 text-xs mt-1"></span>
                </div>
                {{-- Submit Button --}}
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full">
                    Submit
                </button>
            </form>
            <!-- Button to close the popup -->
            <button type="button" id="closeForm"
                class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 rounded-full transition-all duration-300 ease-in-out text-white  p-1 w-6 h-6 flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        /*
            Make a request to the server, 
            get a new captcha and 
            set it in the element with the captcha ID
        */
        function reloadCaptcha() {
            $.ajax({
                type: 'GET',
                url: '{{ route('comments.reload-captcha') }}',
                success: function(data) {
                    $('#captcha').html(data.captcha);
                }
            });
        }

        // A function for handling form submission via AJAX
        function submitForm() {
            const formData = $('#commentForm').serialize(); // We receive form data

            // Sending form data
            $.ajax({
                type: 'POST',
                url: '{{ route('comments.store') }}',
                data: formData,
                success: function(response) {
                    if (response.status) {
                        window.location.href = response.redirect; // Redirection to other page
                    }
                },
                error: function(xhr) {
                    // Unprocessable entity
                    if (xhr.status === 422) {
                        // Remove error texts
                        $('.error-field').removeClass('border-red-500');
                        $('.error-message').html('');

                        const errors = xhr.responseJSON.errors;

                        // Validation error handling, displaying them next to the corresponding form fields
                        $.each(errors, function(field, messages) {
                            const errorMessages = messages.join('<br>');

                            $('#' + field).addClass(
                                'border-red-500'
                            ); // To add a class for highlighting a field with an error

                            $('#' + field + '-error').html(
                                errorMessages); // Display error message
                        });

                        // Refresh captcha after failed validation
                        reloadCaptcha();
                    } else {
                        // Handling other errors or server errors
                        console.log('AJAX request error:', xhr);
                    }
                }
            });
        }

        // Reload captcha after clicking
        $('#reload').click(reloadCaptcha);

        // Event handler for submitting a form via AJAX
        $('#commentForm').submit(function(e) {
            e.preventDefault(); // Disable standard form submission
            submitForm(); // To call a function for handling form submission via AJAX
        });
    });
</script>
