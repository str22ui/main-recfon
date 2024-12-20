@extends('client.tamplate')
@section('content')
    <div class="mx-5 mt-2 md:mt-24 mb-10  ">
        <h1 class=" text-center">Clock Out</h1>
        {{ Auth::user()->name }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('user.storeClockOut') }}" enctype="multipart/form-data"
            class="px-5 py-5 grid grid-cols-1 md:grid-cols-2 gap-4 text-col rounded-md">
            @csrf
            <!-- Bagian kiri form -->
            <div class="text-blue-700 mx-5  ">
                <div class="mb-5 relative">
                    <label for="user_id" class="form-label block mb-2 text-sm font-medium">User id</label>
                    <div class="input-with-icon">
                    <input type="text" id="user_id" name="user_id"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required value="{{ Auth::user()->id }}">
                        <span class="icon">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>
                <input type="text" id="clockOut" name="clockOut" required>

                <input type="text" id="typeWork" name="typeWork" value="{{ $absent->typeWork ?? '' }}">


                <div class="mb-5 relative">
                    <label for="todaysActivity" class="form-label block mb-2 text-sm font-medium">Pekerjaan hari
                        ini</label>
                    <div class="input-with-icon">
                        <input type="text" id="todaysActivity" name="todaysActivity[]"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10"
                            placeholder="Masukkan pekerjaan hari ini" required>
                        <span class="icon">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                    <button type="button" onclick="addPekerjaan()" class="btn btn-secondary mb-3">Tambah
                        Pekerjaan</button>

                    <!-- Container untuk input pekerjaan tambahan -->
                    <div id="pekerjaan-container"></div>
                </div>

            </div>
            <div class="w-full flex justify-center md:justify-start md:ml-5  ">
                <button type="submit" name="submit"
                    class="text-white w-3/4 bg-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
            </div>
        </form>
    </div>

    <script src="/assets/js/clockout.js"></script>

@endsection
