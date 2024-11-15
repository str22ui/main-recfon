{{-- hero --}}
<section class="relative flex items-center justify-center min-h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('image/Home.png') }}')">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div
        class="container mx-auto flex sm:flex-col md:flex-col lg:flex-row xl:flex-row justify-between items-center gap-20">
        <div class="relative w-full lg:w-3/4 text-white px-4 flex flex-col justify-center md:justify-center lg:justify-start"
            data-aos="fade-right" data-aos-duration="2000">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4 text-center md:text-center lg:text-justify ">
                Explore Your
                <br> Workday
                with Ease
            </h1>
            <p class="text-lg md:text-lg lg:text-xl mb-8 text-center md:text-center lg:text-justify ">Welcome to the
                SEAMEO
                RECFON Employee
                Attendance Mobile App!
                <br>
                Easily track your attendance without any hassle, any season.
                Enjoy special features to earn points for consistent attendance, with
                rewards waiting for you!
            </p>
            <div class="flex justify-center lg:justify-start">
                <button
                    class=" border-2 rounded-xl border-white py-2 px-6 text-lg font-medium uppercase tracking-wide hover:bg-white hover:text-black transition">
                    More Detail
                </button>
            </div>
        </div>
        <div class="hidden sm:block md:w-2/3 lg:w-1/3" data-aos="fade-left" data-aos-duration="2000">
            @include('client.components.crousel')
        </div>
    </div>
</section>
