<x-layout>
    <div class="max-w-4xl mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6">Your Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" value="{{ $user->name }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" value="{{ $user->email }}" required>
            </div>

            <div class="mb-4">
                <label for="about" class="block text-gray-700">About</label>
                <textarea name="about" id="about" class="w-full px-4 py-2 border rounded" rows="4">{{ $user->about }}</textarea>
            </div>

            <div class="mb-4">
                <label for="picture" class="block text-gray-700">Profile Picture</label>
                @if($user->picture)
                    <img src="{{ asset('storage/' . $user->picture) }}" alt="Profile Picture" class="w-32 h-32 rounded-full mb-4">
                @endif
                <input type="file" name="picture" id="picture" class="w-full px-4 py-2 border rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
        </form>
    </div>
</x-layout>
