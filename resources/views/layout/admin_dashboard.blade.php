<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="header-container flex justify-center py-6 mb-2">
        <header class="topbar bg-white text-gray-800 shadow-xl border border-gray-200 max-w-4xl w-full rounded-full transition duration-300 hover:shadow-2xl">
            <div class="flex items-center justify-between px-8 py-3">
                <nav>
                    <ul class="menu-list flex space-x-6">
                        <li><a href="{{ route('requests.index') }}" class="font-medium hover:text-blue-600 transition duration-150">Leave Request List</a></li>
                        <li><a href="{{ route('users.create') }}" class="font-medium hover:text-blue-600 transition duration-150">Create</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-xl mt-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <a href="{{ route('requests.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg text-center transition duration-300">
                Leave Request List
            </a>
            <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-lg text-center transition duration-300">
                Create User
            </a>
        </div>
    </div>

</body>
</html>
