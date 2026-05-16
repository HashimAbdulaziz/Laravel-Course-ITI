<x-layout title="View Post">
    <div class="mb-6">
        <a href="/posts" class="text-sm text-blue-600 hover:underline">&larr; Back to all posts</a>
    </div>

    <article class="border border-gray-300 p-6">
        <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
        <div class="mt-2 text-xs text-gray-600 flex gap-4">
            <p><strong>Created:</strong> {{ $post->created_at->format('F j, Y, g:i a') }}</p>
            <p>({{ $post->created_at->diffForHumans() }})</p>
        </div>
        
        <hr class="my-6 border-gray-300">
        
        <p class="leading-relaxed whitespace-pre-wrap">{{ $post->description }}</p>
    </article>
</x-layout>