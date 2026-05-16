<x-layout title="View Post">
    <div class="mb-6">
        <a href="/posts" class="text-sm text-blue-600 hover:underline">&larr; Back to all posts</a>
    </div>

    <article class="border border-gray-300 p-6">
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg mb-6">
        @endif

        <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>

        <div class="mt-2 text-xs text-gray-600 flex gap-4">
            <p><strong>Created:</strong> {{ $post->created_at->format('F j, Y, g:i a') }}</p>
            <p>({{ $post->created_at->diffForHumans() }})</p>
        </div>
        
        <hr class="my-6 border-gray-300">
        
        <p class="leading-relaxed whitespace-pre-wrap">{{ $post->description }}</p>
    </article>

    
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Comments</h2>

        <form action="/posts/{{ $post->id }}/comments" method="POST" class="mb-8 bg-gray-50 p-6 rounded-lg border border-gray-200">
            @csrf
            
            <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Leave a comment</label>
            <textarea name="body" id="body" rows="3" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2 border" placeholder="What are your thoughts?"></textarea>
            
            <x-forms.error name="body" />

            <button type="submit" class="mt-4 rounded bg-gray-800 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                Post Comment
            </button>
        </form>

        <div class="space-y-4">
            @foreach($post->comments as $comment)
                <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="font-bold text-sm text-gray-900">{{ $comment->user->name ?? 'Anonymous' }}</span>
                        <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->body }}</p>
                </div>
            @endforeach
            
            @if($post->comments->isEmpty())
                <p class="text-gray-500 italic text-sm">No comments yet.</p>
            @endif
        </div>
    </div>

</x-layout>