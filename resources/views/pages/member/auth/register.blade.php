@php
    $bg="bg-[url('".asset("/storage/images/bg.png")."')]"
@endphp
<x-guest bg="{!!$bg!!}">
    <livewire:member.auth.register/>
</x-guest>
