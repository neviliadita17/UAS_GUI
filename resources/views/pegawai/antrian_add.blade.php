<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/admin_style.css')}}">
</head>

<body>
   @include('sidebar')

    <div class="main" id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="header">
            <div class="row">
                <div class="col-12 col-s-12" style="overflow-x:auto;">
                    <h1>Form Penambahan Antrian</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-s-12 data_tabel" style="overflow-x:auto;">
                <div class="row">
                    <div class="col-12 col-s-12" style="min-width: 350px;">
                        <div class="card_pasien">
                            <div class="row">
                                <div class="col-8 col-s-8">
                                    @foreach($tb_pasien as $p)
                                    <h4>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span>{{ $p->nama_pasien }}</span></h4>
                                    <h4>Tanggal Lahir : <span>{{ $p->tl }}</span></h4>
                                    <h4>NRM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span>{{ $p->n_rm }}</span></h4>
                                    @endforeach
                                </div>
                                <div class="col-4 col-s-4">
                                    <img src="../../../img/patient.png" alt="" style="max-width: 150px; min-width: 150px;">
                                </div>
                            </div>
                        </div>
                        <form action="{{url('pegawai/antrian/add/action')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form_in" style="max-width: 600px; margin: auto;">
                                <div class="row">
                                    <input type="hidden" name="id_pasien" value="{{ $p->id_pasien }}">
                                    <div class="col-25">
                                        <label for="poli">Poli</label>
                                    </div>
                                    <div class="col-75">
                                        <select id="poli" name="poli">
                                            @foreach($tb_poli as $poli)
                                            <option value="{{ $poli->id_poli }}">{{ $poli->nama_poli }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>&copy;copyright</p>
        </div>

    </div>
</body>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("myTopnav").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("myTopnav").style.marginLeft = "0";
    }

    function topNav() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
            document.getElementById("main").style.marginTop = "0";
        } else {
            x.className = "topnav";
        }
    }
</script>

</html>
