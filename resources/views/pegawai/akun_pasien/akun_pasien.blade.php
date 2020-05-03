<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="http://localhost:8000/assets/css/admin_style.css">
    <script src="http://localhost:8000/assets/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <img style="float:left;" src="../../img/logo.png" width="48px" height="48px">
        <a style="background-color:inherit; color:inherit;" href="#home">Puskesmas</a>
        <a style="background-color:red; color:inherit; float:right;" class="blogout" href="">
            <img class="imglogout" src="../../img/logout.png">
            <div class="logout">LOGOUT</div>
        </a>

        <a href="javascript:void(0);" class="icon" onclick="topNav()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#"><i class="fas fa-home"></i> Home
            <hr></a>
        <a href="#"><i class="fas fa-address-card"></i> Data Pasien
            <hr></a>
        <a href="#"><i class="fas fa-user-friends"></i> Antrian
            <hr></a>
        <a href="#"><i class="fas fa-file-alt"></i> Manajement
            <hr></a>
    </div>

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
                        <option v-for="col in cols" :key="col">@{{ col }}</option>
                    </select>
                    <input class="search_bar" v-model="search" type="text" placeholder="Search...">
                    <table class="data_tb">
                        <thead>
                            <tr>
                                <th v-for="col in cols" :key="col">@{{ col }}</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in rows" :key="row.id">
                                <td v-for="col in cols" :key="col">@{{ row[col] }}</td>
                                <td><a class="btable buttonBlue" v-on:click="daftarAntrian(row)">Daftar Antrian</a><a class="btable buttonRed" v-on:click="editDataPasien(row)">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>&copy;copyright</p>
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
                window.location.href = '/pegawai/akun-pasien/daftar-antrian/?' + col['Nama Pasien'] + '/' + col.Alamat;
            },
            editDataPasien(col) {
                window.location.href = '/pegawai/akun-pasien/edit/' + col['Nama Pasien'] + '/' + col.Alamat;
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
