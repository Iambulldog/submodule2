<div class="mt-10 text-center "> 
    <div class="flex justify-center mb-4">
        <span class="bg-black text-white text-2xl   pl-6 pr-6 pt-3 pb-3   rounded-xl ">ประวัติการโอนเข้ากระเป๋าหลัก</span>
    </div>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden text-center">
        <table class="table-auto w-full">
                <thead class="bg-yellow-500 text-blackshadow-lg text-center">
                    <tr>
                        <th class="py-3 px-4 ">#</th>                         
                        <th class="py-3 px-4 ">เครดิตที่ได้รับ</th>
                        <th class="py-3 px-4 ">วันที่-เวลา</th>
                    </tr>
                </thead>
                <tbody> 
                    @if ($list->count() == 0)
                    <tr class="text-black"">
                        <td colspan="3" class="p-3">ไม่มีรายการ</td>
                    </tr>
                @else
                    @foreach ($list as $key=>$item)
                    <tr class=" text-black">
                        <td scope="col" class="p-3">{{$key+1}}</td>
                        <td scope="col" class="p-3">{{$item->credit}}</td>
                        <td scope="col" class="p-3">{{\Carbon\Carbon::parse($item->created_at)->format('Y/m/d H:i') }}</td>
                    </tr>

                    @endforeach
                @endif
            
    </tbody>
</table>
</div>


</div>
