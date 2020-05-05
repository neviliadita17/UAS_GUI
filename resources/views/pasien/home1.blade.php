<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <script src="{{url('assets/vue/vue.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>


<body>

    @include('navbar-after')

    <div class="main" id="main" id="app">
        <div class="header">
            <div id="home_data" class="container"
                style="background-image: url(/img/573798-PLOMH2-538.jpg); background-size: cover;">
                <div class="row">
                @foreach ($tb_pasien as $pasien)
                    <div class="col-12" style="text-align: right;">
                        <h1>Data Pasien</h1>
                        <h2>{{$pasien->nama_pasien}}</h2>
                        <h2>{{$pasien->n_bpjs}}</h2>
                        <h4>{{$pasien->tgl_lahir}}</h4>
                        <h4>{{$pasien->alamat}}</h4>
                @endforeach
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
                <div id="home_card" class="card" style="width: 18rem;" v-for="row in rows" :key="row.id">
                    <img v-bind:src="row.gambar_poli" alt="Avatar" style="width:100%">
                    <div class="container" style="overflow-y: auto;">
                        <h4><b>@{{row['nama_poli']}}</b></h4>
                        <p>@{{row['deskripsi']}}</p>
                        <button type="button" href="">Lihat Poli</button>
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
        data: ({
            search: null,
            column: null,
            items: []
        }),
        computed: {
            cols() {
                return this.items.length >= 1 ? Object.keys(this.items[0]) : []
            },
            rows() {
                if (!this.items.length) {
                    return []
                }
                return this.items.filter(item => {
                    let props = (this.search && this.column) ? [item[this.column]] : Object.values(item)
                    return props.some(prop => !this.search || ((typeof prop === 'string') ? prop
                        .includes(this.search) : prop.toString(10).includes(this.search)))
                })
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
