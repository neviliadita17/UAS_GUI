<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <script src="vue.js"></script>
</head>


<body>

    <div class="topnav" id="myTopnav">
        <img style="float:left" src="logo.png" width="48px" height="48px">
        <a class="atop" href="#" style="background-color:inherit; color:inherit;">Puskesmas</a>
        <a class="atop" href="#home">Home</a>
        <a class="atop" href="#pendaftaran">Pendaftaran Antrian</a>
        <a class="atop" href="#about">Antrian Anda</a>
        <a class="atop" href="#about">Riwayat Antrian</a>
        <a class="atop" href="#about">Kontak</a>
        <a style="background-color:red; color:inherit; float:right;" class="blogout" href="">
            <img class="imglogout" src="logout.png">
            <div class="logout">LOGOUT</div>
        </a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="main" id="main" id="app">
        <div class="back_antrian" id="card_antrian">
            <div class="container" style="height: 100%;">
                <h1 style="color: black;">Antrian</h1>
                <div class="row">
                    <div class="col-12">
                        <div id="home_data" class="antrian">
                            <span class="icon_status">
                                <i class='far fa-clock' style='font-size:36px; margin: 20%;'></i>
                            </span>
                            <h4 style=" text-align: right;">Tanggal</h4>
                            <h1>No Antrian : </h1>
                            <h2 style=" text-align: center;">Nama Poli</h2>
                            <div class="row" style="text-align: center;">
                                <button id="status_bt" type="button">Status</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <div class="footer" style="position: fixed;">
        <p>@Copyright</p>
    </div>

</body>
<script>
    function topNav() {
        var x = document.getElementById("myTopnav");
        var y = document.getElementById("main");
        if (x.className === "topnav") {
            x.className += " responsive";
            y.className = "";
            document.getElementById("card_antrian").style.marginTop = "30px";
        } else {
            x.className = "topnav";
            y.className = "main";
            document.getElementById("card_antrian").style.marginTop = "80px";
        }
    };
</script>

</html>