@extends('client.tamplate')
@section('content')
    {{-- Home --}}
    <section class="relative">

        <div class="z-10">
            @include('client.components.hero')
        </div>

        <div class="z-50 mt-[-100px] sm:mt-[-80px] hidden sm:block">
            @include('client.components.profile')
        </div>

        @include('client.components.descrip')

        <div id="attendance" class="py-20">
            @include('client.components.nav-clockIn')
        </div>

        @include('client.components.table')



    </section>
@endsection
