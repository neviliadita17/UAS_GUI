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
        <div class="header">
            <div id="home_data" class="container"
                style="background-image: url(573798-PLOMH2-538.jpg); background-size: cover;">
                <div class="row">
                    <div class="col-12" style="text-align: right;">
                        <h1>Data Pasien</h1>
                        <h2>Nama Lengkap</h2>
                        <h2>Nomor BPJS</h2>
                        <h4>Tanggal Lahir</h4>
                        <h4>Alamat</h4>
                    </div>
                    <button id="status_btn" type="button">Status</button>
                </div>
            </div>
        </div>
        <div class="row" style="margin: auto;" id="app">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-s-4 home_bar" style="overflow-x:auto;">
                        <h1>Poli</h1>
                    </div>

                    <div class="col-4">
                        <div>
                            <div>
                                <input class="search_bar" id="search" type="text" placeholder="Search Poli..."
                                    v-model="search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 col-s-3">

            </div>
            <div class="col-10 col-s-6" id="poli">
                <div id="home_card" class="card" style="width: 18rem;" v-for="post in filteredList">
                    <img v-bind:src="post.img" alt="Avatar" style="width:100%">
                    <div class="container" style="overflow-y: auto;">
                        <h4><b>{{ post.poli }}</b></h4>
                        <p>{{ post.deskripsi }}</p>
                        <button type="button">Pilih.</button>
                    </div>
                </div>
            </div>
            <div class="col-1 col-s-3">

            </div>
        </div>
    </div>

    <div class="footer">
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

    class Post {
        constructor(poli, deskripsi, img) {
            this.poli = poli;
            this.deskripsi = deskripsi;
            this.img = img;
        }
    }

    const app = new Vue({
        el: "#app",
        data: {
            search: "",
            postList: [
                new Post(
                    "Poli Umum",
                    "Poli umum, Berupa pelayanan kesehatan tingkat pertama yaitu Riwayat Jalan Tingkat Pertama(RJTP), meliputi: pemeriksaan, pengobatan, konsultasi medis,tindakan medis non spesialistik, baik operatif maupun non operatif,pelayanan obat dan bahan medis pakai.",
                    "OGFB4B0.jpg"
                ),
                new Post(
                    "Poli THT",
                    "Poli THT adalah layanan diagnosa dan terapi berbagai gangguan dan penyakit organ-organ telinga, hidung, dan tenggorokan.",
                    "OGFB4B0.jpg"
                ),
                new Post(
                    "Poli Kandungan",
                    "Poli kandungan melayani pemeriksaan kehamilan, penyakit kandungan dan persalinan. Sarana penunjang yang juga kami sediakan untuk mendukung klinik kebidanan dan kandungan ini adalah fasilitas USG untuk mengetahui perkembangan janin pada si ibu hamil.",
                    "OGFB4B0.jpg"
                ),
                new Post(
                    "Poli Anak",
                    "Berbagai pelayanan antara lain pemeriksaan kesehatan anak dari bayi baru lahir, balita, hingga menjelang remaja, imunisasi, vaksinasi, konsultasi tumbuh kembang anak di bawah asuhan dokter, konseling ASI, Inisiasi Menyusui Dini (IMD), dll.",
                    "OGFB4B0.jpg"
                ),
                new Post(
                    "Poli Mata",
                    "Poli menyediakan berbagai macam layanan pengobatan untuk penanganan kelainan penglihatan dan penyakit seputar mata dengan dukungan peralatan diagnostik mata yang lengkap.",
                    "OGFB4B0.jpg"
                ),
                new Post(
                    "Poli Gigi",
                    "Poli Gigi, berupa pelayanan gigi yaitu pemeriksaan, pengobatan, dan konsultasi medis, premedikasi, kegawatdaruratan oro-dental, pencabutan gigi sulung (topical, infiltrasi), pencabutan gigi permanen tanpa penyulit, obat pasca ekstraksi, tumpatan komposit, glass ionomer cement (GIC), scalling (pembersihan karang gigi), serta pelayanan gigi lain yang dapat dilakukan di fasilitas kesehatan tingkat pertama sesuai Panduan Praktik Klinik (PPK) Dokter Gigi.",
                    "OGFB4B0.jpg"
                )
            ]
        },
        computed: {
            filteredList() {
                return this.postList.filter((post) => {
                    return post.poli.toLowerCase().includes(this.search.toLowerCase());
                });
            }
        }
    });
</script>

</html>