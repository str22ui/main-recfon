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

        <form method="POST" action="{{ route('user.storeClockinDinas') }}" enctype="multipart/form-data"
            class="container mx-auto w-1/2 bg-white p-20 rounded-3xl shadow-2xl">
            <h1 class="text-center text-2xl font-bold text-red-500">Clock In Field Duty</h1>
            @csrf
            <!-- Bagian kiri form -->
            <div class="text-blue-700 mx-5  ">
                <div class="hidden">
                    <div class="input-with-icon">
                        <input type="text" id="user_id" name="user_id"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required value="{{ Auth::user()->id }}">

                    </div>
                </div>

                <div class="hidden">
                    <div class="input-with-icon">
                        <input type="text" id="typeWork" name="typeWork"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required value="dinas">
                        <span class="icon">
                        </span>
                    </div>
                </div>

                <input type="text" id="clockIn" name="clockIn" required class="hidden">

                <div class="my-10">
                    <label for="name" class="block mb-8 text-lg font-medium text-gray-600">Description of Field Duty
                        duty</label>
                    <textarea id="businessTrip" name="businessTrip" placeholder="Write your description here..." rows="6"
                        class="w-full px-4 py-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-shadow resize-none"></textarea>
                </div>

            </div>
            <div class="w-full flex justify-center ">
                <button type="submit" name="submit"
                    class="text-white w-1/2 bg-red-700 hover:bg-red-800 hover:text-white focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
            </div>
        </form>
    </div>

    <script src="/assets/js/clockin.js"></script>
@endsection
