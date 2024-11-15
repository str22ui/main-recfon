<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="mx-5 mt-2 md:mt-24 mb-10  ">
        {{ Auth::user()->name}}
        <h1 class=" text-center">Clock In</h1>

        <form method="POST" action=""
            class="px-5 py-5 grid grid-cols-1 md:grid-cols-2 gap-4 text-col rounded-md">
            @csrf
            <!-- Bagian kiri form -->
            <div class="text-blue-700 mx-5  ">
                {{-- <button type="button" name="button"
                    class="text-blue-500 w-full md:w-1/4 bg-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">{{ $units->nama_perumahan }}</button> --}}

                <div class="mb-5 relative">
                    <label for="nama" class="form-label block mb-2 text-sm font-medium">User id</label>
                    <div class="input-with-icon">
                        <input type="text" id="name-input" name="nama"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required>
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="nama" class="form-label block mb-2 text-sm font-medium">Nama</label>
                    <div class="input-with-icon">
                        <input type="text" id="name-input" name="nama"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required>
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="nama" class="form-label block mb-2 text-sm font-medium">Tipe kerjaan</label>
                    <div class="input-with-icon">
                        <input type="text" id="name-input" name="nama"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required>
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="nama" class="form-label block mb-2 text-sm font-medium">Foto / File</label>
                    <div class="input-with-icon">
                        <input type="text" id="name-input" name="nama"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required>
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>


                <div class="mb-5 relative">
                    <label for="nama" class="form-label block mb-2 text-sm font-medium">Maps</label>
                    <div class="input-with-icon">
                        <input type="text" id="name-input" name="nama"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required>
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>


                <div class="mb-5 relative">
                    <label for="email" class="form-label block mb-2 text-sm font-medium ">Email</label>
                    <div class="input-with-icon">
                        <input type="email" id="email-input" name="email"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                            placeholder="Masukkan email">
                        <span class="icon">

                            <i class="fas fa-envelope text-gray-400"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-5 relative">
                    <label for="no_hp" class="form-label block mb-2 text-sm font-medium  ">Nomor
                        Telepon</label>
                    <div class="input-with-icon">
                        <input type="tel" id="phone-input" name="no_hp"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Masukkan no hp" required>
                        <span class="icon">

                            <i class="fas fa-phone text-gray-400"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-5 relative">
                    <label for="domisili" class="form-label block mb-2 text-sm font-medium  ">Kota Tempat
                        Tinggal</label>
                    <div class="input-with-icon">
                        <input type="text" id="city-input" name="domisili"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Masukkan Kota" required>
                        <span class="icon">

                            <i class="fas fa-city text-gray-400"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Bagian kanan form -->
            <div class="text-blue-700 mx-5  ">



                {{-- ===== Perlu Ditambah ====== --}}
                <div class="mb-5 relative">
                    <label for="domisili" class="form-label block mb-2 text-sm font-medium  ">Nama Kantor
                    </label>
                    <div class="input-with-icon">

                        <input type="text" id="city-input" name="nama_kantor"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                            placeholder="Masukkan nama kantor" required>
                        <span class="icon">

                            <i class="fas fa-briefcase text-gray-400"></i>
                        </span>
                    </div>
                </div>
                <div class="mb-5 hidden">

                    <input type="text" id="city-input" name="perumahan" value=""
                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
                {{-- ===== Perlu Ditambah === --}}
            </div>

            <div class="w-full flex justify-center md:justify-start md:ml-5  ">
                <button type="submit" name="submit"
                    class="text-white w-3/4 bg-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
            </div>

        </form>
    </div>

</body>
</html>
