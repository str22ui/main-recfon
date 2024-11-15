@extends('client.tamplate')
@section('content')
    <section class="bg-[#8fb449] px-10 py-10 mt-10 md:py-10 lg:py-20 ">
        <div class="container mx-auto flex flex-col md:flex-row lg:flex-row gap-10 items-center">
            <div class="w-full md:w-1/2 lg:w-1/2">
                <div
                    class="bg-orange-100 shadow-2xl shadow-gray-700/50 px-4 md:px-4 lg:px-8 py-6 md:py-6 lg:py-10 rounded-3xl">
                    <h1 class="text-pink-400 text-2xl md:text-2xl lg:text-6xl font-bold">Choose your <br> option
                        to Clock In
                        : <br>
                        WFH, WFO, Sick Leave, or Field Duty
                    </h1>
                    <br>
                    <p class="text-pink-400 text-sm md:text-sm lg:text-lg text-justify ">Ready to start your day? Select how
                        you’ll be
                        clocking in today. You
                        can mark it by
                        choosing
                        WFH, WFO, Leave, or Field Duty. Simply tap the option that matches your current work status!
                    </p>
                    <br>
                    <div class="flex justify-center gap-10">
                        <a href="/"
                            class="w-1/2 bg-[#8fb449] hover:bg-pink-400 text-md md:text-xl lg:text-2xl font-bold text-white
                        px-8 py-2 rounded-full text-center">Back</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/2 grid grid-cols-2 gap-6">
                <a href="" class="relative">
                    <img src="{{ asset('image/WFO.png') }}" alt="">
                    <p
                        class="absolute bottom-4 lg:bottom-10 left-4 lg:left-10 text-md md:text-xl lg:text-4xl font-bold text-white">
                        WFO
                    </p>
                </a>
                <a href="" class="relative">
                    <img src="{{ asset('image/WFH.png') }}" alt="">
                    <p
                        class="absolute bottom-4 lg:bottom-10 left-4 lg:left-10 text-md md:text-xl lg:text-4xl font-bold text-white">
                        WFH
                    </p>
                </a>
                <a href="" class="relative">
                    <img src="{{ asset('image/Sick-Leave.png') }}" alt="">
                    <p
                        class="absolute bottom-4 lg:bottom-10 left-4 lg:left-10 text-md md:text-xl lg:text-4xl font-bold text-white">
                        Sick
                        Leave
                    </p>
                </a>
                <a href="" class="relative">
                    <img src="{{ asset('image/FD.png') }}" alt="">
                    <p
                        class="absolute bottom-4 lg:bottom-10 left-4 lg:left-10 text-md md:text-xl lg:text-4xl font-bold text-white">
                        Field Duty
                    </p>
                </a>
            </div>
        </div>
    </section>
@endsection
