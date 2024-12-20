@extends('admin.layouts.index', ['title' => 'Kampus', 'page_heading' => 'Master Data Student'])


@section('content')
{{-- @include('sweetalert::alert') --}}
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

            <a href="{{ route('admin.createCollege') }}" class="btn btn-success me-2 py-2" >
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
                    <th class="col-md-1">Perguruan Tinggi</th>
                    <th class="col-md-1">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($college as $c )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->college}}</td>
                    <td>
                        <a href="{{ route('admin.editCollege', ['id' => $c->id]) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ route('admin.deleteCollege') }}" method="POST">                            @csrf
                            @method('DELETE')
                            <!-- Input untuk mengirim ID perumahan yang ingin dihapus -->
                            <input type="hidden" name="id" value="{{ $c->id }}">
                            <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                        </form>

                    </td>
                </tr>

                @endforeach
            </tbody>
		</table>


		<div class="d-flex align-items-end flex-column p-2 mb-2">

		</div>

		{{-- {{ $article->withQueryString()->links() }} --}}
  </div>
</div>

</section>
@endsection


