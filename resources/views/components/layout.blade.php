<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Maker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

<nav class="bg-white shadow-md py-4 px-8 flex justify-between items-center">
    <div class="text-xl font-semibold text-gray-800">
        <a href="/">BlogMaker</a>
    </div>

    <div class="space-x-4">
        @auth
            <a href="{{ route('profile.show') }}" class="text-gray-700">Profile</a>
            <a href="{{ route('posts.create') }}" class="text-blue-500 hover:underline">Create a Post</a>

        @if(auth()->user()->admin)
                <a href="/users" class="text-gray-700">Users</a>
            @endif

            <form method="POST" action="/logout" class="inline">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                    Log Out
                </button>
            </form>
        @endauth

        @guest
            <a href="/signup" class="text-blue-500 font-semibold hover:text-blue-700 transition duration-300">Sign up</a>
            <a href="/login" class="text-blue-500 font-semibold hover:text-blue-700 transition duration-300">Log in</a>
        @endguest
    </div>
</nav>

<main class="max-w-3xl mx-auto mt-8 p-4">
    {{$slot}}
</main>

</body>
</html>
