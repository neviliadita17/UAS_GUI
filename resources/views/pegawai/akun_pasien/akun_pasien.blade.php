<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="http://localhost:8000/assets/css/admin_style.css">
    <script src="{{url('/assets/vue/vue.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    @include('sidebar')

    <div class="main" id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="header">
            <div class="row">
                <div class="col-12 col-s-12">
                    <h1>Data Pasien
                        <span style="float: right;">
                            <a class="button buttonGreen" href="http://localhost:8000/pegawai/akun-pasien/form-register">
                                Tambah Pasien
                            </a>
                        </span>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-s-12 data_tabel">
                <div id="app" style="overflow-x:auto;">
                    <select v-model="column">
                        <option :value="null">No Column Filter</option>
                        <option>Nama Pasien</option>
                        <option>Alamat</option>
                        <option>Nomor BPJS</option>
                        <option>Nomor Rekam Medis</option>
                    </select>
                    <input class="search_bar" v-model="search" type="text" placeholder="Search...">
                    <table class="data_tb">
                        <thead>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Nomor BPJS</th>
                                <th>Nomor Rekam Medis</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in rows" :key="row.id">
                                <td>@{{row['Nama Pasien']}}</td>
                                <td>@{{row['Tanggal Lahir']}}</td>
                                <td>@{{row['Alamat']}}</td>
                                <td>@{{row['Nomor BPJS']}}</td>
                                <td>@{{row['Nomor Rekam Medis']}}</td>
                                <td><a class="btable buttonBlue" v-on:click="daftarAntrian(row)">Daftar Antrian</a><a class="btable buttonRed" v-on:click="editDataPasien(row)">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

                @include('footer')


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
        } else {
            x.className = "topnav";
        }
    }
    new Vue({
        el: '#app',
        data: () => ({
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
            daftarAntrian(col) {
                window.location.href = '/pegawai/antrian/add/' + col['Id'];
            },
            editDataPasien(col) {
                window.location.href = '/pegawai/akun-pasien/edit/' + col['Id'];
            },
            upDate: function() {
                axios.get('http://localhost:8000/pegawai/akun-pasien/data-api')
                    .then(response => this.items = response.data['data'])
            }
        },
        mounted() {
            this.upDate();
            this.timer = setInterval(this.upDate, 5000)
        }
    })
</script>

</html>
