@extends('admin.layouts.index', ['title' => 'Student', 'page_heading' => 'Master Data Student'])


@section('content')
{{-- @include('sweetalert::alert') --}}
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

    {{-- <a href="{{ route('admin.createPerumahan') }}" class="btn btn-success me-2 py-2" > --}}
        <a href="" class="btn btn-success me-2 py-2" >
            + Insert Data
        </a>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
        @endif
		<!-- Table untuk memanggil data dari database -->
		<table class="table">
            <thead>
                <tr>
                    <th class="col-sm-1">No</th>
                    <th class="col-md-2">Student Had Studies</th>
                    <th class="col-md-1">Student</th>
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>Halo</td>
                    <td>Halo</td>
                    <td>Halo</td>
                    <td>Halo</td>
                </tr>

            </tbody>
		</table>


		<div class="d-flex align-items-end flex-column p-2 mb-2">

		</div>

		{{-- {{ $article->withQueryString()->links() }} --}}
  </div>
</div>

</section>
@endsection


