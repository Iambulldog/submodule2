<div class="min-h-screen p-4 pt-16 ">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12">
        <p class="text-3xl">สูตร</p>
    </div>
    <div class="grid grid-cols-2 gap-6 mt-10 text-center ">
        <div class="px-40">
            <div class="bg-bg-icon-3 bg-10%  bg-no-repeat">
                @if($closeOropen)
                    <a class="cursor-pointer"  wire:click="addcreditsood">
                        <img class="xs:p-3 lg:p-16 hover:scale-100"
                            src="{{ asset('/storage/images/icon_home/soodai.png') }}" />
                    </a>
                @else
                    <a class="cursor-pointer"  onclick="setting_sood();">
                        <img class="xs:p-3 lg:p-16 hover:scale-100"
                             src="{{ asset('/storage/images/icon_home/soodai.png') }}" />
                    </a>
                @endif
            </div>
            <div class="text-xl font-bold pt-2">รับเครดิต</div>
        </div>
        <div class="px-40">
            <div class="bg-bg-icon-3 bg-10%  bg-no-repeat">
                <a class="cursor-pointer" wire:click="login_sood">
                    <img class="xs:p-3 lg:p-16 hover:scale-100"
                        src="{{ asset('/storage/images/icon_home/soodai.png') }}" />
                </a>
            </div>
            <div class="text-xl font-bold pt-2">{{(auth()->user()->username_sood != null && auth()->user()->password_sood != null) ? 'เข้าสู่ระบบสูตร' : 'สมัครสมาชิกสูตร'}}</div>
        </div>
    </div>
    <div class="flex flex-col space-y-6 justify-center items-center mt-24">
        <p class="text-2xl">อัตราการแลกเครดิต</p>
        <p class="text-xl">แลกจาก : {{$data->exchangeform == 'deposit' ? 'ยอดฝาก' : 'ยอดเทิร์น'}} | จำนวนที่แลก : {{$data->num}} | เครดิตสูตรที่ได้ :  {{$data->creditsood}} | สูงสุด/วัน :  {{$data->limitday}}</p>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-black">
                        <tr>
                            <th scope="col"
                                class="relative py-2 pl-6 pr-2 text-center text-sm font-bold uppercase tracking-wide text-amber-300 ">
                                ลำดับ</th>
                            <th scope="col"
                                class="px-2 py-2 text-center text-sm font-bold uppercase tracking-wide text-amber-300">
                                เครดิตที่รับ</th>
                            <th scope="col"
                                class="relative py-2 pl-2 pr-6 sm:pr-0  text-center text-sm font-bold uppercase tracking-wide text-amber-300">
                                วันที่</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-amber-100">
                        @if (!$log_users->isEmpty())
                            @foreach ($log_users as $key => $data)
                                <tr>
                                    <td
                                        class="relative whitespace-nowrap py-3 pl-6 pr-2 text-center text-sm font-medium text-gray-500 sm:pl-0">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-3 text-center text-sm text-gray-500">
                                        {{json_decode($data->after)->credit}}</td>
                                    <td class="relative whitespace-nowrap py-5 pl-8 pr-4 text-center text-sm font-medium ">
                                        {{\Carbon\Carbon::parse($data->created_at)->thaidate('j M y')}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9"
                                    class="text-center whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-500">
                                    ไม่พบข้อมูล</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function setting_sood()
    {
        Swal.fire({
            title: 'ปิดให้บริการชั่วคราว',
            text: 'ขออภัยในความไม่สะดวก คืนยอดเสียจะกลับมาให้บริการเร็วๆนี้',
            width: 600,
            icon: 'warning',
            confirmButtonText: 'ตกลง',
            timer: 8000,
            timerProgressBar: true,
        })
    }

    // ดัก Event  ที่ถูกส่งกลับมาจากคอมโพเนนต์ Livewire
    document.addEventListener('livewire:load', function() {
        Livewire.on('failloginsood', function() {
            Swal.fire('ไม่สำเร็จ', 'เกิดข้อผิดพลาด', 'error')
        });
        Livewire.on('overlimitturnover', function() {
            Swal.fire('ไม่สำเร็จ', 'รับเครดิตจากเทิร์นโอเวอร์ไปแล้ว', 'error')
        });
        Livewire.on('cannotaddcredit', function() {
            Swal.fire('ไม่สำเร็จ', 'กรุณาสมัครสมาชิกก่อนรับเครดิต', 'error')
        });
        Livewire.on('conditionisnotmatch', function() {
            Swal.fire('ไม่สำเร็จ', 'ไม่สามารถแลกได้เงื่อนไขไม่ตรวตามที่กำหนด', 'error')
        });
        Livewire.on('addcreditsoodfail', function() {
            Swal.fire('ไม่สำเร็จ', 'เกิดข้อผิดพลาดไม่สามารถรับเครดิตได้', 'error')
        });
        Livewire.on('statementisnull', function() {
            Swal.fire('ไม่สำเร็จ', 'กรุณาทำรายการฝากก่อนรับเครดิตสูตร', 'error')
        });
        Livewire.on('overlimitday', function() {
            Swal.fire('ไม่สำเร็จ', 'เกินลิมิตที่รับได้ต่อวัน', 'error')
        });
        Livewire.on('turnovernull', function() {
            Swal.fire('ไม่สำเร็จ', 'ไม่มีรายการเทิร์นโอเวอร์', 'error')
        });
        Livewire.on('addcreditsoodsuccess', function() {
            Swal.fire('สำเร็จ', 'รับเครดิตสูตรสำเร็จ', 'success')
        });
    });
</script>
