<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Permintaan Izin (Leave Request)</title>
    <!-- Load Tailwind CSS from CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for a cleaner UI */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body>
    <div class="h-fit flex items-center justify-center p-4">
        <div class="w-full max-w-2xl bg-white p-8 md:p-10 shadow-xl rounded-xl">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 border-b pb-2">Form Permintaan Izin</h1>

            <!-- Error Display Block -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md relative mb-6" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline"> Ada beberapa kesalahan pada input Anda:</span>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Leave Request Form -->
            <form action="{{ route('requests.store') }}" method="POST">
                @csrf

                <!-- Nama Mahasiswa (Required) -->
                <div class="mb-5">
                    <label for="nama_mahasiswa" class="block text-sm font-medium text-gray-700 mb-1">Nama Mahasiswa <span class="text-red-500">*</span></label>
                    <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('nama_mahasiswa') border-red-500 @enderror"
                           placeholder="Masukkan Nama Lengkap Anda">
                    @error('nama_mahasiswa')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIM (Required) -->
                <div class="mb-5">
                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM <span class="text-red-500">*</span></label>
                    <input type="text" id="nim" name="nim" value="{{ old('nim') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('nim') border-red-500 @enderror"
                           placeholder="Masukkan Nomor Induk Mahasiswa Anda">
                    @error('nim')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Izin (Optional) -->
                <div class="mb-5">
                    <label for="nama_izin" class="block text-sm font-medium text-gray-700 mb-1">Alasan Izin (Opsional)</label>
                    <input type="text" id="nama_izin" name="nama_izin" value="{{ old('nama_izin') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('nama_izin') border-red-500 @enderror"
                           placeholder="Cuti Tahunan, Izin Kuliah, dll.">
                    @error('nama_izin')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jenis Izin (Required Select) -->
                <div class="mb-5">
                    <label for="jenis_izin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Izin <span class="text-red-500">*</span></label>
                    <select id="jenis_izin" name="jenis_izin" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500 @error('jenis_izin') border-red-500 @enderror">
                        <option value="" disabled {{ old('jenis_izin') == null ? 'selected' : '' }}>Pilih Jenis Izin</option>
                        <option value="sakit" {{ old('jenis_izin') == 'sakit' ? 'selected' : '' }}>Sakit (Sakit)</option>
                        <option value="izin" {{ old('jenis_izin') == 'izin' ? 'selected' : '' }}>Izin Pribadi (Izin)</option>
                        <option value="other" {{ old('jenis_izin') == 'other' ? 'selected' : '' }}>Lainnya (Other)</option>
                    </select>
                    @error('jenis_izin')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Awal & Tanggal Akhir (Required Dates) -->
                <div class="flex flex-col md:flex-row gap-4 mb-5">
                    <div class="w-full md:w-1/2">
                        <label for="tanggal_awal_izin" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai <span class="text-red-500">*</span></label>
                        <input type="date" id="tanggal_awal_izin" name="tanggal_awal_izin" value="{{ old('tanggal_awal_izin') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('tanggal_awal_izin') border-red-500 @enderror">
                        @error('tanggal_awal_izin')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2">
                        <label for="tanggal_akhir_izin" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai <span class="text-red-500">*</span></label>
                        <input type="date" id="tanggal_akhir_izin" name="tanggal_akhir_izin" value="{{ old('tanggal_akhir_izin') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('tanggal_akhir_izin') border-red-500 @enderror">
                        @error('tanggal_akhir_izin')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Alasan Izin (Required Textarea) -->
                <div class="mb-6">
                    <label for="alasan_izin" class="block text-sm font-medium text-gray-700 mb-1">Alasan Pengajuan Izin <span class="text-red-500">*</span></label>
                    <textarea id="alasan_izin" name="alasan_izin" rows="4" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 @error('alasan_izin') border-red-500 @enderror"
                              placeholder="Jelaskan alasan Anda mengajukan izin/cuti secara rinci...">{{ old('alasan_izin') }}</textarea>
                    @error('alasan_izin')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out shadow-md">
                        Kirim Permintaan Izin
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
