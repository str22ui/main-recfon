@extends('client.tamplate')
@section('content')
    <div class="mx-5 mt-2 md:mt-24 mb-10 min-h-[70vh] flex flex-col justify-center">

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
            class="container mx-auto w-1/2 bg-white p-20 rounded-3xl shadow-2xl">
            <h1 class="text-center text-2xl font-bold text-red-500 mb-10">Clock Out</h1>
            @csrf

            <!-- Bagian form yang ada pada Clock-Out tetap dipertahankan -->
            <div class="text-red-700 mx-5">
                <div>
                    <input type="text" id="user_id" name="user_id"
                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 hidden w-full p-2.5"
                        required value="{{ Auth::user()->id }}">
                </div>

                <input type="text" id="clockOut" name="clockOut" required class="hidden">
                <input type="text" id="typeWork" name="typeWork" value="{{ $absent->typeWork ?? '' }}" class="hidden">

                <!-- Bagian tambahan pekerjaan hari ini -->
                <div class="mb-5">
                    <label for="todaysActivity" class="block mb-2 text-sm font-medium text-gray-700">Pekerjaan Hari
                        Ini</label>
                    <div id="pekerjaan-container">
                        <div class="flex items-center mb-2">
                            <input type="text" name="todaysActivity[]" placeholder="Masukkan pekerjaan hari ini"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 w-full p-2.5">
                        </div>
                    </div>
                    <button type="button" onclick="addPekerjaan()"
                        class="mt-2 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-sm rounded-md">Tambah Pekerjaan</button>
                </div>
            </div>

            <div class="w-full flex justify-center">
                <button type="submit" name="submit"
                    class="text-white w-1/2 mt-10 bg-red-700 hover:bg-red-800 hover:text-white focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Submit</button>
            </div>
        </form>
    </div>

    <script src="/assets/js/clockout.js"></script>
@endsection
