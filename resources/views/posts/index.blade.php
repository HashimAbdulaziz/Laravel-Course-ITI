<x-layout title="All Posts">
    <div class="mb-8 flex justify-between">
        <h1 class="text-2xl font-bold">All Posts</h1>
        <a href="/posts/create" class="rounded bg-gray-800 px-4 py-2 text-white hover:bg-gray-700">
            Create New Post
        </a>
    </div>

    <div class="space-y-4">
        @foreach ($posts as $post)
        <article class="border border-gray-300 p-4">
            <h2 class="text-lg font-bold">{{ $post->title }}</h2>
            <p class="mt-2 text-sm text-gray-600">{{ Str::limit($post->description, 100) }}</p>
            
            <p class="mt-3 text-xs text-gray-500">
                Created: {{ $post->created_at ? $post->created_at->diffForHumans() : 'Date Unknown' }}
            </p>

            <div class="mt-4 flex gap-3">
                <a href="/posts/{{ $post->id }}" class="text-sm font-medium text-blue-600 hover:underline">View</a>
                <a href="/posts/{{ $post->id }}/edit" class="text-sm font-medium text-gray-600 hover:underline">Edit</a>
                
                <form action="/posts/{{ $post->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="text-sm font-medium text-red-600 hover:underline">
                        Delete
                    </button>
                </form>
            </div>
        </article>
        @endforeach
    </div>
</x-layout>