<x-layout title="View Post">
    <div class="mb-6">
        <a href="/posts" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">&larr; Back to all posts</a>
    </div>

    <article class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
        <div class="mt-2 text-sm text-gray-500 flex gap-4">
            <p><strong>Created:</strong> {{ $post->created_at->format('F j, Y, g:i a') }}</p>
            <p>({{ $post->created_at->diffForHumans() }})</p>
        </div>
        
        <hr class="my-6 border-gray-200">
        
        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $post->description }}</p>
    </article>
</x-layout>