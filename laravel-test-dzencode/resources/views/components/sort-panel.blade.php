<div class="flex justify-between items-center bg-gray-200 p-4 mb-4">
    <div>
        <a
            href="{{ route('comments.sort', ['sortBy' => 'created_at', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
            <span class="mr-2">Date Added</span>
            @if ($sortBy === 'created_at')
                @if ($sortOrder === 'asc')
                    <i class="fas fa-sort-up"></i>
                @else
                    <i class="fas fa-sort-down"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
        </a>
    </div>
    <div>
        <a
            href="{{ route('comments.sort', ['sortBy' => 'user_name', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
            <span class="mr-2">User Name</span>
            @if ($sortBy === 'user_name')
                @if ($sortOrder === 'asc')
                    <i class="fas fa-sort-up"></i>
                @else
                    <i class="fas fa-sort-down"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
        </a>
    </div>
    <div>
        <a href="{{ route('comments.sort', ['sortBy' => 'email', 'order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
            <span class="mr-2">E-mail</span>
            @if ($sortBy === 'email')
                @if ($sortOrder === 'asc')
                    <i class="fas fa-sort-up"></i>
                @else
                    <i class="fas fa-sort-down"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
        </a>
    </div>
</div>
