<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <script src="http://localhost:8000/assets/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>


<body>

    @include('navbar')

    <div class="main" id="main" id="app">
        <div class="header" style="text-align: center;">
            <div id="home_login" class="container">
                <div class="row">
                    <div class="col-6">
                        <a href="{{url('pasien/login')}}" class="login_btn">LOGIN</a>
                    </div>
                    <div class="col-6">
                        <a href="{{url('pasien/register')}}" class="login_btn">Register</a>
                    </div>
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
                <div id="home_card" class="card" style="width: 18rem;" v-for="postList in postList">
                    <img v-bind:src="postList.gambar_poli" alt="Avatar" style="width:100%">
                    <div class="container" style="overflow-y: auto;">
                        <h4><b>@{{postList.nama_poli}}</b></h4>
                        <p>@{{postList.deskripsi}}</p>
                        <button type="button">Lihat Poli</button>
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

    const app = new Vue({
        el: "#app",
        data: {
            search: "",
            postList: []  
        },
        computed: {
            // filteredList() {
            //     return this.postList => {
            //         return postList.nama_poli.toLowerCase().includes(this.search.toLowerCase());
            //     });
            // }
        },
        methods: {
            upDate: function() {
                axios.get('http://localhost:8000/pasien/home-api')
                    .then(response => this.postList = response.data['data'])
            }
        },
        mounted() {
            this.upDate();
            this.timer = setInterval(this.upDate, 5000)
        }
    });
</script>

</html>
