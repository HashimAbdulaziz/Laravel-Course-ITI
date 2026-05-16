<x-layout title="Edit Post">
    <h1 class="mb-6 text-2xl font-bold">Edit Post</h1>

    <form action="/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PATCH') 

        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="mt-2 w-full border border-gray-400 p-2">
            
            <x-forms.error name="title" />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold">Description</label>
            <textarea name="description" id="description" rows="6" class="mt-2 w-full border border-gray-400 p-2">{{ old('description', $post->description) }}</textarea>
            
            <x-forms.error name="description" />
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-semibold">Post Creator</label>
            <select name="user_id" id="user_id" class="mt-2 w-full border border-gray-400 p-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            
            <x-forms.error name="user_id" />
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded bg-gray-800 px-4 py-2 text-white hover:bg-gray-700">
                Update Post
            </button>
            <a href="/posts" class="rounded bg-gray-200 px-4 py-2 hover:bg-gray-300">Cancel</a>
        </div>
    </form>
</x-layout>