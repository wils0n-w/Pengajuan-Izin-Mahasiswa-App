<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Creation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">Register</h1>
        
        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <strong>The following errors occurred:</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('users.store')}}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM (Student ID):</label>
                <input type="text" id="nim" name="nim" value="{{ old('nim') }}" class="w-full px-3 py-2 border border-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label for="user" class="block text-sm font-medium text-gray-700 mb-1">User Role:</label>
                <select id="user" name="user" class="w-full px-3 py-2 border border-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="student" {{ old('user') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="faculty" {{ old('user') == 'faculty' ? 'selected' : '' }}>Faculty</option>
                    <option value="admin" {{ old('user') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password (Min 8 characters):</label>
                <input type="password" id="password" name="password" minlength="8" class="w-full px-3 py-2 border border-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" class="w-full px-3 py-2 border border-blue-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md transition duration-200 mt-6">Register</button>
        </form>
    </div>
</body>
</html>