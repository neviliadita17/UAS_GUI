<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
</head>


<body>

    <div class="topnav" id="myTopnav">
        <img style="float:left" src="{{url('/img/logo.png')}}" width="48px" height="48px">
        <a class="atop" style="background-color:inherit; color:inherit;">Puskesmas</a>
        <a class="atop" href="{{url('/')}}">Home</a>
        <a class="atop" href="{{url('/pasien/antrian')}}">Antrian Anda</a>
        <a class="atop" href="{{url('/pasien/riwayat-antrian')}}">Riwayat Antrian</a>
        <a style="background-color:red; color:inherit; float:right;" class="blogout" href="{{url('/pasien/logout')}}">
            <img class="imglogout" src="{{url('/img/logout.png')}}">
            <div class="logout">LOGOUT</div>
        </a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

</body>

</html>
