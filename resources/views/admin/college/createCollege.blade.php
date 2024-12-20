@extends('admin.layouts.index', ['title' => 'Tambah Data Perguruan Tinggi', 'page_heading' => 'Tambah Data Perguruan Tinggi'])

@section('content')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<!-- Table untuk memanggil data dari database -->
        @include('sweetalert::alert')
		<form method="post" action="{{ route('admin.storeCollege') }}" enctype="multipart/form-data">
        @csrf
            {{-- Title --}}
            <div class="mb-3">
                <label for="college" class="form-label">Nama Perguruan Tinggi</label>
                <input type="text" class="form-control @error('college') is-invalid @enderror" id="college" name="college" value="{{ old('college') }}">
                @error('college')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
            {{-- <a class="btn btn-danger" href="{{ route('admin.perumahan') }}">Back</a> --}}
            <a class="btn btn-danger" href="/college">Back</a>
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



