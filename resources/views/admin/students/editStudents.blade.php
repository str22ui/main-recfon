@extends('admin.layouts.index', ['title' => 'Edit Mahasiswa', 'page_heading' => 'Update Mahasiswa'])

@section('content')
<section class="row">
    <div class="col card px-3 py-3">

    <div class="my-3 p-3 rounded">

    @include('sweetalert::alert')
    <form method="post" action="{{ route('admin.updateStudents', ['id' => $user->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="no_mbkm" class="form-label">No MBKM</label>
            <input type="text" class="form-control" id="no_mbkm" name="no_mbkm" value="{{ $user->no_mbkm }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="divisi_id" class="form-label">Divisi</label>
            <select class="form-control" id="divisi_id" name="divisi_id" required>
                <option value="">Pilih Divisi</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}" {{ $user->divisi_id == $division->id ? 'selected' : '' }}>{{ $division->division }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="college_id" class="form-label">Perguruan Tinggi</label>
            <select class="form-control" id="college_id" name="college_id" required>
                <option value="">Pilih Perguruan Tinggi</option>
                @foreach($colleges as $college)
                    <option value="{{ $college->id }}" {{ $user->college_id == $college->id ? 'selected' : '' }}>{{ $college->college }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-danger" href="/students">Back</a>
    </form>
    </div>
    </div>
</section>
@endsection
