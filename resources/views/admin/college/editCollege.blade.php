@extends('admin.layouts.index', ['title' => 'Edit Universitas', 'page_heading' => 'Update Universitas'])

@section('content')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<!-- Table untuk memanggil data dari database -->
        @include('sweetalert::alert')
		<form method="post" action="{{ route('admin.updateCollege', ['id' => $college->id]) }}" enctype="multipart/form-data">

        @method('PUT')
        @csrf
            {{-- Title --}}

            <div class="mb-3">
                <label for="college" class="form-label">Nama Kampus</label>
                <input type="text" class="form-control" id="college" name="college"
                    value="{{ $college->college }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            {{-- <a class="btn btn-danger" href="{{ route('admin.perumahan') }}">Back</a> --}}
            <a class="btn btn-danger" href="/college">Back</a>
        </form>

		{{-- Menampilkan total pemasukan --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		</div>
		{{-- Paginator --}}
		{{-- {{ $data->withQueryString()->links() }} --}}
  </div>
</div>

</section>

{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}


@endsection



