@extends('admin.layouts.index', ['title' => 'Mahasiswa', 'page_heading' => 'Master Data Student'])


@section('content')
{{-- @include('sweetalert::alert') --}}
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

        <a href="{{ route('admin.createStudents') }}" class="btn btn-success me-2 py-2" >

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
                    <th class="col-md-2">No MBKM</th>
                    <th class="col-md-1">Nama Mahasiswa</th>
                    <th class="col-md-2">Email</th>
                    <th class="col-md-2">Divisi</th>
                    {{-- <th class="col-md-2">Kampus</th> --}}
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->no_mbkm }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->divisi->division ?? 'N/A' }}</td>
                    <td>{{ $u->college->college ?? 'N/A' }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm btn-view" data-bs-toggle="modal" data-bs-target="#viewStudentModal"
                        data-user='@json($u)'>
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        {{-- <a href="" class="btn btn-warning btn-sm"> --}}
                        <a href="{{ route('admin.editStudents', ['id' => $u->id]) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="" method="POST">
                            @csrf
                        {{-- <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ route('admin.deleteCollege') }}" method="POST">                            @csrf --}}
                            @method('DELETE')
                            <!-- Input untuk mengirim ID perumahan yang ingin dihapus -->
                            <input type="hidden" name="id" value="{{ $u->id }}">
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
<!-- Modal -->
<div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewStudentModalLabel">Detail Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="no_mbkm" class="form-label">No MBKM</label>
                    <p id="no_mbkm" class="form-control-plaintext">123456</p>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Mahasiswa</label>
                    <p id="name" class="form-control-plaintext">John Doe</p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p id="email" class="form-control-plaintext">johndoe@example.com</p>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Divisi</label>
                    <p id="divisi" class="form-control-plaintext">Divisi Teknologi</p>
                </div>
                <div class="mb-3">
                    <label for="college" class="form-label">Perguruan Tinggi</label>
                    <p id="college" class="form-control-plaintext">Universitas Contoh</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</section>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-view').forEach(button => {
        button.addEventListener('click', function () {
            const user = JSON.parse(this.getAttribute('data-user'));

            // Set each field in the modal with user data
            document.getElementById('no_mbkm').innerText = user.no_mbkm || 'Data tidak tersedia';
            document.getElementById('name').innerText = user.name || 'Data tidak tersedia';
            document.getElementById('email').innerText = user.email || 'Data tidak tersedia';
            document.getElementById('divisi').innerText = user.divisi.division || 'Data tidak tersedia';
            document.getElementById('college').innerText = user.college.college || 'Data tidak tersedia';
        });
    });
});


</script>
@endsection


