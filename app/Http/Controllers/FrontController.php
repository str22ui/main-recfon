<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Absent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //

    public function indexHome(){
        $absents = Absent::where('user_id', auth()->id())->with('user')->get();

        return view('client.pages.home', compact('absents'));
    }
    public function indexClockIn()
    {
        return view('client.index');
    }

    public function indexClockInwfo()
    {
        return view('client.indexwfo');
    }

    public function indexClockInwfh()
    {
        return view('client.indexwfh');
    }

    public function indexClockInDinas()
    {
        return view('client.indexdinas');
    }

    public function indexClockInIzin()
    {
        return view('client.indexizin');
    }

    public function indexClockOut()
    {
        $userId = Auth::id();
        $absent = Absent::where('user_id', $userId)->latest()->first();
        return view('client.indexclockout',[
            'absent' => $absent,
        ]);
    }

    public function storeClockinwfo(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp', // Tambahkan validasi 'required'
            'maps' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
        }

        Absent::create($validatedData);
        session()->flash('success', 'Clock In WFO Success');
        return redirect('/');
    }

    public function storeClockinwfh(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp', // Tambahkan validasi 'required'
            'maps' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
        }

        Absent::create($validatedData);
        session()->flash('success', 'Clock In WFH Success');
        return redirect('/');
    }

    public function storeClockinDinas(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'businessTrip' => 'required',
        ]);

        Absent::create($validatedData);
        session()->flash('success', 'Clock In Field Duty Success');
        return redirect('/');
    }

    public function storeClockinIzin(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'file' => 'required|file|max:20480|mimes:pdf,doc,docx,ppt,pptx',
        ]);

        if ($request->hasFile('file')) {
            $validatedData['file'] = $request->file('file')->store('bukti-izin', 'public');
        }

        Absent::create($validatedData);
        session()->flash('success', 'Sick Leave has Uploaded');
        return redirect('/');
    }

    public function storeClockOut(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockOut' => 'required|date_format:H:i', // Validasi clockOut dengan format waktu
            'todaysActivity' => 'required',
        ]);

        // Ambil record Absent berdasarkan user_id dan created_at yang sama dengan hari ini
        $absent = Absent::where('user_id', $request->user_id)
            ->whereDate('created_at', Carbon::today()) // Mencari clock in yang dilakukan hari ini
            ->first();

        // Jika ditemukan, lakukan update clock out dan total jam kerja
        if ($absent) {
            // Update clockOut
            $absent->clockOut = $validatedData['clockOut'];

            // Hitung total jam kerja berdasarkan clockIn dan clockOut
            $clockInTime = Carbon::parse($absent->clockIn); // Gunakan clockIn yang sudah ada di record
            $clockOutTime = Carbon::createFromFormat('H:i', $validatedData['clockOut']); // Gunakan clockOut dari input

            // Hitung durasi dalam jam dan menit
            $totalDuration = $clockInTime->diff($clockOutTime);
            $hours = $totalDuration->h; // Ambil jam
            $minutes = $totalDuration->i; // Ambil menit

            // Simpan hasil format jam dan menit di field 'total'
            $absent->total = $hours . ' jam ' . $minutes . ' menit';

            // Simpan pekerjaan hari ini
            $absent->todaysActivity = json_encode($validatedData['todaysActivity']); // Jika terdapat multiple aktivitas

            // Update record di database
            $absent->save();

            return redirect('/')->with('success', 'Clock Out Success. Total Working Hours: ' . $absent->total);
        } else {
            return redirect('/')->with('error', 'Clock In not found for this user');
        }
    }
}
