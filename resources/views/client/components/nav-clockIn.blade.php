<section class="w-full bg-[#dfdede] p-12" data-aos="fade-up" data-aos-duration="1000">
    <div
        class="container mx-auto gap-10 md:gap-10 lg:gap-40 flex flex-col md:flex-col lg:flex-row justify-between md:justify-center lg:justify-center items-center">

        <a href="/clock-in"
            class="sm:w-1/2 lg:w-1/3  px-6 py-2 border-4 border-white bg-gradient-to-br from-green-400 to-green-600 flex justify-between items-center rounded-2xl gap-20"
            data-aos="fade-right" data-aos-duration="1000" data-aos-delay="1000">
            <div class="w-1/3">
                <h1 class="text-white font-bold lg:text-2xl sm:text-lg">CLOCK <br> IN </h1>
                <img src="{{ asset('image/next.png') }}" alt="">
            </div>
            <div class="w-2/3 mt-[-46px] ">
                <img src="{{ asset('image/woman.png') }}" alt="">
            </div>
        </a>
        <a href="/clockout"
            class="lg:w-1/3 sm:w-1/2 px-6 py-2 border-4 border-white bg-gradient-to-br from-red-400 to-red-600 flex justify-between items-center rounded-2xl gap-20"
            data-aos="fade-left" data-aos-duration="1000" data-aos-delay="1000">
            <div class="w-1/3">
                <h1 class="text-white font-bold lg:text-2xl sm:text-lg">CLOCK <br> OUT </h1>
                <img src="{{ asset('image/next.png') }}" alt="">
            </div>
            <div class="w-2/3 mt-[-46px] ">
                <img src="{{ asset('image/man.png') }}" alt="">
            </div>
        </a>

    </div>
</section>
