<section class="relative">
    <div class="container mx-auto shadow-2xl bg-gray-200 rounded-2xl text-center" data-aos="fade-up"
        data-aos-duration="2000">
        <div class="px-10 py-6">
            <h1 class="text-red-800 font-bold lg:text-3xl sm:text-lg mb-5">HI RECFON FRIENDS!</h1>
            <div class="w-full h-1 bg-gray-300 rounded-full my-5"></div>
            <div class="flex gap-10 sm:gap-4">
                <div class="flex flex-row sm:flex-col lg:flex-row w-3/4 bg-slate-300 px-10 py-4 rounded-xl gap-10">
                    @if (auth()->check())
                        <div class="w-1/2 sm:w-full lg:w-full text-start ">
                            <p>Name :</p>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div class="w-1/2 text-start">
                            <p>Division :</p>
                            <p>{{ Auth::user()->divisi->division }}</p>
                        </div>
                    @else
                        <div class="w-1/2 sm:w-full lg:w-full text-start ">
                            <p>Name :</p>
                            <p>-</p>
                        </div>
                        <div class="w-1/2 text-start">
                            <p>Division :</p>
                            <p>-</p>
                        </div>
                    @endif

                </div>
                <div class="flex flex-row sm:flex-col lg:flex-row w-2/4  bg-slate-300 px-10 py-4  rounded-xl gap-10">
                    <div class="w-1/2 sm:w-full text-start">
                        <p>Clock-in :</p>
                        <p>08:00 WIB </p>
                    </div>
                    <div class="w-1/2 sm:w-full text-start">
                        <p>Clock-out</p>
                        <p>16:00 WIB</p>
                    </div>
                </div>
                <div class=" w-2/4 bg-slate-300 px-10 py-4 rounded-xl text-start">
                    <p class="text-md sm:text-sm lg:text-md">Day :</p>
                    <p class="text-md sm:text-sm lg:text-md">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </p>
                </div>
                <div class="p-4 bg-slate-300 rounded-xl sm:hidden lg:block">
                    <i class="fa-solid fa-user text-4xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="relative">
    <div class="container mx-auto shadow-2xl bg-gray-200 rounded-2xl text-center" data-aos="fade-up"
        data-aos-duration="2000">
        <div class="px-10 py-6">
            <h1 class="text-red-800 font-bold lg:text-3xl sm:text-lg mb-5">HI RECFON FRIENDS!</h1>
            <div class="w-full h-1 bg-gray-300 rounded-full my-5"></div>
            <div class="flex gap-10 sm:gap-4">
                <div class="flex flex-row sm:flex-col lg:flex-row w-3/4 bg-slate-300 px-10 py-4 rounded-xl gap-10">
                    @if (auth()->check())
                        <div class="w-1/2 sm:w-full lg:w-full text-start ">
                            <p>Name :</p>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div class="w-1/2 text-start">
                            <p>Division :</p>
                            <p>{{ Auth::user()->divisi->division }}</p>
                        </div>
                    @else
                        <div class="w-1/2 sm:w-full lg:w-full text-start ">
                            <p>Name :</p>
                            <p>-</p>
                        </div>
                        <div class="w-1/2 text-start">
                            <p>Division :</p>
                            <p>-</p>
                        </div>
                    @endif

                </div>
                <div class="flex flex-row sm:flex-col lg:flex-row w-2/4  bg-slate-300 px-10 py-4  rounded-xl gap-10">
                    <div class="w-1/2 sm:w-full text-start">
                        <p>Clock-in :</p>
                        <p>08:00 WIB </p>
                    </div>
                    <div class="w-1/2 sm:w-full text-start">
                        <p>Clock-out</p>
                        <p>16:00 WIB</p>
                    </div>
                </div>
                <div class=" w-2/4 bg-slate-300 px-10 py-4 rounded-xl text-start">
                    <p class="text-md sm:text-sm lg:text-md">Day :</p>
                    <p class="text-md sm:text-sm lg:text-md">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </p>
                </div>
                <div class="p-4 bg-slate-300 rounded-xl sm:hidden lg:block">
                    <i class="fa-solid fa-user text-4xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="relative">
    <div class="container mx-auto shadow-2xl bg-gray-200 rounded-2xl text-center" data-aos="fade-up"
        data-aos-duration="2000">
        <div class="px-10 py-6">
            <h1 class="text-red-800 font-bold lg:text-3xl sm:text-lg mb-5">HI RECFON FRIENDS!</h1>
            <div class="w-full h-1 bg-gray-300 rounded-full my-5"></div>
            <div class="flex gap-10 sm:gap-4">
                <div class="flex flex-row sm:flex-col lg:flex-row w-3/4 bg-slate-300 px-10 py-4 rounded-xl gap-10">
                    @if (auth()->check())
                        <div class="w-1/2 sm:w-full lg:w-full text-start ">
                            <p>Name :</p>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div class="w-1/2 text-start">
                            <p>Division :</p>
                            <p>{{ Auth::user()->divisi->division }}</p>
                        </div>
                    @else
                        <div class="w-1/2 sm:w-full lg:w-full text-start ">
                            <p>Name :</p>
                            <p>-</p>
                        </div>
                        <div class="w-1/2 text-start">
                            <p>Division :</p>
                            <p>-</p>
                        </div>
                    @endif

                </div>
                <div class="flex flex-row sm:flex-col lg:flex-row w-2/4  bg-slate-300 px-10 py-4  rounded-xl gap-10">
                    <div class="w-1/2 sm:w-full text-start">
                        <p>Clock-in :</p>
                        <p>08:00 WIB </p>
                    </div>
                    <div class="w-1/2 sm:w-full text-start">
                        <p>Clock-out</p>
                        <p>16:00 WIB</p>
                    </div>
                </div>
                <div class=" w-2/4 bg-slate-300 px-10 py-4 rounded-xl text-start">
                    <p class="text-md sm:text-sm lg:text-md">Day :</p>
                    <p class="text-md sm:text-sm lg:text-md">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </p>
                </div>
                <div class="p-4 bg-slate-300 rounded-xl sm:hidden lg:block">
                    <i class="fa-solid fa-user text-4xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>
