<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $requests = LeaveRequest::with('user')->get();
        return view('dashboard.index', compact('requests'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_izin' => 'nullable|string|max:255',
            'tanggal_awal_izin' => 'required|date',
            'tanggal_akhir_izin' => 'required|date|after_or_equal:tanggal_awal_izin',
            'jenis_izin' => 'required|in:sakit,izin,other',
            'alasan_izin' => 'required|string',
        ]);

        LeaveRequest::create([
            'user_id' => Auth::id(), 
            'nama_izin' => $request->nama_izin,
            'tanggal_awal_izin' => $request->tanggal_awal_izin,
            'tanggal_akhir_izin' => $request->tanggal_akhir_izin,
            'jenis_izin' => $request->jenis_izin,
            'alasan_izin' => $request->alasan_izin,
            'status_izin' => 'pending', 
        ]);

        return redirect()->route('requests.index');
    }

    public function show(LeaveRequest $request)
    {
        return view('dashboard.show', compact('request'));
    }

    public function edit(LeaveRequest $request)
    {
        return view('dashboard.edit', compact('request'));
    }

    public function update(Request $request, LeaveRequest $request_model)
    {
        $request->validate([
            'nama_izin' => 'nullable|string|max:255',
            'tanggal_awal_izin' => 'required|date',
            'tanggal_akhir_izin' => 'required|date|after_or_equal:tanggal_awal_izin',
            'jenis_izin' => 'required|in:sakit,izin,other',
            'alasan_izin' => 'required|string',
            'status_izin' => 'required|in:pending,approved,rejected', 
        ]);

        $request_model->update($request->all());

        return redirect()->route('requests.index');
    }

    public function destroy(LeaveRequest $request_model)
    {
        $request_model->delete();
        return redirect()->route('requests.index');
    }
}