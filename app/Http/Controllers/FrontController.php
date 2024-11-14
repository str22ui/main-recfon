<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absent;

class FrontController extends Controller
{
    //

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
        return redirect('/clockin')->with('success', 'Berhasil Clock In');
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
        return redirect('/clockin')->with('success', 'Berhasil Clock In');
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
        return redirect('/clockin')->with('success', 'Berhasil Clock In');
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
        return redirect('/clockin')->with('success', 'Berhasil Clock In');
    }


    public function ClockOut(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'typeWork' => 'required',
            'clockOut' => 'required|date_format:H:i',
            'todaysActivity' => 'required',
            'total' => 'required'
        ]);

        Absent::create($validatedData);
        return redirect('/clockin')->with('success', 'Berhasil Clock In');
    }

}
