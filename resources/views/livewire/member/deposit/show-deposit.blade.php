<div class=" ">
    <div class="text-center rounded-lg ">

 
        <div class="flex justify-center p-4">
            <span class="bg-black text-white text-2xl   pl-6 pr-6 pt-3 pb-3   rounded-xl "> รายการฝากรอดำเนินการล่าสุด 20 รายการ</span>
        </div>

        {{-- <table class="table-auto w-full">
            <thead class="bg-yellow-500 text-blackshadow-lg text-center">
                <tr>
                    <th class="py-3 px-4 ">#</th>
                    <th class="py-3 px-4 ">จำนวน</th> 
                    <th class="py-3 px-4 ">วันที่-เวลา</th>
                    <th class="py-3 px-4 ">บัญชีต้นทาง<p>บัญชีปลายทาง</p></th>
                    <th class="py-3 px-4 ">สลิป</th> 
                    <th class="py-3 px-4 ">สถานะ</th>  
                </tr>
            </thead>
            <tbody> 
                <tr class="text-black" >
                    <td colspan="5" class="p-3">ไม่มีรายการที่รับสิทธิ์</td>
                </tr>
            </tbody>
        </table> --}}
 
        <table class="min-w-full divide-y divide-gray-700 bg-gray-800 rounded-3xl  text-sm mt-2 p-4">
            <tbody>
                <tr class=" text-white">
                    <th scope="col" class="p-1">#</th>
                    <th scope="col" class="p-1">จำนวน</th>
                    <th scope="col" class="p-1">วันที่-เวลา</th>
                    <th scope="col" class="p-1">บัญชีต้นทาง<p>บัญชีปลายทาง</p>
                    </th>
                    <th scope="col" class="p-1">สลิป</th>
                    <th scope="col" class="p-1">สถานะ</th>
                </tr>
            </tbody>
            <tbody class=" ">
                @if (!empty($datadeposit))
                    @foreach ($datadeposit as $key => $item)
                    @if ($item['userbank'])
                         <tr class="text-white cursor-pointer odd:bg-gray-600"
                            wire:click="showdetail({{ $item }})">
                            <td class="p-1">{{ $key + 1 }}</td>
                            <td class="p-1 text-right ">{{ number_format($item['amount'], 2) }}</td>
                            <td class="p-1">{{ $item['datetime'] }}</td>
                            <td class="p-1 ">
                                <p class="flex justify-start ">
                                    <img class="w-5 h-5  "
                                        src="/storage/images/bank/{{ strtolower($item['userbank']['userbankToBanks']['bank_short']) }}.svg" />
                                    <span class="ml-3">{{ $item['userbank']['account'] }}</span>
                                </p>
                                <p class="flex justify-center items-center  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </p>
                                <p class="flex justify-start ">
                                    <img class="w-5 h-5 "
                                        src="/storage/images/bank/{{ strtolower($item['bankweb']['bank']['bank_short']) }}.svg" />
                                    <span class="ml-3">{{substr($item['bankweb']['account'],0,3) }}xxx</span>
                                </p>
                            </td>
                            <td class="p-1 flex justify-center">
                                @if ($item['slip'])
                                    <img src="{{ env('AWS_LINK').$item['slip'] }}" class=" h-10   w-10  mb-4 ">
                                @else
                                    <svg class="mx-auto h-5  w-5 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </td>
                            <td class="p-1">{{ $item['status'] }}</td>
                        </tr>
                    @else
                    <tr class="text-white">
                        <td colspan="6" class="p-1">ไม่มีรายการ</td>
                    </tr>
                    @endif
                       
                    @endforeach
                @else
                    <tr class="text-white">
                        <td colspan="6" class="p-1">ไม่มีรายการรับคะแนน</td>
                    </tr>
                @endif


            </tbody>
        </table>

    </div>

</div>
