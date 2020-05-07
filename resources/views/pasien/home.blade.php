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
    @if($session_a != "Guest")
    @include('navbar-after')
    @else
    @include('navbar')
    @endif

    <div class="main" id="main">
        <div class="header" style="text-align: center;" id="head">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div v-if="akun === 'Guest'" id="home_login" class="container">
                        <div class="row">
                            <div class="col-6">
                                <a style="text-decoration: none;" href="{{url('pasien/login')}}" class="login_btn">LOGIN</a>
                            </div>
                            <div class="col-6">
                                <a style="text-decoration: none;" href="{{url('pasien/register')}}" class="login_btn">Register</a>
                            </div>
                        </div>
                    </div>
                    <div v-if="akun !== 'Guest'" id="home_data" style="padding:10px; background-color: black; background-image: url(/img/573798-PLOMH2-538.jpg); background-size: cover;">
                        <div>
                            @if($session_a != "Guest")
                            <div class="col-12" style="text-align: left;">
                                <h1 style="color: #272636">Data Pasien</h1>
                                <table>
                                    <tr style="color: #272636">
                                        <td>Nama</td>
                                        <td> {{$tb_pasien->nama_pasien}}</td>
                                    </tr>
                                    <tr style="color: #272636">
                                        <td>NRM</td>
                                        <td> {{$tb_pasien->n_rm}}</td>
                                    </tr>
                                    <tr style="color: #272636">
                                        <td>Tanggal Lahir</td>
                                        <td> {{$tb_pasien->tl}}</td>
                                    </tr>
                                    <tr style="color: #272636">
                                        <td>Alamat</td>
                                        <td> {{$tb_pasien->alamat}}</td>
                                    </tr>
                                </table>
                            </div>
                            <button id="status_btn" type="button">Status</button>
                            @endif
                        </div>
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
                                <input class="search_bar" id="search" type="text" placeholder="Search Poli..." v-model="search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1 col-s-3">

            </div>
            <div class="col-10 col-s-6" id="poli">
                <div id="home_card" class="card" style="width: 18rem;" v-for="row in rows" :key="row.id">
                    <div v-bind:style="{ 'background-image': 'url(' + row.gambar_poli + ')' }" style="max-height:288px; min-height:288px; background-size: cover; background-position: center; background-repeat: no-repeat;">
                    </div>
                    <div class="container" style="overflow-y: auto;">
                        <h4><b>@{{row['nama_poli']}}</b></h4>
                        <p>@{{row['deskripsi']}}</p>
                        <button type="button" v-on:click="detailPoli(row)">Lihat Poli</button>
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
            }
        },
        methods: {
            detailPoli(col) {
                window.location.href = '/pasien/detail-poli/' + col.id_poli;
            },
            upDate: function() {
                axios.get('http://localhost:8000/pasien/home-api')
                    .then(response => this.items = response.data['data'])
            }
        },
        mounted() {
            this.upDate();
            this.timer = setInterval(this.upDate, 5000)
        }
    });
    new Vue({
        el: '#head',
        data: {
            akun: '{{ $session_a }}'
        }
    });
</script>

</html>