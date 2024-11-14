@extends('admin.layouts.index', ['title' => 'Tambah Data Perguruan Tinggi', 'page_heading' => 'Tambah Data Perguruan Tinggi'])

@section('content')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<!-- Table untuk memanggil data dari database -->
        @include('sweetalert::alert')
		<form method="post" action="{{ route('admin.storeStudents') }}" enctype="multipart/form-data">
        @csrf
            {{-- Title --}}
            <div class="mb-3">
                <label for="no_mbkm" class="form-label">No MBKM</label>
                <input type="text" class="form-control @error('no_mbkm') is-invalid @enderror" id="no_mbkm" name="no_mbkm" value="{{ old('no_mbkm') }}">
                @error('no_mbkm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @error('duplicate')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="name" class="form-label">Nama Mahasiswa</label>
              
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @error('duplicate')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>

            <input type="text" class="form-control" id="role" name="role" value="students" hidden>

            <div class="mb-3">
                <label for="divisi_id" class="form-label">Divisi</label>
                <select class="form-control" id="divisi_id" name="divisi_id" required>
                    <option value="">Pilih Divisi</option>
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->division }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="college_id" class="form-label">Perguruan Tinggi</label>
                <select class="form-control" id="college_id" name="college_id" required>
                    <option value="">Pilih Perguruan Tinggi</option>
                    @foreach($colleges as $college)
                        <option value="{{ $college->id }}">{{ $college->college }}</option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Create</button>
            {{-- <a class="btn btn-danger" href="{{ route('admin.perumahan') }}">Back</a> --}}
            <a class="btn btn-danger" href="/students">Back</a>
        </form>

		{{-- Menampilkan total pemasukan --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		</div>

  </div>
</div>

</section>

<script>

</script>


@endsection



