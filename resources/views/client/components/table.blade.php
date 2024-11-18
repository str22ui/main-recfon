<section class="container mx-auto pb-20 p-4" data-aos="fade-up" data-aos-duration="1000">
    <div class="flex justify-between items-center py-10">
        <h1 class="text-2xl md:text-2xl lg:text-4xl font-bold">Presensi</h1>
        <div class="flex flex-col md:flex-row lg:flex-row gap-5">
            <a href="" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-6 py-4 rounded-xl"><i
                    class="fa-solid fa-print"></i>
                Print</a>
            <a href="" class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-6 py-4 rounded-xl"><i
                    class="fa-solid fa-share-nodes"></i> Share</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-center">
            <thead class="bg-gradient-to-r from-green-500 to-blue-500 text-white">
                <tr>
                    <th scope="col" class="px-10 py-2">Date</th>
                    <th scope="col" class="px-10 py-2">Clock-In</th>
                    <th scope="col" class="px-10 py-2">Clock-Out</th>
                    <th scope="col" class="px-10 py-2">Attendance Photo Proof</th>
                    <th scope="col" class="px-10 py-2">Detail</th>
                </tr>
            </thead>
            <tbody>
                @if (auth()->check() && count($absents) > 0)
                    @foreach ($absents as $absent)
                        <tr class="border-b border-gray-300">
                            <td class="text-center p-5">
                                {{ \Carbon\Carbon::parse($absent->created_at)->format('l') }} <br>
                                <span
                                    class="text-gray-400">{{ \Carbon\Carbon::parse($absent->created_at)->format('d M') }}</span>
                            </td>
                            <td class="text-center p-5">
                                {{ $absent->clockIn }} <br>
                                <span class="text-gray-400">{{ $absent->typeWork }}</span>
                            </td>
                            <td class="text-center p-5">
                                {{ $absent->clockOut ?? 'N/A' }} <br>
                                <span class="text-gray-400">{{ $absent->typeWork }}</span>
                            </td>
                            <td class="text-center text-blue-500 p-5">
                                @if ($absent->clockOut)
                                    <i class="fa-solid fa-circle-check"></i> Done
                                @else
                                    <span class="text-gray-400">Pending</span>
                                @endif
                            </td>
                            <td class="text-start">
                                {{ $absent->todaysActivity ?? 'No details available' }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-b border-gray-300">
                        <td class="text-center p-5">
                            -
                        </td>
                        <td class="text-center p-5">
                            -
                        </td>
                        <td class="text-center p-5">
                            -
                        </td>
                        <td class="text-center text-blue-500 p-5">
                            -
                        <td class="text-start">
                            -
                        </td>
                    </tr>

                @endif

            </tbody>
        </table>
    </div>
</section>
