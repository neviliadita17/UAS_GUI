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
        <img style="float:left" src="{{url('/img/logo.png')}}" width="48px" height="48px">
        <a class="atop" style="background-color:inherit; color:inherit;">Puskesmas</a>
        <a class="atop" href="{{url('/pasien/home')}}">Home</a>
        <a class="atop" href="{{url('/pasien/kontak')}}">Kontak</a>
        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
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
    });
</script>

</html>