<x-layout>
    <div class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-4">Sign Up</h2>

        <form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name:</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email:</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" value="{{ old('email') }}" required>
                @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password:</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 p-2 rounded" required>
                @error('password')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="picture" class="block text-sm font-medium">Profile Picture (optional):</label>
                <input type="file" name="picture" id="picture" class="w-full border border-gray-300 p-2 rounded">
                @error('picture')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="about" class="block text-sm font-medium">About Me (optional):</label>
                <textarea name="about" id="about" rows="4" class="w-full border border-gray-300 p-2 rounded">{{ old('about') }}</textarea>
                @error('about')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Sign Up</button>
        </form>
    </div>
</x-layout>
