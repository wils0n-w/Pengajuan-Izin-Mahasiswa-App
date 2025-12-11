<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::with('user')->get();
        return view('layout.leave_list', compact('leaveRequests'));
    }

    public function create()
    {
        return view('layout.create_leave');
    }

    // In app/Http/Controllers/LeaveRequestController.php

public function store(Request $request)
{
    $request->validate([
        'nama_mahasiswa' => 'required|string|max:255',
        'nim' => 'required|string|max:10',
        'nama_izin' => 'nullable|string|max:255',
        'tanggal_awal_izin' => 'required|date',
        'tanggal_akhir_izin' => 'required|date|after_or_equal:tanggal_awal_izin',
        'jenis_izin' => 'required|in:sakit,izin,other',
        'alasan_izin' => 'required|string',
    ]);

    try {
        LeaveRequest::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'nama_izin' => $request->nama_izin,
            'tanggal_awal_izin' => $request->tanggal_awal_izin,
            'tanggal_akhir_izin' => $request->tanggal_akhir_izin,
            'jenis_izin' => $request->jenis_izin,
            'alasan_izin' => $request->alasan_izin,
            'status_izin' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permintaan izin berhasil diajukan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal mengajukan permintaan izin. Silakan coba lagi.');
    }
}

    public function show(LeaveRequest $request)
    {
        return view('layout.show', compact('request'));
    }

    public function edit(LeaveRequest $request)
    {
        return view('layout.edit_leave', compact('request'));
    }

    public function update(Request $formData, LeaveRequest $request)
    {
        $validated = $formData->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'nama_izin' => 'nullable|string|max:255',
            'nim' => 'required|string|max:10',
            'tanggal_awal_izin' => 'required|date',
            'tanggal_akhir_izin' => 'required|date|after_or_equal:tanggal_awal_izin',
            'jenis_izin' => 'required|in:sakit,izin,other',
            'alasan_izin' => 'required|string',
            'status_izin' => 'required|in:pending,approved,rejected',
        ]);

        $request->update($validated);

        return redirect()->route('requests.index')->with('success', 'Permintaan izin berhasil diperbarui.');
    }

    public function destroy(LeaveRequest $request)
    {
        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Permintaan izin berhasil dihapus.');
    }

    public function updateStatus(Request $formData, LeaveRequest $request)
    {
        $formData->validate([
            'status_izin' => 'required|in:approved,rejected',
        ]);
    
        $request->update([
            'status_izin' => $formData->status_izin,
        ]);
    
        return redirect()->route('requests.index')->with('success', 'Status permintaan izin berhasil diperbarui.');
    }
}