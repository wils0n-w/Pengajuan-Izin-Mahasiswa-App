<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Rounded Dashboard Layout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="header-container flex justify-center py-6">
        <header class="topbar bg-white text-gray-800 shadow-xl border border-gray-200 max-w-4xl w-full rounded-full transition duration-300 hover:shadow-2xl">
            <div class="flex items-center justify-between px-8 py-3">
                
                <nav>
                    <ul class="menu-list flex space-x-6">
                        <li><a href="#" class="font-medium hover:text-blue-600 transition duration-150">Home</a></li>
                        <li><a href="#" class="font-medium hover:text-blue-600 transition duration-150">Profile</a></li>
                    </ul>
                </nav>

                <div class="logo text-xl font-extrabold text-blue-600 tracking-wide bg-gray-50 px-4 py-1 rounded-full border border-blue-100 shadow-inner">
                    LOGO
                </div>
                
                <nav>
                    <ul class="menu-list flex space-x-6">
                        <li><a href="#" class="font-medium hover:text-blue-600 transition duration-150">Settings</a></li>
                        <li><a href="#" class="font-medium hover:text-blue-600 transition duration-150">Reports</a></li>
                        <li><a href="{{ route('layout.create') }}" class="font-medium hover:text-blue-600 transition duration-150">Create</a></li>
                    </ul>
                </nav>
        </div>
    </div>
    
</body> 

