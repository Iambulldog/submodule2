<div class="mt-10 text-center ">
    <div class="flex mb-4 mt-3 lg:px-8">
        <div class="flex justify-between w-full">
            <div>
                <button wire:click="$set('activeTab','aff1')"
                    class="mr-2 px-4 py-2 rounded {{ $activeTab === 'aff1' ? 'bg-yellow-500 text-white' : 'bg-gray-300' }}">
                    ชั้นที่ 1
                </button>
                <button wire:click="$set('activeTab','aff2')"
                    class="mr-2 px-4 py-2 rounded {{ $activeTab === 'aff2' ? 'bg-yellow-500 text-white' : 'bg-gray-300' }}">
                    ชั้นที่ 2
                </button>
                <button wire:click="$set('activeTab','aff3')"
                    class="mr-2 px-4 py-2 rounded {{ $activeTab === 'aff3' ? 'bg-yellow-500 text-white' : 'bg-gray-300' }}">
                    ชั้นที่ 3
                </button>
            </div>
            <div>

                @switch($activeTab)
                @case('aff2')
                <button wire:click="GetAff(2)"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    รับชั้น 2
                </button>
                @break
                @case('aff3')
                <button wire:click="GetAff(3)"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    รับชั้น 3
                </button>
                @break
                @default
                <button wire:click="GetAff(1)"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    รับชั้น 1
                </button>
                @endswitch

            </div>

        </div>
    </div>
    <span class="text-xs">รับได้
        @php
        $st = json_decode(json_decode($setting)->setting);
        @endphp
        @switch($st->day)
        @case(1)
        วันจันทร์
        @break
        @case(2)
        วันอังคาร
        @break
        @case(3)
        วันพุธ
        @break
        @case(4)
        วันพฤหัสบดี
        @break
        @case(5)
        วันศุกร์
        @break
        @case(6)
        วันเสาร์
        @break
        @case(7)
        วันอาทิตย์
        @break
        @default
        ทุกวัน
        @endswitch
        ( ต้องมีรายการฝากวันที่กดรับ {{number_format($st->condition) }} )
    </span>
    <div class="overflow-hidden text-center p-5">
        <table class="table-auto w-full bg-white rounded-lg shadow-lg ">
            <thead class="bg-yellow-500 text-blackshadow-lg text-center">
                <tr>
                    <th class="py-3 px-4 ">#</th>
                    <th class="py-3 px-4 ">username</th>
                    <th class="py-3 px-4 ">วันที่เริ่ม</th>
                    <th class="py-3 px-4 ">วันที่สิ้นสุด</th>
                    <th class="py-3 px-4"></th>

                </tr>
            </thead>
            <tbody>
                @if ($data_r != null)
                @foreach ($data_r as $key => $data)
                <tr class="text-black">
                    <td class="p-3">{{ $key + 1   }}</td>
                    <td class="p-3">{{ $data['username'] }}</td>
                    <td class="p-3">{{ $data['aff']['start_date'] ?? '-' }} </td>
                    <td class="p-3">
                        <span
                            class="rounded-lg p-1 {{ ( \Carbon\Carbon::parse($data['aff']['end_date']??'1990-10-01')->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d')  )?'bg-green-300':'bg-red-300' }}  ">
                            {{ $data['aff']['end_date'] ?? '-' }}
                        </span>
                    </td>
                    <td class="p-3">
                        <button wire:click='cheack_aff({{ $data["id"] }})'
                            class=" bg-yellow-600 ml-2 py-1 px-2 text-white transition-colors duration-150 rounded-sm focus:shadow-outline hover:bg-yellow-400"
                            title="คำนวณ">
                            <center>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V13.5zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25V18zm2.498-6.75h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V13.5zm0 2.25h.007v.008h-.007v-.008zm0 2.25h.007v.008h-.007V18zm2.504-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zm0 2.25h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V18zm2.498-6.75h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V13.5zM8.25 6h7.5v2.25h-7.5V6zM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 2.25z" />
                                </svg>
                            </center>
                            <span class="text-sm">คำนวณ</span </button>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="text-black">
                    <td colspan="4" class="p-3">ไม่มีรายการ</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('timenotwork', function(data) {
            Swal.fire('แจ้งเตือน', `กรุณาทำรายการหลัง เวลา 15:00 เป็นต้นไป`, 'warning')
        });

        Livewire.on('saveafffail', function(data) {
            Swal.fire('เกิดข้อผิดพลาด', `ไม่สามารถบันทึกได้ กรุณาลองใหม่อีกครั้ง`, 'error')
        });

        Livewire.on('saveaffsuccess', function(data) {
            Swal.fire('บันทึกสำเร็จ', `คำนวณสำเร็จ`, 'success')
        });

        Livewire.on('apiwinloseerror', function() {
            Swal.fire('เกิดข้อผิดพลาด', `เกิดข้อผิดพลาดอะไรบางอย่าง กรุณาลองใหม่อีกครั้ง`, 'error')
        });
        Livewire.on('getAff', function(res) {
            Swal.fire(res.title, res.msg, res.type)
        });
    });
</script>
