<x-layout title="Edit Post">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Edit Post</h1>
    </div>

    <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">
        <form action="/posts/{{ $post->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH') 

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">{{ $post->description }}</textarea>
            </div>

            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">Post Creator</label>
                <select name="user_id" id="user_id" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="inline-block rounded bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow hover:bg-indigo-700">
                    Update Post
                </button>
                <a href="/posts" class="text-sm font-medium text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>