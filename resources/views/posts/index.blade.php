<x-layout title="All Posts">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold">All Posts</h1>
        <a href="/posts/create" class="inline-block rounded bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow hover:bg-indigo-700">
            Create New Post
        </a>
    </div>

    <div class="space-y-4">
        @foreach ($posts as $post)
        <article class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-xl font-bold text-gray-900">{{ $post->title }}</h2>
            <p class="mt-2 text-sm text-gray-500">{{ Str::limit($post->description, 100) }}</p>
            
            <p class="mt-4 text-xs font-medium text-gray-400">
                Created: {{ $post->created_at ? $post->created_at->diffForHumans() : 'Date Unknown' }}
            </p>

            <div class="mt-6 flex gap-3">
                <a href="/posts/{{ $post->id }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">View</a>
                <a href="/posts/{{ $post->id }}/edit" class="text-sm font-medium text-gray-600 hover:text-gray-800">Edit</a>
                
                <form action="/posts/{{ $post->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" class="text-sm font-medium text-red-600 hover:text-red-800">
                        Delete
                    </button>
                </form>
            </div>
        </article>
        @endforeach
    </div>
</x-layout>