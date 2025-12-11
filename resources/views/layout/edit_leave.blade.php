<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Permintaan Izin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-xl">
    <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Edit Permintaan Izin</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Ada beberapa kesalahan pada input Anda:</span>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('requests.update', $request->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="nama_mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa <span class="text-red-500">*</span></label>
            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $request->nama_mahasiswa) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-5">
            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM <span class="text-red-500">*</span></label>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $request->nim) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-5">
            <label for="nama_izin" class="block text-sm font-medium text-gray-700 mb-1">Alasan Izin (Opsional)</label>
            <input type="text" id="nama_izin" name="nama_izin" value="{{ old('nama_izin', $request->nama_izin) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-5">
            <label for="jenis_izin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Izin <span class="text-red-500">*</span></label>
            <select id="jenis_izin" name="jenis_izin" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500">
                <option value="sakit" @if(old('jenis_izin', $request->jenis_izin) == 'sakit') selected @endif>Sakit (Sakit)</option>
                <option value="izin" @if(old('jenis_izin', $request->jenis_izin) == 'izin') selected @endif>Izin Pribadi (Izin)</option>
                <option value="other" @if(old('jenis_izin', $request->jenis_izin) == 'other') selected @endif>Lainnya (Other)</option>
            </select>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-5">
            <div class="w-full md:w-1/2">
                <label for="tanggal_awal_izin" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai <span class="text-red-500">*</span></label>
                <input type="date" id="tanggal_awal_izin" name="tanggal_awal_izin" value="{{ old('tanggal_awal_izin', \Carbon\Carbon::parse($request->tanggal_awal_izin)->format('Y-m-d')) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="w-full md:w-1/2">
                <label for="tanggal_akhir_izin" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai <span class="text-red-500">*</span></label>
                <input type="date" id="tanggal_akhir_izin" name="tanggal_akhir_izin" value="{{ old('tanggal_akhir_izin', \Carbon\Carbon::parse($request->tanggal_akhir_izin)->format('Y-m-d')) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <div class="mb-6">
            <label for="alasan_izin" class="block text-sm font-medium text-gray-700 mb-1">Alasan Pengajuan Izin <span class="text-red-500">*</span></label>
            <textarea id="alasan_izin" name="alasan_izin" rows="4" required
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">{{ old('alasan_izin', $request->alasan_izin) }}</textarea>
        </div>
        
        <div class="mb-5">
            <label for="status_izin" class="block text-sm font-medium text-gray-700 mb-1">Status Izin <span class="text-red-500">*</span></label>
            <select id="status_izin" name="status_izin" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500">
                <option value="pending" @if(old('status_izin', $request->status_izin) == 'pending') selected @endif>Pending</option>
                <option value="approved" @if(old('status_izin', $request->status_izin) == 'approved') selected @endif>Approved</doption>
                <option value="rejected" @if(old('status_izin', $request->status_izin) == 'rejected') selected @endif>Rejected</option>
            </select>
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out shadow-md">
                Update Permintaan Izin
            </button>
        </div>
    </form>
    
    <div class="mt-4 text-center">
        <a href="{{ route('requests.index') }}" class="text-indigo-600 hover:text-indigo-800">Kembali ke Daftar</a>
    </div>

</div>

</body>
</html>
