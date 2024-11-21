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

    // public function storeClockinwfo(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => 'required',
    //         'typeWork' => 'required',
    //         'clockIn' => 'required|date_format:H:i',
    //         'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp', // Tambahkan validasi 'required'
    //         'maps' => 'required',
    //     ]);

    //     if ($request->hasFile('img')) {
    //         $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
    //     }

    //     Absent::create($validatedData);
    //     session()->flash('success', 'Clock In WFO Success');
    //     return redirect('/');
    // }

    // public function storeClockinwfo(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => 'required',
    //         'typeWork' => 'required',
    //         'clockIn' => 'required|date_format:H:i',
    //         'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp', // Tambahkan validasi 'required'
    //         'maps' => 'required',
    //     ]);

    //       // Lokasi kantor
    //       $officeLat = -6.194888;
    //       $officeLng = 106.869249;

    //       // Lokasi pengguna dari input
    //       [$userLat, $userLng] = explode(',', $request->maps);

    //       // Hitung jarak
    //       $distance = $this->calculateDistance($officeLat, $officeLng, $userLat, $userLng);

    //      // Validasi radius (misal, maksimal 1 km)
    //       if ($distance > 1) {
    //           return redirect()->back()->withErrors(['maps' => 'Anda berada di luar radius absen (1 km).']);
    //       }


    //       if ($request->hasFile('img')) {
    //           $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
    //       }

    //       Absent::create($validatedData);
    //       session()->flash('success', 'Clock In WFO Success');
    //       return redirect('/');
    // }
    public function storeClockinwfo(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp',
            'maps' => 'required',
        ]);

        // Cek apakah pengguna sudah Clock In hari ini
        $today = date('Y-m-d');
        $alreadyClockedIn = Absent::where('user_id', $request->user_id)
            ->whereDate('clockIn', $today)
            ->exists();

        if ($alreadyClockedIn) {
            return redirect()->back()->withErrors(['clockIn' => 'Anda sudah melakukan Clock In hari ini.']);
        }

        // Lokasi kantor
        $officeLat = -6.194888;
        $officeLng = 106.869249;

        // Lokasi pengguna dari input
        [$userLat, $userLng] = explode(',', $request->maps);

        // Hitung jarak
        $distance = $this->calculateDistance($officeLat, $officeLng, $userLat, $userLng);

        // Validasi radius (misal, maksimal 1 km)
        if ($distance > 1) {
            return redirect()->back()->withErrors(['maps' => 'Anda berada di luar radius absen (1 km).']);
        }

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
        }

        Absent::create($validatedData);

        session()->flash('success', 'Clock In WFO Success');
        return redirect('/');
    }


    private function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // Radius bumi dalam kilometer

        // Pastikan semua nilai dikonversi ke float
        $lat1 = (float)$lat1;
        $lng1 = (float)$lng1;
        $lat2 = (float)$lat2;
        $lng2 = (float)$lng2;

        // Hitung jarak
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c; // Jarak dalam kilometer

        return $distance;
    }


    // public function storeClockinwfh(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => 'required',
    //         'typeWork' => 'required',
    //         'clockIn' => 'required|date_format:H:i',
    //         'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp', // Tambahkan validasi 'required'
    //         'maps' => 'required',
    //     ]);

    //     if ($request->hasFile('img')) {
    //         $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
    //     }

    //     Absent::create($validatedData);
    //     session()->flash('success', 'Clock In WFH Success');
    //     return redirect('/');
    // }

    public function storeClockinwfh(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'img' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif,webp',
            'maps' => 'required',
        ]);

        // Cek apakah pengguna sudah melakukan clock-in hari ini
        $userId = $request->input('user_id');
        $today = now()->format('Y-m-d'); // Tanggal hari ini
        $alreadyClockedIn = Absent::where('user_id', $userId)
            ->whereDate('created_at', $today) // Cek berdasarkan tanggal
            ->exists();

        if ($alreadyClockedIn) {
            // Jika sudah clock-in, kembalikan dengan pesan error
            return redirect('/')
                ->with('error', 'You have already clocked in today!');
        }

        // Simpan data jika belum clock-in
        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('absent-wfo', 'public');
        }

        Absent::create($validatedData);

        session()->flash('success', 'Clock In WFH Success');
        return redirect('/');
    }




    // public function storeClockinDinas(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'user_id' => 'required',
    //         'typeWork' => 'required',
    //         'clockIn' => 'required|date_format:H:i',
    //         'businessTrip' => 'required',
    //     ]);

    //     Absent::create($validatedData);
    //     session()->flash('success', 'Clock In Field Duty Success');
    //     return redirect('/');
    // }
    public function storeClockinDinas(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockIn' => 'required|date_format:H:i',
            'businessTrip' => 'required',
        ]);

        $userId = $request->input('user_id');
        $today = now()->format('Y-m-d');
        $alreadyClockedIn = Absent::where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->exists();

        if ($alreadyClockedIn) {
            return redirect('/')
                ->with('error', 'You have already clocked in today!');
        }

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
