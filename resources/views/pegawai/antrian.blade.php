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
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="header">
            <div class="row">
                <div class="col-12 col-s-12">
                    <h1>Antrian Pasien</h1>
                    <span style="float: right;">
                            <a class="button buttonGreen" href="http://localhost:8000/pegawai/antrian/add">
                                Tambah Pasien
                            </a>
                        </span>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in rows" :key="row.id">
                                <td v-for="col in cols" :key="col">@{{ row[col] }}</td>
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
                    'Nomor Antrian': Math.random().toString(36).substring(7),
                    'Nama Pasien': Math.random().toString(36).substring(7),
                    Poli: Math.random().toString(36).substring(7),
                    Tanggal: Math.random().toString(36).substring(7)
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
        },

        methods: {
            upDate: function() {
                axios.get('http://localhost:8000/pegawai/antrian/data-api')
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
