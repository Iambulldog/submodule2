<div class=" p-4 pt-16 ">
    <div class="flex flex-col space-y-6 justify-center items-center lg:mt-0 md:mt-0 mt-12">
        <p class="text-3xl">แนะนำเพื่อน</p>
            @if($code_current)
                <div class="bg-white p-6 rounded-lg border-dashed border-8 border-yellow-400/40 hover:border-yellow-400">
                    {!! QrCode::size(250)->style('round')->generate(str_replace(request()->getRequestUri(), '',request()->url()).'/u'.$code_current) !!}
                </div>
            @endif
        <div class="block max-w-xl w-full py-6 bg-neutral-600 rounded-3xl shadow-2xl space-y-4">
            <div class="text-lg text-white text-center">
                {{ str_replace(request()->getRequestUri(), '',request()->url()) }}/{!! $code_current == null ? null : '<span class="bg-yellow-400 text-gray-900 rounded-lg px-0.5">u'.$code_current.'</span>'  !!}
            </div>
        </div>

        {{--เรียกใช้ modal-เปลี่ยนรหัสผ่าน--}}
        <div class="flex gap-6">
            <x-modal.card title="เปลี่ยนรหัสแนะนำเพื่อน" wire:model.defer="simpleModal" align="center" blur max-width="lg">
                    <div class="space-y-6 max-w-md mx-auto">
                        <x-input wire:model="code_name" icon="user" label="รหัสแนะนำเพื่อน" placeholder="กรอกรหัสแนะนำเพื่อน" class="border-0 ring-1 ring-inset ring-yellow-400 focus:ring-yellow-400 rounded-xl py-2.5" />
                    </div>

                    <x-slot name="footer">
                        <div class="flex justify-end gap-x-4">
                            @if($errors->has('code_name'))
                                <x-button disabled class="inline-flex w-full items-center justify-center h-10 rounded-3xl hover:text-black hover:bg-yellow-400 px-12 py-2.5 text-sm font-medium text-white transition-colors border border-transparent bg-neutral-950" label="เปลี่ยนรหัสแนะนำเพื่อน" wire:click="change_codename()" />
                            @else
                                <x-button class="inline-flex w-full items-center justify-center h-10 rounded-3xl hover:text-black hover:bg-yellow-400 px-12 py-2.5 text-sm font-medium text-white transition-colors border border-transparent bg-neutral-950" label="เปลี่ยนรหัสแนะนำเพื่อน" wire:click="change_codename()" x-on:click="close"/>
                            @endif
                            <x-button flat label="ยกเลิก" x-on:click="close" />
                        </div>
                    </x-slot>
            </x-modal.card>

            <button onclick="$openModal('simpleModal')"
                    class="flex justify-center rounded-3xl bg-gradient-to-b from-yellow-300 from-10% to-yellow-600 to-90% hover:bg-gradient-to-br hover:from-yellow-600 hover:to-yellow-500 hover:text-black px-7 py-2.5 text-md font-medium leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                เปลี่ยนรหัสแนะนำเพื่อน
            </button>


            @if(!$code_current)
                <button onclick="$openModal('simpleModal')" class=" flex items-center justify-center w-auto text-md rounded-3xl bg-gradient-to-b from-yellow-300 from-10% to-yellow-600 to-90% hover:bg-gradient-to-br hover:from-yellow-600 hover:to-yellow-500 px-7 py-2.5 text-md active:bg-white focus:bg-white focus:outline-none text-white hover:text-gray-800 group">
                    <span>คัดลอก</span>
                    <i class="fa-solid fa-copy pl-2"></i>
                </button>
            @else
                <div x-data="{
                    copyText: '{{ str_replace(request()->getRequestUri(), '',request()->url()).'/u'. $code_current }}',
                    copyNotification: false,
                    copyToClipboard() {
                        navigator.clipboard.writeText(this.copyText);
                        this.copyNotification = true;
                        let that = this;
                        setTimeout(function(){
                            that.copyNotification = false;
                        }, 3000);
                    }
                }" class="relative flex items-center">
                    <button @click="copyToClipboard();" class="flex items-center justify-center w-auto text-md rounded-3xl bg-gradient-to-b from-yellow-300 from-10% to-yellow-600 to-90% hover:bg-gradient-to-br hover:from-yellow-600 hover:to-yellow-500 px-7 py-2.5 text-md active:bg-white focus:bg-white focus:outline-none text-white hover:text-gray-800 group">
                        <span x-show="!copyNotification">คัดลอก</span>
                        <svg x-show="!copyNotification" class="w-4 h-4 ml-1.5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" /></svg>
                        <span x-show="copyNotification" class="tracking-tight text-black" x-cloak>คัดลอกไปยังคลิปบอร์ดแล้ว</span>
                        <svg x-show="copyNotification" class="w-4 h-4 ml-1.5 text-black stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" x-cloak><path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" /></svg>
                    </button>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('change_fail', function () {
            Swal.fire('ผิดพลาด', 'เปลี่ยนรหัสแนะนำเพื่อนไม่สำเร็จ', 'error')
        });
        Livewire.on('change_success', function (){
            Swal.fire('สำเร็จ','เปลี่ยนรหัสแนะนำเพื่อนสำเร็จ','success')
        })
    });
</script>
