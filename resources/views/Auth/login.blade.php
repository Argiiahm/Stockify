<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>

<body class="min-h-screen bg-gray-100 flex flex-col justify-center items-center">
    <div class="w-full min-h-screen bg-gradient-to-br from-purple-500 via-indigo-400 to-blue-600 flex items-center justify-center p-6">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
            <h1 class="text-4xl font-bold text-center text-purple-700 mb-12">Welcome <span class="lowercase font-normal">Stockify</span></h1>

            <form action="/masuk" method="POST" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-gray-700 font-bold mb-1" for="email">Email address</label>
                    @error('email')
                        <p class="text-sm text-red-800 mb-1">{{ $message }}</p>
                    @enderror
                    <input class="w-full px-4 py-2 rounded-lg border border-gray-400 bg-blue-50"
                           id="email" name="email" type="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-gray-700 font-bold mb-1" for="password">Password</label>
                    @error('password')
                        <p class="text-sm text-red-800 mb-1">{{ $message }}</p>
                    @enderror
                    <input class="w-full px-4 py-2 rounded-lg border border-gray-400 bg-blue-50"
                           id="password" name="password" type="password" required placeholder="Password">
                </div>

                {{-- Tombol --}}
                <div>
                    <button type="submit"
                            class="w-full bg-purple-700 hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg transition">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
