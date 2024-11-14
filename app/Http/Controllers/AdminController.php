<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use App\Models\College;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function indexAdmin()
    {
        return view('admin.index');
    }
    // =============== START STUDENTS ===============
    public function indexStudents()
    {
        $user = User::with('divisi', 'college')->orderBy('name','asc')->get();
        // $user = Auth::user();
        return view('admin.students.index', [
            'user' => $user,
        ]);
    }

    public function createStudents(){
        $divisions = Divisi::all();
        $colleges = College::all();
        return view('admin.students.createStudents', compact('divisions', 'colleges'));
    }

    public function storeStudents(Request $request)
    {
        $validatedData = $request->validate([
            'no_mbkm' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'divisi_id' => 'required|exists:divisi,id',
            'college_id' => 'required|exists:college,id',
        ]);

        // Cek apakah data dengan email, no_mbkm, dan college_id sudah ada
        if (User::where('no_mbkm', $request->no_mbkm)
                ->where('email', $request->email)
                ->where('college_id', $request->college_id)
                ->exists()) {
            // Kembalikan dengan pesan error jika sudah ada
            return redirect()->back()->withErrors(['duplicate' => 'Data Mahasiswa sudah ada.'])->withInput();
        }

        // Jika data belum ada, hash password dan simpan data
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect('/students')->with('success', 'Berhasil Menambahkan Mahasiswa');
    }

    public function editStudents($id)
    {
        $user = User::findorFail($id);
        $divisions = Divisi::all();
        $colleges = College::all();

        return view('admin.students.editStudents', [
            'user' => $user,
            'divisions' => $divisions,
            'colleges' => $colleges,
        ]);
    }

    public function updateStudents(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'no_mbkm' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'divisi_id' => 'required|exists:divisi,id',
            'college_id' => 'required|exists:college,id',
        ]);

        // Temukan perumahan berdasarkan ID
        $user = User::findOrFail($id);

        // Update data perumahan
        $user->update([
            'no_mbkm' => $request->no_mbkm,
            'name' => $request->name,
            'email' => $request->email,
            'divisi_id' => $request->divisi_id,
            'college_id' => $request->college_id,
        ]);

        // Simpan perubahan ke database
        // $user->save();

        return redirect()->route('admin.students')->with('success', 'Data Mahasiswa Berhasil Diperbarui');
    }

    public function destroyStudents(Request $request)
    {
        // Ambil ID dari request
        $user = User::findOrFail($request->id);

        // Hapus data
        $user->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/students')->with('success', 'Berhasil Menghapus Mahasiswa');
    }
    // =============== END COLLEGE  ===============



    // =============== START COLLEGE ===============
    public function indexCollege()
    {

        $college = College::orderBy('college', 'asc')->get();
        // $user = Auth::user();
        return view('admin.college.index', [
            'college' => $college,
        ]);
    }

    public function createCollege(){
        return view('admin.college.createCollege  ');
    }

    public function storeCollege(Request $request)
    {
        $request->validate([
            'college' => 'required',
        ]);

         // Cek apakah division sudah ada
        if (College::where('college', $request->college)->exists()) {
            // Kembalikan dengan pesan error jika sudah ada
            return redirect()->back()->withErrors(['college' => 'Perguruan Tinggi sudah ada.'])->withInput();
        }

          // Simpan data jika belum ada
        College::create(['college' => $request->college]);
        return redirect('/college')->with('success', 'Berhasil Menambahkan Perguruan Tinggi');


    }

    public function editCollege($id)
    {
        $college = College::find($id);

        return view('admin.college.editCollege', [
            'college' => $college,
        ]);
    }

    public function updateCollege(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'college' => 'required|max:255',
        ]);

        // Temukan perumahan berdasarkan ID
        $college = College::findOrFail($id);

        // Update data perumahan
        $college->college = $request->college;

        // Simpan perubahan ke database
        $college->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.college')->with('success', 'Data Perguruan Tinggi Berhasil Diperbarui');
    }

    public function destroyCollege(Request $request)
    {
        // Ambil ID dari request
        $college = College::findOrFail($request->id);

        // Hapus data
        $college->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/college')->with('success', 'Berhasil Menghapus Kampus');
    }
    // =============== END COLLEGE  ===============


    // =============== START DIVISI  ===============
    public function indexDivisi()
    {
        $divisi = Divisi::orderBy('division', 'asc')->get();
        // $user = Auth::user();
        return view('admin.divisi.index', [
            'divisi' => $divisi,
        ]);
    }

    public function createDivisi(){
        return view('admin.divisi.createDivisi  ');
    }

    public function storeDivisi(Request $request)
    {
        $request->validate([
            'division' => 'required',
        ]);

        // Cek apakah division sudah ada
        if (Divisi::where('division', $request->division)->exists()) {
            // Kembalikan dengan pesan error jika sudah ada
            return redirect()->back()->withErrors(['division' => 'Divisi sudah ada.'])->withInput();
        }

        // Simpan data jika belum ada
        Divisi::create(['division' => $request->division]);
        return redirect('/divisi')->with('success', 'Berhasil Menambahkan Divisi');
    }

    public function editDivisi($id)
    {
        $divisi = Divisi::find($id);

        return view('admin.divisi.editDivisi', [
            'divisi' => $divisi,
        ]);
    }

    public function updateDivisi(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'division' => 'required|max:255',
        ]);

        // Temukan perumahan berdasarkan ID
        $divisi = Divisi::findOrFail($id);

        // Update data perumahan
        $divisi->division = $request->division;

        // Simpan perubahan ke database
        $divisi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.divisi')->with('success', 'Data Divisi Berhasil Diperbarui');
    }

    public function destroyDivisi(Request $request)
    {
        // Ambil ID dari request
        $divisi = Divisi::findOrFail($request->id);

        // Hapus data
        $divisi->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/divisi')->with('success', 'Berhasil Menghapus Divisi');
    }
    // =============== END DIVISI  ===============

}
