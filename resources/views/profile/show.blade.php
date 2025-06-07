<x-layout>
    <div class="max-w-4xl mx-auto mt-12 bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Your Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none" required>
            </div>

            <div>
                <label for="about" class="block text-sm font-medium text-gray-700 mb-1">About</label>
                <textarea name="about" id="about" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 focus:outline-none resize-none">{{ $user->about }}</textarea>
            </div>

            <div class="text-center">
                <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>

                @if($user->picture)
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('storage/' . $user->picture) }}" alt="Profile Picture"
                             class="w-32 h-32 rounded-full object-cover shadow-md border border-gray-200">
                    </div>
                @endif

                <div class="flex justify-center">
                    <input type="file" name="picture" id="picture"
                           class="text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-red-500 file:text-white hover:file:bg-red-600">
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-lg transition duration-200 shadow-md">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</x-layout>
