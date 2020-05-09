<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <script src="{{url('assets/vue/vue.js')}}"></script>
    <style>
        .gambar_poli {
            background-image: url('{{$poli->gambar_poli}}');
            height: 380px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>


<body>

    @if($session_a != "Guest")
    @include('navbar-after')
    @else
    @include('navbar')
    @endif

    <div class="main" id="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Nama Poli</h1>

                </div>
            </div>
            <div class="row">
                <div class="col-6 col-s-3 " style="overflow-x:auto;">
                    <div class="gambar_poli">
                    </div>
                </div>
                <div class="col-6 col-s-3">
                    <div style="overflow-x: auto; max-height: 380px;">
                        {{$poli->deskripsi}}
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"></div>
                <div v-if="akun !== 'Guest'" class="col-4 col-s-3 " style="overflow-x:auto; text-align: center;">
                    <div id="form_cont" class="container">
                        <h1 v-if="antrian === '0'">Pendaftaran Antrian</h1>
                        <h1 v-if="antrian !== '0'">Anda Sedang dalam Antrian</h1>
                        @if($session_a != "Guest")
                        <form action="/pasien/daftar-antrian" method="POST" id="daftar">
                            {{csrf_field()}}
                            <input type="hidden" name="id_pasien" value="{{ $pasien->id_pasien }}">
                            <input type="hidden" name="id_poli" value="{{ $poli->id_poli }}">
                        </form>
                        <button v-if="antrian === '0'" id="daftar_btn" type="submit" form="daftar">DAFTAR</button>
                        @endif
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        </div>

        <div v-if="akun !== 'Guest'" class="footer">
            <p>@Copyright</p>
        </div>
        <div v-if="akun === 'Guest'" class="footer" style="position: fixed;">
            <p>@Copyright</p>
        </div>
    </div>



</body>

<script>
    function topNav() {
        var x = document.getElementById("myTopnav");
        var y = document.getElementById("main");
        if (x.className === "topnav") {
            x.className += " responsive";
            y.className = "";
        } else {
            x.className = "topnav";
            y.className = "main";
        }
    }
</script>
@if($session_a != "Guest")
<script>
    new Vue({
        el: '#main',
        data: {
            akun: '{{ $session_a }}',
            antrian: '{{$antrian->antrian}}'
        }
    });
</script>
@else
<script>
    new Vue({
        el: '#main',
        data: {
            akun: '{{ $session_a }}'
        }
    });
</script>
@endif

</html>