<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
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

    <div class="main" id="main">
        <div class="header">

        </div>

        <div class="container">
            <div class="row">
                <div class="col-6 col-s-3 " style="text-align: right;">
                    <h1>Nama Poli</h1>
                    <p style="overflow-x: auto; max-height: 500px; padding: 5px;">Lorem Ipsum is simply dummy text of
                        the printing and
                        typesetting
                        industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.</p>
                </div>
                <div class="col-6 col-s-3">
                    <img id="poli_img" src="4450.jpg" alt="Avatar" style="width:75%">
                </div>
            </div>
            <br>
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
        } else {
            x.className = "topnav";
            y.className = "main";
        }
    }
</script>

</html>