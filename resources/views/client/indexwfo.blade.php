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

        <form method="POST" action="{{ route('user.storeClockinwfo') }}" enctype="multipart/form-data"
            class="container mx-auto w-1/2 bg-white p-20 rounded-3xl shadow-2xl">
            <h1 class="text-center text-2xl font-bold text-red-500">Clock In WFO</h1>
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
                            placeholder="Masukkan nama" required value="wfo">
                        <span class="icon">
                        </span>
                    </div>
                </div>

                <input type="text" id="clockIn" name="clockIn" required class="hidden">

                <div class="flex flex-col items-center justify-center py-20 ">

                    <div
                        class="relative w-80 h-48 border-2 border-dashed border-gray-300 rounded-lg flex items-center  justify-center bg-white group cursor-pointer">
                        <img id="previewImage" class="hidden w-full h-full object-cover rounded-lg" alt="Uploaded Preview">

                        <div id="uploadText" class="text-center text-gray-500 group-hover:text-blue-500">
                            <i class="fa-regular fa-image text-gray-300 text-6xl mb-8"></i>
                            <p>Click to upload or drag and drop</p>
                            <p class="text-sm">SVG, PNG, JPG, or GIF (MAX. 800×400px)</p>
                        </div>

                        <input type="file" id="img" name="img" accept="image/*" capture="environment"
                            class="absolute inset-0 opacity-0 cursor-pointer">
                    </div>
                    <p class="pt-10 text-gray-500">Please Upload Your Photo for your attandance</p>
                </div>

                <div class="hidden">
                    <div class="input-with-icon">
                        <input type="text" id="maps" name="maps"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan maps" required readonly>

                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center ">
                <button type="submit" name="submit"
                    class="text-white w-1/2 bg-red-700 hover:bg-red-800 hover:text-white focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
            </div>
        </form>
    </div>

    <script src="/assets/js/clockin.js"></script>
    <script>
        const fileInput = document.getElementById('img');
        const previewImage = document.getElementById('previewImage');
        const uploadText = document.getElementById('uploadText');

        // Handle file input change
        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    uploadText.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle drag-and-drop
        fileInput.closest('.group').addEventListener('dragover', (event) => {
            event.preventDefault();
            event.target.classList.add('border-blue-500');
        });

        fileInput.closest('.group').addEventListener('dragleave', (event) => {
            event.preventDefault();
            event.target.classList.remove('border-blue-500');
        });

        fileInput.closest('.group').addEventListener('drop', (event) => {
            event.preventDefault();
            const file = event.dataTransfer.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                    uploadText.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
            event.target.classList.remove('border-blue-500');
        });

        
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                // Masukkan nilai ke dalam input hidden
                document.getElementById('maps').value = `${userLat},${userLng}`;
            },
            (error) => {
                alert('Geolocation tidak diizinkan. Anda harus mengaktifkan lokasi untuk absen.');
            }
        );

    </script>
@endsection
