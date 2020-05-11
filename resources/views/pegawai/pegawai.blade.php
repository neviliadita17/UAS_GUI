<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/admin_style.css')}}">
    <script src="http://localhost:8000/assets/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    @include('sidebar')

    <div class="main" id="main">
        <div class="container_home" style="overflow-x:auto;">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <div class="row">
                <div class="col-6" style="text-align: center;">
                    <div class="card_time">
                        <p>@{{ timestamp }}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="home_card" v-for="dps in dataPasien">
                        <h1>Jumlah Pasien <span style="float: right;">@{{dps['Jumlah Pasien']}}</span></h1>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-5">

                </div>
                <div class="col-6">
                    <div class="home_card" v-for="dpl in dataPoli">
                        <h1>Jumlah Poli <span style="float: right;">@{{dpl['Jumlah Poli']}}</span></h1>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5">

                </div>
                <div class="col-6">
                    <div class="home_card" v-for="da in dataAntrian">
                        <h1>Jumlah Pasien Hari Ini <span style="float: right;">@{{da['Jumlah Antrian']}}</span></h1>
                    </div>
                </div>
            </div>
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

    new Vue({
        el: '#main',
        data: {
            timestamp: "",
            dataPasien: [],
            dataPoli: [],
            dataAntrian: []
        },
        created() {
            setInterval(this.getNow, 1000);
        },
        methods: {
            getNow: function() {
                var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Augustus", "September", "Oktober", "November", "Desember"
                ];
                const today = new Date();
                const date = today.getDate() + '-' + (monthNames[today.getMonth()]) + '-' + today.getFullYear();
                const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                const dateTime = time + ' ' + date;
                this.timestamp = dateTime;
            },

            apiPasien: function() {
                axios.get('http://localhost:8000/pegawai/pasien-api')
                    .then(response => this.dataPasien = response.data['data'])
            },
            apiPoli: function() {
                axios.get('http://localhost:8000/pegawai/poli-api')
                    .then(response => this.dataPoli = response.data['data'])
            },
            apiAntrian: function() {
                axios.get('http://localhost:8000/pegawai/antrian-api')
                    .then(response => this.dataAntrian = response.data['data'])
            }
        },
        mounted() {
            this.apiPasien();
            this.apiPoli();
            this.apiAntrian();
            this.timer = setInterval(this.upDate, 5000)
        }
    });
</script>

</html>
