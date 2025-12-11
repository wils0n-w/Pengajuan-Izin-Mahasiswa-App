<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Permintaan Izin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

     <div class="header-container flex justify-center py-6 mb-2" >
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
                        <li><a href="{{ route('requests.index') }}" class="font-medium hover:text-blue-600 transition duration-150">Leave Request List</a></li>
                        <li><a href="{{ route('users.create') }}" class="font-medium hover:text-blue-600 transition duration-150">Create</a></li>
                    </ul>
                </nav>
        </div>
    </div>
<div class="max-w-8xl mx-auto bg-white p-6 rounded-lg shadow-xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">📋 Daftar Permintaan Izin Mahasiswa</h1>

    @if($leaveRequests->isEmpty())
        <p class="text-gray-500 italic">Belum ada permintaan izin yang tersedia.</p>
    @else
        <div>
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Izin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Izin Khusus</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Awal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Akhir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alasan Izin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Diajukan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($leaveRequests as $key => $request)
                        <tr>
                            <td class="px-6 py-4">{{ $key + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $request->nama_mahasiswa }}</td>
                            <td class="px-6 py-4">{{ $request->nim }}</td>
                            <td class="px-6 py-4">
                                <span class="
                                    @if($request->jenis_izin == 'sakit') bg-yellow-100 text-yellow-800
                                    @elseif($request->jenis_izin == 'izin') bg-blue-100 text-blue-800
                                    @else bg-purple-100 text-purple-800
                                    @endif
                                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize">
                                    {{ $request->jenis_izin }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $request->nama_izin ?? '-' }}
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($request->tanggal_awal_izin)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($request->tanggal_akhir_izin)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 max-w-xs text-sm text-gray-500 overflow-hidden truncate" title="{{ $request->alasan_izin }}">
                                {{ \Illuminate\Support\Str::limit($request->alasan_izin, 50) }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="
                                    @if($request->status_izin == 'pending') bg-orange-100 text-orange-800
                                    @elseif($request->status_izin == 'approved') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif
                                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize">
                                    {{ $request->status_izin }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $request->created_at->format('d/m/Y H:i') }}
                            </td>
                            
                            {{-- ACTIONS COLUMN --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex flex-col space-y-2">
                                    {{-- SHOW/VIEW BUTTON --}}
                                    <a href="{{ route('requests.show', $request->id) }}" class="text-indigo-600 hover:text-indigo-900 text-xs font-semibold">View</a>
                                    
                                    {{-- EDIT BUTTON --}}
                                    <a href="{{ route('requests.edit', $request->id) }}" class="text-blue-600 hover:text-blue-900 text-xs font-semibold">Edit</a>

                                    {{-- DELETE FORM/BUTTON --}}
                                    <form action="{{ route('requests.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this request?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs font-semibold">Delete</button>
                                    </form>

                                    {{-- APPROVE/DENY FORMS --}}
                                    @if($request->status_izin == 'pending')
                                        <div class="flex flex-col space-y-2">
                                            {{-- Approve Form --}}
                                            <form action="{{ route('requests.update_status', ['request' => $request->id]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_izin" value="approved">
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-xs w-full">Approve</button>
                                            </form>

                                            {{-- Reject Form --}}
                                            <form action="{{ route('requests.update_status', ['request' => $request->id]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status_izin" value="rejected">
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-xs w-full">Reject</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

</body>
</html>