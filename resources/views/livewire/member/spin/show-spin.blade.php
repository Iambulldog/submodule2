<div>
    <div class="mt-4  text-center mobile-m:scale-75  xs:scale-75  lg:scale-100 md:scale-90" x-data="{ show: false }"
        x-show="show" x-init="setTimeout(() => show = true, 100)" x-transition.duration.400ms>

        <div class="">
            <div class=" flex justify-center ">
                @if($closeOropen)
                    <img id="spin"
                        class="z-50  -mb-16  w-1/2 text-center  {{ $this->spin > 0 ? 'hover:animate-[bounce_1s_infinite] cursor-pointer' : 'cursor-wait' }}"
                        src="https://12iwinr-auto.com/public/assets/images/spin/spinner.png" onClick="startSpin();">
                @else
                    <img id="spin"
                         class="z-50  -mb-16  w-1/2 text-center  {{ $this->spin > 0 ? 'hover:animate-[bounce_1s_infinite] cursor-pointer' : 'cursor-wait' }}"
                         src="https://12iwinr-auto.com/public/assets/images/spin/spinner.png" onClick="SettingClose();">
                @endif
            </div>
            <canvas id="canvas" width="420" height="420"></canvas>
        </div>
    </div>
    <div class="mt-4  text-center mobile-m:scale-75  xs:scale-75  lg:scale-100 md:scale-90" x-data="{ show: true }"
        x-show="show" x-init="setTimeout(() => show = false, 100)">

        <i class="fa fa-spinner  fa-2xl animate-spin "></i>
        <div class="mt-3">กำลังโหลดข้อมูล, กรุณารอสักครู่</div>
    </div>
</div>

<script src='/storage/asset/Winwheel.js'></script>
<script src="/storage/asset/TweenMax.min.js"></script>
<script>
    let theWheel = new Winwheel({
            'numSegments': {{ count(json_decode($imgspin)) }}, // Specify number of segments.
            'outerRadius': 170, // Set outer radius so wheel fits inside the background.
            // 'drawText': true, // Code drawn text can be used with segment images.
            'textFontSize': 16, // Set text options as desired.
            'textOrientation': 'curved',
            'textAlignment': 'inner',
            'textMargin': 200,
            'textFontFamily': 'monospace',
            'textStrokeStyle': 'black',
            'textLineWidth': 3,
            'rotationAngle'   : 0, //เลื่อนตัว Pointer ให้ตรงขอบ
            'textFillStyle': 'white',
            'drawMode': 'segmentImage', // Must be segmentImage to draw wheel using one image per segemnt.
            'segments': {!! $imgspin !!},
            'animation': {
                'type': 'spinToStop',
                'duration': 5,
                'spins': {{ count(json_decode($imgspin)) }},
                'callbackFinished': alertPrize,
                'callbackAfter' : 'drawTriangle()'
            }
        });

    let chSpin = true

    function startSpin() {

        if (chSpin) {
            chSpin = false
            document.getElementById('spin').className = "w-1/2 text-center cursor-wait ";
            Livewire.emit("getSpin", spin.id);
            Livewire.on("spinResolved", (spin) => {
                if (spin > 0) {
                    let winningSegments = [theWheel.getRandomForSegment(spin)];
                    theWheel.stopAnimation(false);
                    theWheel.animation.stopAngle = winningSegments[Math.floor(Math.random() * Math.floor(winningSegments.length))];
                    theWheel.rotationAngle = 0;
                    theWheel.draw();
                    theWheel.animation.spins = 15;
                    theWheel.startAnimation();
                } else {
                    document.getElementById('spin').className = "w-1/2 text-center cursor-wait ";
                }


            });
        }


    }

    function SettingClose() {
        Swal.fire({
            title: 'ปิดให้บริการชั่วคราว',
            text: 'ขออภัยในความไม่สะดวกวงล้อเสี่ยงโชคจะกลับมาให้บริการเร็วๆนี้',
            width: 600,
            icon: 'warning',
            confirmButtonText: 'ตกลง',
            timer: 8000,
            timerProgressBar: true,
        })
    }

    function drawTriangle() {
        // theWheel.rotationAngle = -4;
    }

    function alertPrize(indicatedSegment) {
        if (indicatedSegment.type == 'credit') {
            Livewire.emit("addcredit", indicatedSegment.point);
        } else if (indicatedSegment.type == 'point') {
            Livewire.emit("addpoint", indicatedSegment.point);
        } else if (indicatedSegment.type == 'product') {
            Livewire.emit("addproduct", indicatedSegment.text);
        }

        // alert(indicatedSegment.point + ' point');
        Swal.fire({
            imageUrl: indicatedSegment.alert_image,
            // imageWidth: 300,
            // imageHeight: 200,
            imageAlt: 'Custom image',
        })

        chSpin = true
        document.getElementById('spin').className =
            "w-1/2  hover:animate-[bounce_1s_infinite]  text-center cursor-pointer";
    }


    document.addEventListener('livewire:load', function() {

        Livewire.on('showmessage', function(res) {
            Swal.fire(res['title'], res['msg'], res['type'])
        });

    });
</script>
