@foreach ($comments as $comment)
    <x-comment :comment="$comment" />
    <!-- Recursive output of nested comments -->
    @if ($comment->replies->count() > 0)
        <div class="ml-7 flex flex-col gap-y-4">
            @include('partials._comments', ['comments' => $comment->replies])
        </div>
    @endif
@endforeach
