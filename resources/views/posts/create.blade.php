<x-layout title="Create Post">
    <h1 class="mb-6 text-2xl font-bold">Create a New Post</h1>

    <form action="/posts" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf 

        <div>
            <label for='image' class="block text-sm font-medium text-gray-700">Post Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            
            <x-forms.error name="image" />
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-2 w-full border border-gray-400 p-2">
            
            <x-forms.error name="title" />
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold">Description</label>
            <textarea name="description" id="description" rows="6" class="mt-2 w-full border border-gray-400 p-2">{{ old('description') }}</textarea>
            
            <x-forms.error name="description" />
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-semibold">Post Creator</label>
            <select name="user_id" id="user_id" class="mt-2 w-full border border-gray-400 p-2">
                <option value="">Select a creator...</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            
            <x-forms.error name="user_id" />
        </div>

        <div class="flex gap-3">
            <button type="submit" class="rounded bg-gray-800 px-4 py-2 text-white hover:bg-gray-700">
                Create Post
            </button>
            <a href="/posts" class="rounded bg-gray-200 px-4 py-2 hover:bg-gray-300">Cancel</a>
        </div>
    </form>
</x-layout>