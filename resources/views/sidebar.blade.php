<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/admin_style.css')}}">
</head>

<body>
    <div class="topnav" id="myTopnav">
        <img style="float:left;" src="{{url('/img/logo.png')}}" width="48px" height="48px">
        <a style="background-color:inherit; color:inherit;">Puskesmas</a>
        <a style="background-color:red; color:inherit; float:right;" class="blogout" href="{{url('/pegawai/logout')}}">
            <img class="imglogout" src="{{url('/img/logout.png')}}">
            <div class="logout">LOGOUT</div>
        </a>

        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{url('/pegawai/home')}}"><i class="fas fa-home"></i> Home
            <hr></a>
        <a href="{{url('/pegawai/akun-pasien')}}"><i class="fas fa-address-card"></i> Data Pasien
            <hr></a>
        <a href="{{url('/pegawai/antrian')}}"><i class="fas fa-user-friends"></i> Antrian
            <hr></a>
        <a href="{{url('/pegawai/poli')}}"><i class="fas fa-file-alt"></i> Manajement
            <hr></a>
    </div>


</body>

</html>