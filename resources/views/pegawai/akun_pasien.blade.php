<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/assets/css/admin_style.css')}}">
    <script src="vue.js"></script>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <img style="float:left" src="logo.png" width="48px" height="48px">
        <a style="background-color:inherit; color:inherit;" href="#home">Puskesmas</a>
        <a style="background-color:red; color:inherit; float:right;" class="blogout" href="">
            <img class="imglogout" src="logout.png">
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
                    <h1>Data Pasien <span style="float: right;"><a class="button buttonGreen" href="">Tambah
                                Pasien</a></span></h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-s-12 data_tabel" style="overflow-x:auto;">
                <div id="app">
                    <div>
                        <select v-model="column">
                            <option :value="null">No Column Filter</option>
                            <option v-for="col in cols" :key="col">{{ col }}</option>
                        </select>
                        <input class="search_bar" v-model="search" type="text" placeholder="Search...">
                    </div>
                    <table class="data_tb">
                        <thead>
                            <tr>
                                <th v-for="col in cols" :key="col">{{ col }}</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in rows" :key="row.id">
                                <td v-for="col in cols" :key="col">{{ row[col] }}</td>
                                <td><a class="btable buttonBlue" href="">Daftar Antrian</a><a class="btable buttonRed"
                                        href="">Edit</a></td>
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
        beforeMount() {
            this.items = Array.from(Array(20), (x, i) => {
                return {
                    No: i,
                    'Nama Lengkap': Math.random().toString(36).substring(7),
                    Alamat: Math.random().toString(36).substring(7),
                    'Tanggal Lahir': Math.random().toString(36).substring(7),
                    'Status BPJS': Math.random().toString(36).substring(7),
                    'Nomor BPJS': Math.random().toString(36).substring(7),
                    'Status Pasien': Math.random().toString(36).substring(7),
                    NRM: Math.random().toString(36).substring(7)
                }
            })
        },
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
        }
    })
</script>

</html>