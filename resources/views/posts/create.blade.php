<x-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Create a New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="short_description" class="block text-gray-700 font-semibold mb-2">Short Description</label>
                <textarea name="short_description" id="short_description" rows="2" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="6" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label for="picture" class="block text-gray-700 font-semibold mb-2">Picture (optional)</label>
                <input type="file" name="picture" id="picture" class="w-full">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Publish Post</button>
            </div>
        </form>
    </div>
</x-layout>
