<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permintaan Izin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">📋 Detail Permintaan Izin</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm font-medium text-gray-500">Nama Mahasiswa</p>
            <p class="text-lg text-gray-900">{{ $request->nama_mahasiswa }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">NIM</p>
            <p class="text-lg text-gray-900">{{ $request->nim }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Jenis Izin</p>
            <p class="text-lg">
                <span class="
                    @if($request->jenis_izin == 'sakit') bg-yellow-100 text-yellow-800
                    @elseif($request->jenis_izin == 'izin') bg-blue-100 text-blue-800
                    @else bg-purple-100 text-purple-800
                    @endif
                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize">
                    {{ $request->jenis_izin }}
                </span>
            </p>
        </div>
        @if($request->nama_izin)
        <div>
            <p class="text-sm font-medium text-gray-500">Nama Izin Khusus</p>
            <p class="text-lg text-gray-900">{{ $request->nama_izin }}</p>
        </div>
        @endif
        <div>
            <p class="text-sm font-medium text-gray-500">Tanggal Awal Izin</p>
            <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($request->tanggal_awal_izin)->format('d/m/Y') }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Tanggal Akhir Izin</p>
            <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($request->tanggal_akhir_izin)->format('d/m/Y') }}</p>
        </div>
        <div class="md:col-span-2">
            <p class="text-sm font-medium text-gray-500">Alasan Izin</p>
            <p class="text-lg text-gray-900">{{ $request->alasan_izin }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Status</p>
            <p class="text-lg">
                <span class="
                    @if($request->status_izin == 'pending') bg-orange-100 text-orange-800
                    @elseif($request->status_izin == 'approved') bg-green-100 text-green-800
                    @else bg-red-100 text-red-800
                    @endif
                    px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize">
                    {{ $request->status_izin }}
                </span>
            </p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-500">Waktu Diajukan</p>
            <p class="text-lg text-gray-900">{{ $request->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="mt-8 border-t pt-6">
        <a href="{{ route('requests.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali ke Daftar
        </a>
    </div>
</div>

</body>
</html>
