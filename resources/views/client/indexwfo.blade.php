<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="mx-5 mt-2 md:mt-24 mb-10  ">
        <h1 class=" text-center">Clock In WFO`</h1>
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
            class="px-5 py-5 grid grid-cols-1 md:grid-cols-2 gap-4 text-col rounded-md">
            @csrf
            <!-- Bagian kiri form -->
            <div class="text-blue-700 mx-5  ">
                <div class="mb-5 relative">
                    <label for="user_id" class="form-label block mb-2 text-sm font-medium">User id</label>
                    <div class="input-with-icon">
                        <input type="text" id="user_id" name="user_id"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required value="1">
                        <span class="icon">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="typeWork" class="form-label block mb-2 text-sm font-medium">Tipe Kerjaan</label>
                    <div class="input-with-icon">
                        <input type="text" id="typeWork" name="typeWork"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan nama" required value="wfo">
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <input type="text" id="clockIn" name="clockIn" required>

                <div class="mb-5 relative">
                    <label for="img" class="form-label block mb-2 text-sm font-medium">Foto / File</label>
                    <div class="input-with-icon">
                        <input type="file" id="img" name="img" accept="image/*" capture="environment"
                        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10" required>

                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="maps" class="form-label block mb-2 text-sm font-medium">Maps</label>
                    <div class="input-with-icon">
                        <input type="text" id="maps" name="maps"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10 "
                            placeholder="Masukkan maps" required readonly>
                        <span class="icon">

                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-center md:justify-start md:ml-5  ">
                <button type="submit" name="submit"
                    class="text-white w-3/4 bg-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
            </div>
        </form>
    </div>

    <script>
        function setClockInTime() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const time = hours + ':' + minutes;
            document.getElementById('clockIn').value = time;
        }

        // Call this function when the page loads to fill in the current time
        window.onload = function() {
            setClockInTime();
            getLocation();
        };

        // Attach an event listener to ensure time is set on form submission
        document.querySelector('form').addEventListener('submit', function() {
            setClockInTime();  // Ensure the time is set before submitting
        });

        // Geolocation function
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;
            document.getElementById("maps").value = "Lat: " + lat + ", Lon: " + lon;
        }
    </script>

</body>
</html>
