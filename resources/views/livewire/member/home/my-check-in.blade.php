<div class="min-h-screen lg:pr-40 lg:pl-40 md:pr-20 md:pl-20 pt-16 ">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12 ">
        <p class="text-3xl">เช็คอินประจำวัน</p>
        <div class="block max-w-xs w-full p-4 space-y-4">
            <div class="hover:scale-105 text-center bg-bg-icon bg-100%  bg-no-repeat">
                <div class="p-5 pb-6">
                    <b class="text-xl text-black animate-pulse">พ้อยต์ของฉัน : {{ $score_avaliable->point }}</b>
                </div>
            </div>

        </div>

        <div class="lg:p-2 xs:p-1   ">
            <div class="grid grid-cols-{{ $setting_checkin['rounds'] }} gap-6 py-2 pb-9">
                <div class="lg:col-span-12 xs:col-span-12">
                    @if($count != null)
                        @if($user_checkin->first()->reward_claim == 'true')
                            <div
                                class="group flex justify-center items-center bg-gray-900 hover:bg-gray-800 shadow-2xl hover:shadow-yellow-500/50  animate-bounce rounded-lg py-6 w-full cursor-pointer"
                                wire:click="checked()">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-center" role="status">
                                        <i class="text-white text-3xl fa-solid fa-arrow-rotate-right fa-spin"></i>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <p class="text-3xl text-white">เริ่มใหม่</p>
                                </div>
                            </div>
                        @elseif($count != $setting_checkin['rounds'] && count($count_date) == $setting_checkin['rounds'])
                            <div
                                class="group flex justify-center items-center bg-gray-900 hover:bg-gray-800 shadow-2xl hover:shadow-yellow-500/50  animate-bounce rounded-lg py-6 w-full cursor-pointer"
                                wire:click="checked()">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-center" role="status">
                                        <i class="text-white text-3xl fa-solid fa-arrow-rotate-right fa-spin"></i>
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <p class="text-3xl text-white">เริ่มใหม่</p>
                                </div>
                            </div>
                        @else
                            <div class="grid lg:grid-cols-{{ $setting_checkin['rounds'] }} xs:grid-cols-3 gap-6 p-5  ">
                                @foreach($data as $key => $checkin)
                                    @if($setting_checkin)
                                        <button type="button" wire:click="checked()" wire:key="{{ $key }}" class=" rounded-md " >
                                            <img src="{{ env('AWS_LINK').$checkin }}"  class=" hover:scale-105 ">
                                        </button>
                                    @else
                                        <button type="button"  class=" rounded-md " >
                                            <img src="{{ env('AWS_LINK').$checkin }}" onclick="Setting_Close();"  class=" hover:scale-105 ">
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @else
                        <div class="grid lg:grid-cols-1 gap-6 p-5">
                            @if($count_date != null)
                                @foreach($data as $key => $checkin)
                                    @if(count($count_date) != $setting_checkin['rounds'])
                                        <button type="button" wire:click="checked()" wire:key="{{ $key }}">
                                            <img src="{{ env('AWS_LINK').$checkin }}" class="rounded-full hover:scale-105">
                                        </button>
                                    @else
                                        <button type="button">
                                            <img src="{{ env('AWS_LINK').$checkin }}" class="rounded-full hover:scale-105">
                                        </button>
                                    @endif
                                @endforeach
                            @else
                                <div
                                    class="group flex justify-center items-center bg-gray-900 hover:bg-gray-800 shadow-2xl hover:shadow-yellow-500/50  animate-bounce rounded-lg py-6 w-full cursor-pointer"
                                    wire:click="checked()">
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-center" role="status">
                                            <i class="text-white text-3xl fa-solid fa-arrow-rotate-right fa-spin"></i>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <p class="text-3xl text-white">เริ่มเช็คอินวันแรก</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <div class=" lg:col-span-{{ $setting_checkin['rounds'] }} xs:col-span-12 w-full bg-gray-900 border-8 border-yellow-400 rounded-md shadow ">
                    <div class="w-full flex flex-col items-center justify-center px-7 min-h-full ">
                        @if($count != null)
                            @if($count == $setting_checkin['rounds'])
                                @if($user_checkin->first()->reward_claim == 'false')
                                <img wire:click="checked(true)" class="cursor-pointer hover:scale-105 lg:w-52 md:w-32 lg:my-0 md:my-6  mb-3 rounded-full shadow-lg animate-bounce"
                                     src="{{ env('AWS_LINK').$setting_checkin['img_reward'] }}" alt="Bonnie image"/>
                                @endif
                            @else
                                <img class="cursor-pointer hover:scale-105 lg:w-52 md:w-32 lg:my-0 md:my-6  mb-3 rounded-full shadow-lg animate-bounce"
                                     src="{{ env('AWS_LINK').$setting_checkin['img_reward'] }}" alt="Bonnie image"/>
                            @endif
                        @endif

                        <h5 class="mb-1 text-xl font-medium text-white">ของรางวัล</h5>
                        <span class="text-sm text-center text-gray-500 dark:text-gray-400">เมื่อล็อคอินครบตามจำนวนวันจะได้รับของรางวัล</span>
                        <div class="w-full bg-gray-200 rounded-full h-6 mb-4 dark:bg-gray-700 mt-4">
                            @if($count != null)
                                @if($user_checkin->first()->reward_claim == 'true')
                                    <div class="bg-yellow-400 h-6 rounded-full" style="width: 100%">
                                        <p class="text-md text-white text-center">รับของรางวัลแล้ว</p>
                                    </div>
                                @elseif(count($count_date) == $setting_checkin['rounds'])
                                    @if($count == $setting_checkin['rounds'])
                                        <div class="bg-red-400 h-6 rounded-full" style="width: 100%">
                                            <p class="text-md text-white text-center">ยังไม่รับรางวัล</p>
                                        </div>
                                    @else
                                        <div class="bg-red-600 h-6 rounded-full"
                                             style="width: 100%">
                                            <p class="text-md text-white text-center">คุณหมดสิทธิ์รับของรางวัล</p>
                                        </div>
                                    @endif
                                @else
                                    <div class="bg-yellow-400 h-6 rounded-full"
                                         style="width: {{ ($count/$setting_checkin['rounds'])*100 }}%">
                                        <p class="text-md text-white text-center">{{ $count }}
                                            / {{ $setting_checkin['rounds'] }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="px-4 mt-5 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-normal leading-6 text-gray-900 text-center">ประวัติการเช็คอิน</h1>
            </div>

        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-yellow-400">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-normal text-gray-900 sm:pl-6">วันที่</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-normal text-gray-900 sm:pl-6">เวลา</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-normal text-gray-900 sm:pl-6">พ้อยท์ที่ได้</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-normal text-gray-900 sm:pl-6">เครดิตที่ได้</th>
                                <th scope="col" class="px-3 py-3.5 text-center text-sm font-normal text-gray-900">จำนวนวันสะสม</th>
                                <th scope="col" class="px-3 py-3.5 text-center text-sm font-normal text-gray-900">ข้อความ</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700 bg-gray-900">
                            @foreach ($log_user->sortDesc() as $i)
                                <tr class="hover:bg-gray-800">
                                    <td class="whitespace-nowrap text-center py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-6">{{ \Carbon\Carbon::parse($i['created_at'] ?? now())->thaidate() }}</td>
                                    <td class="whitespace-nowrap text-center py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-6">{{ \Carbon\Carbon::parse($i['created_at'] ?? now())->timezone('Asia/Bangkok')->format('H:i') }}</td>
                                    <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-white">{{ json_decode($i['after'])->พ้อยท์รวม - json_decode($i['before'])->พ้อยท์รวม }}</td>
                                    <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-white">{{ json_decode($i['after'])->เครดิตรวม - json_decode($i['before'])->เครดิตรวม}}</td>
                                    <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-white">{{ json_decode($i['after'])->จำนวนวันสะสม }}</td>
                                    <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-white">{{ json_decode($i['after'])->ข้อความ }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $log_user->links('member-paginate-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    function Setting_Close(){
        Swal.fire({
            title: 'ปิดให้บริการชั่วคราว',
            text: 'ขออภัยในความไม่สะดวก เช็คอินจะกลับมาให้บริการเร็วๆนี้',
            width: 600,
            icon: 'warning',
            confirmButtonText: 'ตกลง',
            timer: 8000,
            timerProgressBar: true,
        })
    }
    document.addEventListener('livewire:load', function () {



        Livewire.on('notice_claim_reward',function () {
            Swal.fire({
                title: 'กรุณารับรางวัล',
                text: 'คุณจะสามารถรับรางวัลได้ภายในวันนี้เท่านั้น',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            })

        });

        Livewire.on('per_month_is_used',function () {
            Swal.fire({
                title: 'สิทธิ์เดือนนี้ของคุณหมดแล้ว',
                text: 'คุณจะสามารถเช็คอินได้อีกครั้งเมื่อเปลี่ยนเดือนใหม่',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            })

        });

        Livewire.on('create_new_user', function () {
            Swal.fire({
                title: 'เริ่มรอบใหม่',
                text: 'จำนวนวันสะสมสะถูกรีเซ็ทไปและถูกแทนที่ด้วยเดือนใหม่',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                timer: 8000,
                timerProgressBar: true,
            }).then(() => {
                Livewire.emit('checkin_today')
            });
        });

        Livewire.on('checkin_today', function () {
            Swal.fire({
                title: 'เช็คอินสำเร็จ',
                text: 'คุณได้ทำการเช็คอินของวันนี้แล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            }).then(() => {
                window.location = "{{ route('member.pocket.mycheckin') }}";
            });
        });

        Livewire.on('checked_in', function () {
            Swal.fire({
                title: 'วันนี้มีการเช็คอินแล้ว',
                text: 'คุณได้ทำการเช็คอินของวันนี้ไปแล้ว, โปรดกลับมาใหม่อีกครั้งในวันพรุ่งนี้',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            })
        });

        Livewire.on('deposit_require', function () {
            Swal.fire({
                title: 'ต้องมียอดฝาก',
                text: 'จำเป็นต้องมียอดฝากในวันนี้ก่อนถึงจะสามารถเช็คอินได้',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            });
        });

        Livewire.on('per_user_alert', function () {
            Swal.fire({
                title: 'คุณใช้สิทธิ์หมดแล้ว',
                text: 'สิทธิ์ในการรับของรางวัลของคุณหมดแล้ว',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            })
        });

        Livewire.on('start_new_round', function () {
            Swal.fire({
                title: 'เริ่มรอบใหม่',
                text: 'จำนวนวันสะสมสะถูกรีเซ็ทไปและถูกแทนที่ด้วยเดือนใหม่',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false
            }).then(() => {
                window.location = "{{ route('member.pocket.mycheckin') }}";
            });
        });

        Livewire.on('fail_to_start_new_round', function () {
            Swal.fire({
                title: 'สามารถเริ่มรอบใหม่ได้ในวันพรุ่งนี้',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false,
                timer: 8000,
                timerProgressBar: true,
            })
        });

        Livewire.on('reward_alert',score => {
            Swal.fire({
                title: 'คุณได้รับรางวัลแล้ว',
                text: 'ยินดีด้วยคุณได้รับรางวัล ' + score.score + ' ' + score.type,
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then(() => {
                window.location = "{{ route('member.pocket.mycheckin') }}";
            });
        });

        Livewire.on('today_have_not_played', function () {
            Swal.fire({
                title: 'ไม่มีการเล่น',
                text: 'คุณจำเป็นต้องทำการเล่นในวันนี้ก่อน จึงจะสามารถเช็คอินได้',
                icon: 'warning',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false
            });
        });

    });
</script>
