<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased min-h-screen flex flex-col">

    <nav class="bg-gray-800 text-white p-4 shadow-lg fixed w-full z-10 top-0">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-wide hover:text-gray-300 transition-colors">Admin Panel</a>
            <div class="flex items-center space-x-6">
                @if (Auth::check() && (Auth::user()->role == 'Admin' || Auth::user()->role == 'Faculty'))
                    <a href="{{ route('requests.index') }}" class="hover:text-gray-300 transition-colors">Leave Requests</a>
                @endif
                @if (Auth::check() && Auth::user()->role == 'Admin')
                    <a href="{{ route('users.create') }}" class="hover:text-gray-300 transition-colors">Create User</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-red-600 rounded-md hover:bg-red-700 transition-colors">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-20 p-8">
        <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-xl">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-8 border-b-4 border-indigo-500 pb-4">Welcome to the Admin Dashboard</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                @if (Auth::check() && (Auth::user()->role == 'Admin' || Auth::user()->role == 'Faculty'))
                <!-- Card for Leave Requests -->
                <a href="{{ route('requests.index') }}" class="block p-6 bg-blue-500 text-white rounded-lg shadow-md hover:shadow-xl hover:bg-blue-600 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Manage Leave Requests</h2>
                        <svg class="w-8 h-8 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-200">View, approve, or reject pending leave applications.</p>
                </a>
                @endif

                <!-- Card for User Management -->
                @if (Auth::check() && Auth::user()->role == 'Admin')
                <a href="{{ route('users.create') }}" class="block p-6 bg-green-500 text-white rounded-lg shadow-md hover:shadow-xl hover:bg-green-600 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Create New User</h2>
                        <svg class="w-8 h-8 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-200">Add new users or manage existing user accounts.</p>
                </a>
                @endif

            </div>
        </div>
    </main>

</body>
</html>
