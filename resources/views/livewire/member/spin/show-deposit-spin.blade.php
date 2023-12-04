<div>
    <div class="p-8 text-center">
        <div class="flex justify-center mb-4">
            <span class="bg-black text-white text-2xl   pl-6 pr-6 pt-3 pb-3   rounded-xl ">รายการที่รับสิทธิ์วงล้อ</span>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden text-center">
            <table class="table-auto w-full">
                    <thead class="bg-yellow-500 text-blackshadow-lg text-center">
                        <tr>
                            <th class="py-3 px-4 ">#</th>
                            <th class="py-3 px-4 ">ยอดฝาก</th>
                            <th class="py-3 px-4 ">จำนวนสปิน</th>
                            <th class="py-3 px-4 ">วันที่-เวลา</th>
                            <th class="py-3 px-4 ">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @if ($list->count()>0)
                        @foreach ($list as $key=> $item)
                            <tr class="text-black hover:bg-gray-100">
                                <td class="py-3 px-4 ">{{$key+1}}</td>
                                <td class="py-3 px-4 ">{{number_format($item['credit'])}}</td>
                                <td class="py-3 px-4 ">{{$item['point']}}</td>
                                <td scope="col" class="px-4 py-3">
                                    <button class="text-gray-600 hover:bg-gray-300 p-1 px-2 font-bold rounded-lg focus:outline-none">{{\Carbon\Carbon::parse($item['created_at'])->format('Y/m/d H:i') }}</button>
                                </td>
                                <td class="py-3 px-4 ">{{($item['status']== 'success')?'สำเร็จ':'ไม่สำเร็จ'}}</td>
                            </tr>
                        @endforeach
                            
                         @else
                          <tr class="text-black" >
                            <td colspan="5" class="p-3">ไม่มีรายการที่รับสิทธิ์</td>
                        </tr>
                        @endif
                       
                
        </tbody>
    </table>
    </div>
</div>

</div>





 