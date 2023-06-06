@foreach ($comments as $comment)
    <div class="comment">
        <x-comment :comment="$comment" />

        <!-- Recursive output of nested comments -->
        @if ($comment->replies->count() > 0)
            <div class="ml-10 mb-4 mt-4">
                @include('partials._comments', ['comments' => $comment->replies])
            </div>
        @endif
    </div>
@endforeach
