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

        <form method="POST" action="{{ route('user.storeClockinIzin') }}" enctype="multipart/form-data"
            class="container mx-auto w-1/2 bg-white p-20 rounded-3xl shadow-2xl">
            <h1 class="text-center text-2xl font-bold text-red-500">Sick Leave</h1>
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
                            placeholder="Masukkan nama" required value="izin">
                        <span class="icon">
                        </span>
                    </div>
                </div>

                <input type="text" id="clockIn" name="clockIn" required class="hidden">

                <div class="flex flex-col items-center justify-center py-20 ">
                    <label for="file"
                        class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition-colors">
                        <div id="previewContainer" class="flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16l6-6m0 0l6-6m-6 6h18M9 10v10m0-10h6" />
                            </svg>
                            <p class="mt-2 text-gray-500">Click to upload or drag and drop</p>
                            <p class="text-sm text-gray-400">PDF, JPG, PNG, GIF (Max: 10MB)</p>
                        </div>
                        <img id="previewImage" class="hidden w-full h-full object-cover rounded-lg" alt="Preview">
                        <input id="file" name="file" type="file" accept=".pdf,image/*" class="hidden" required />
                    </label>
                    <div id="fileInfo" class="hidden mt-4 p-2 bg-gray-50 border border-gray-200 rounded-lg">
                        <p class="text-sm text-gray-500" id="fileName"></p>
                        <p class="text-xs text-gray-400" id="fileSize"></p>
                    </div>

                    <p class="pt-10 text-gray-500">Bukti izin</p>
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
        const fileInput = document.getElementById('file');
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        const fileInfo = document.getElementById('fileInfo');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                // Display file information
                fileName.textContent = `File Name: ${file.name}`;
                fileSize.textContent = `File Size: ${(file.size / 1024).toFixed(2)} KB`;
                fileInfo.classList.remove('hidden');

                // Display image preview if the file is an image
                if (file.type.startsWith('image/')) {
                    reader.onload = (e) => {
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('hidden');
                        previewContainer.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImage.classList.add('hidden');
                    previewContainer.classList.remove('hidden');
                }
            }
        });
    </script>

@endsection
