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
        <a href="{{url('/pegawai/home')}}"><i class="fas fa-home"></i> Home
            <hr></a>
        <a href="{{url('/pegawai/akun-pasien')}}"><i class="fas fa-address-card"></i> Data Pasien
            <hr></a>
        <a href="{{url('/pegawai/antrian')}}"><i class="fas fa-user-friends"></i> Antrian
            <hr></a>
        <a href="{{url('/pegawai/poli')}}"><i class="fas fa-file-alt"></i> Manajement
            <hr></a>
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