<x-layout>

    <div class="max-w-4xl mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Published Posts</h1>

        @forelse ($posts as $post)
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 text-sm mb-4">Published on: {{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }}</p>

                @if ($post->picture)
                    <img src="{{ asset('storage/' . $post->picture) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover mb-4 rounded-lg">
                @endif

                <p class="text-gray-600 mb-4">{{ $post->short_description }}</p>

                <p class="text-gray-700 mb-4">{{ $post->description }}</p>
            </div>


        @empty
            <p class="text-gray-500">No posts available.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{$posts->links()}}
    </div>

</x-layout>
