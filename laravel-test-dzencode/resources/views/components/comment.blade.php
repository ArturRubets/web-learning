@props(['comment'])

<div class="bg-white p-4 rounded shadow">
    <div class="flex items-center gap-x-3 pb-2">
        <span class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200">
            <i class="fa fa-user text-lg"></i>
        </span>
        <h3 class="text-lg font-bold">{{ $comment->user_name }}</h3>
        <span class="text-gray-400 text-sm">{{ $comment->formatted_created_at }}</span>
        <button class="text-blue-500 hover:text-blue-600 text-sm font-medium">Reply</button>
    </div>
    <p class="text-gray-500">{{ $comment->text }}</p>
</div>
